<?php
ob_start();
include("Head.php");
include("../Assets/Connection/connection.php");
session_start();
if(isset($_GET["dID"]))
	{
		$productID=$_GET["dID"];
		$delQry="delete from tbl_wishlist where wishlist_ID=$productID";
		if($con-> query($delQry))
		{
	    ?>
		<script>
					alert("Deleted");
					window.location="Wishlist.php";
		</script>
	    <?php
	
		}
	    else
		{
			echo "Error";
		}
	}		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WishList</title>
<style>
    .product-card {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        transition: transform 0.2s;
    }
    .product-card:hover {
        transform: scale(1.02);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }
    .product-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }
    .btn-custom {
        background-color: #28a745;
        color: #fff;
    }
    .btn-custom:hover {
        background-color: #218838;
        color: #fff;
    }
    .discount-banner {
        background-color: #ffd700;
        color: #000;
        font-weight: bold;
        text-align: center;
        padding: 5px;
        border-radius: 5px;
    }
</style>
</head>

<body>
<div class="container my-5">
    <h2 class="text-center text-success mb-5">Your Wishlist</h2>
    <div class="row">
        <?php
$userID = $_SESSION['uid']; 
        $selQry = "SELECT * FROM tbl_wishlist w inner join tbl_product p on w.product_ID=p.product_ID
                               INNER JOIN tbl_subcategory sc ON sc.subcategory_ID = p.subcategory_ID
                               INNER JOIN tbl_category ct ON ct.category_ID = sc.category_ID
                         WHERE w.user_ID='".$_SESSION['uid']."'"; 
        
        $result = $con->query($selQry);
        
        while ($data = $result->fetch_assoc()) {
            $product_id = $data['product_ID'];
            $stockQry = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_ID = $product_id";
            $stockResult = $con->query($stockQry);
            $stockData = $stockResult->fetch_assoc();
			
			$cart="SELECT COALESCE(SUM(cart_quantity), 0) as sum from tbl_cart where product_ID=".$product_id;
			$resCart=$con->query($cart);
			$dataCart=$resCart->fetch_assoc();
            // if($dataCart['sum']=='NULL'){
            //     $cartQty=0;
            // }
            // else{
                $cartQty=$dataCart['sum'];
            // }
			$rem=$stockData['stock']-$cartQty;
            if($rem<0){
                $rem=0;
            }

        ?>
        
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card p-3">
                <img src="../Asset/Files/Product/<?php echo $data['product_photo']; ?>" alt="Product Image" class="product-img">
                <h5 class="mt-3"><?php echo $data['category_name']; ?></h5>
                <p class="text-muted">Category: <?php echo $data['subcategory_name']; ?></p>
                <p class="text-primary">Price: ₹<?php echo $data['product_price']; ?></p>
                <p class="text-muted">Available Stock: <?php echo $rem; ?></p>
                <div class="d-flex justify-content-between mt-3">
					<?php
					if($rem>0){
					?>
                    <button class="btn btn-custom btn-sm" onclick="addCart('<?php echo $data['product_ID']; ?>')">Add to Cart</button>
					<?php
					}
					else{
						echo "<p class='text-danger'>Out of stock</p>";
					}
					?>
                   <a href="Wishlist.php?dID=<?php echo $dataproduct['wishlist_ID']; ?>">Delete</a>
                </div>
                <div class="mt-3 text-center">
                    <a href="ViewMore.php?pID=<?php echo $data['product_ID']; ?>" class="btn btn-link">View More</a> |
                    <a href="ViewRating.php?pID=<?php echo $data['product_ID']; ?>" class="btn btn-link">User Review</a> 
                </div>
            </div>
        </div>
        
        <?php } ?>
    </div>
</div>
</body>
<script src ="../Assets/JQ/jQuery.js"></script>
<script>
    function addCart(pid){
    $.ajax({
        url:"../Assets/AjaxPages/AjaxAddCart.php?pid=" + pid,
        success: function(result) {
            alert(result);
        }
    });
     }
</script>
</html>

<?php
include("Foot.php");
ob_start();
?>