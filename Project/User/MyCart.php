<?php
session_start();

include("../Assets/Connection/Connection.php");
 ob_start();
include("Head.php");
 $selQry="select MAX(booking_ID) as ID from tbl_booking where booking_status='0'  and user_ID=".$_SESSION['uid'];
	  $res=$con->query($selQry);
	  
	 if($data=$res->fetch_assoc())
	 {
	  $bid=$data["ID"];
      $_SESSION['bid']=$bid;
	 }
	 
	  if(isset($_POST["btn_checkout"]))
	  {
		  $checkout=$_POST["txt_total"];
		  $uqry="update tbl_booking set booking_status='1', booking_amount=".$checkout. " where booking_ID=".$bid;
	    	
			if($con->query($uqry))
			{
			
			$uqry="update tbl_cart set cart_status='1' where booking_ID=".$bid;
			if($con->query($uqry))
		?>
        <script>
			alert("Updated");
			window.location="PaymentGateway.php";
		</script>
        <?php
	}
			
	else
	{
		echo "error";
    }
}
 if(isset($_GET["delID"]))
    {
	$cartID = $_GET["delID"];
	$delQry = "delete from tbl_cart where cart_ID = '$cartID'";
	if($con -> query($delQry))
	 {
    ?>
   <script>
   			alert("Deleted");
			window.location="MyCart.php";
   </script>
	 <?php
	 }
	 else
	 {
		 echo "error";
	 }
	}
	
?>
	
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Cart</title>
</head>
<body>
<div class="container mt-4">
    <a href="Homepage.php" class="btn btn-green mb-3">Home</a>
    <h1 class="text-center text-success"><u>My Cart</u></h1>

    <?php if (!isset($bid)): ?>
        <h2 class="text-center text-danger">NO ITEMS IN THE CART</h2>
    <?php else: ?>
        <form method="POST" action="">
            <table class="table table-bordered table-green">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selQry = "SELECT * FROM tbl_cart c 
                               INNER JOIN tbl_product p ON c.product_ID = p.product_ID 
                               INNER JOIN tbl_booking b ON c.booking_ID = b.booking_ID 
                               INNER JOIN tbl_subcategory sc ON sc.subcategory_ID = p.subcategory_ID 
                               INNER JOIN tbl_category ct ON ct.category_ID = sc.category_ID 
                               WHERE c.booking_ID = $bid";
                    
                    $result = $con->query($selQry);
                    $i = 0;
                    $checkout = 0;

                    while ($data = $result->fetch_assoc()):
                        $total_price = $data['cart_quantity'] * $data['product_price'];
                        $checkout += $total_price;
                        $i++;
                        $product_id = $data['product_ID'];
            $stockQry = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_ID = $product_id";
            $stockResult = $con->query($stockQry);
            $stockData = $stockResult->fetch_assoc();
			
			$cart="SELECT sum(cart_quantity) as sum from tbl_cart where cart_status>0 and product_ID=".$product_id;
			$resCart=$con->query($cart);
			$dataCart=$resCart->fetch_assoc();
			$rem=$stockData['stock']-$dataCart['sum'];
            if($rem<0){
                $rem=0;
            }
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["category_name"]; ?></td>
                        <td><?php echo $data["subcategory_name"]; ?></td>
                        <td><input type="number" max="<?php echo $rem ?>" class="form-control" onchange="update(this.value, '<?php echo $data['cart_ID']; ?>')" value="<?php echo $data['cart_quantity']; ?>" /></td>
                        <td><?php echo $data["product_price"]; ?></td>
                        <td><?php echo $total_price; ?></td>
                        <td><img src="../Asset/Files/Product/<?php echo $data['product_photo']; ?>" width="120" height="120" class="img-fluid"></td>
                        <td><a href="MyCart.php?delID=<?php echo $data['cart_ID']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php endwhile; ?>

                    <?php
                    $selDisc = "SELECT MAX(dis_amount) AS dis_amount, dis_percentage, dis_maxamount FROM tbl_discount 
                                WHERE dis_status = 1 AND dis_amount <= $checkout";
                    $discAmnt = 0;
                    $resDisc = $con->query($selDisc);

                    if ($dataDisc = $resDisc->fetch_assoc()) {
                        $disperc = $dataDisc['dis_percentage'];
                        $discMax = $dataDisc['dis_maxamount'];
                        $discAmnt = $checkout * ($disperc / 100);
                        $discAmnt = min($discAmnt, $discMax);
                        $checkout -= $discAmnt;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">Discount:</td>
                        <td colspan="2"><?php echo $discAmnt; ?></td>
                        <td colspan="2" class="text-right font-weight-bold">Total:</td>
                        <td colspan="2"><?php echo $checkout; ?></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-center">
                            <input type="hidden" value="<?php echo $checkout; ?>" name="txt_total"/>
                            <button type="submit" name="btn_checkout" id="btn_checkout" class="btn btn-green">CHECKOUT</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    <?php endif; ?>
</div>
</body>
<script src ="../Assets/JQ/jQuery.js"></script>
<script>
  function update(qty,cid){
    $.ajax({
        url:"../Assets/AjaxPages/AjaxUpdate.php?cid=" + cid + "&qty=" + qty ,     
		 success: function(result) {
            console.log (result)
			window.location = "MyCart.php"
        }
    });
     }
  
   </script>
</html>
<?php
include("Foot.php");
ob_flush();
?>