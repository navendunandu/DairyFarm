<?php

session_start();

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

 if(isset($_GET["ID"]))
    {
	$uQry = "update tbl_cart set cart_status=".$_GET['st']." where cart_ID=".$_GET['ID'];
	if($con -> query($uQry))
	 {
    ?>
   <script>
   			alert("Updated");
			window.location="MyBooking.php";
   </script>
	 <?php
	 }
	 else
	 {
		 ?>
   <script>
   			alert("Failed");
			window.location="MyBooking.php";
   </script>
	 <?php
	 }
	}
?>
	
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Booking</title>
</head>
<body>
<div class="container">
    <a href="Homepage.php" class="btn btn-primary mt-3">Home</a>
    <h1 class="mt-4"><u>My Booking</u></h1>

    <table class="table table-bordered table-striped mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Sno</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Manufacture Date</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $userID = $_SESSION['uid'];
        $selqry = "SELECT * FROM tbl_cart c 
                    INNER JOIN tbl_product p ON c.product_ID = p.product_ID
                    INNER JOIN tbl_booking b ON c.booking_ID = b.booking_ID
                    INNER JOIN tbl_subcategory sc ON sc.subcategory_ID = p.subcategory_ID
                    INNER JOIN tbl_category ct ON ct.category_ID = sc.category_ID
                    WHERE booking_status >= '2' AND user_ID = $userID";

        $result = $con->query($selqry);
        $i = 0;

        while ($data = $result->fetch_assoc()) {
            $total_price = $data['cart_quantity'] * $data['product_price'];
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["category_name"]; ?></td>
                <td><?php echo $data["subcategory_name"]; ?></td>
                <td><?php echo $data["product_mfd"]; ?></td>
                <td><?php echo $data["product_exp"]; ?></td>
                <td><?php echo $data['cart_quantity']; ?></td>
                <td><?php echo $data["product_price"]; ?></td>
                <td><?php echo $total_price; ?></td>
                <td><img src="../Asset/Files/Product/<?php echo $data['product_photo']; ?>" width="120" height="120" class="img-fluid"></td>
                <td>
                    <?php
                    switch ($data['booking_status']) {
                        case 1:
                            echo "Your order is confirmed";
                            break;
                        case 2:
                            echo "Order is confirmed";
                            break;
                        case 4:
                            echo "Out For Delivery";
                            break;
                        case 5:
                            echo "Delivery Completed";
                            break;
                    }
                    ?>
                </td>
                <td>
                    <a href="PostComplaint.php?pID=<?php echo $data['product_ID']; ?>" class="btn btn-warning btn-sm">Complaint</a>
                    <a href="Rating.php?pID=<?php echo $data['product_ID']; ?>" class="btn btn-info btn-sm">Rate</a>
                    <a href="Bill.php?ID=<?php echo $data['booking_ID']; ?>" class="btn btn-info btn-sm">View Bill</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>