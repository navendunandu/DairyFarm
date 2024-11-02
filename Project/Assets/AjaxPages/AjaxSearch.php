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
<div class="container my-5">
    <h2 class="text-center text-success mb-5">Explore Our Dairy Products</h2>
    <div class="discount-banner mb-4">Get 30% off on purchases over ₹400!</div>
    <div class="row">
        <?php
        include("../connection/connection.php");
        session_start();
$userID = $_SESSION['uid']; 
        $selQry = "SELECT * FROM tbl_product p 
                    INNER JOIN tbl_subcategory s ON p.subcategory_ID = s.subcategory_ID 
                    INNER JOIN tbl_category c ON s.category_ID = c.category_ID 
                    WHERE TRUE";
        
        $cat = $_GET['cat'];
        $subcat = $_GET['subcat'];
        
        if ($subcat != "") {
            $selQry .= " AND p.subcategory_id = $subcat";
        } else if ($cat != "") {
            $selQry .= " AND s.category_id = $cat";
        }
        
        $result = $con->query($selQry);
        
        while ($data = $result->fetch_assoc()) {
            $product_id = $data['product_ID'];
            $stockQry = "SELECT SUM(stock_quantity) AS stock FROM tbl_stock WHERE product_ID = $product_id";
            $stockResult = $con->query($stockQry);
            $stockData = $stockResult->fetch_assoc();
			
			$cart="SELECT sum(cart_quantity) as sum from tbl_cart where product_ID=".$product_id;
			$resCart=$con->query($cart);
			$dataCart=$resCart->fetch_assoc();
			$rem=$stockData['stock']-$dataCart['sum'];
            if($rem<0){
                $rem=0;
            }

            $checkQry="SELECT * FROM tbl_wishlist WHERE product_ID = $product_id AND user_ID = $userID";
$checkResult = $con->query($checkQry);

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
                    <a href="javascript:void(0)" id="wishlist-btn-<?php echo $data['product_ID']; ?>" 
   onclick="toggleWishlist(<?php echo $data['product_ID']; ?>)">
   <span id="wishlist-text-<?php echo $data['product_ID']; ?>"><?php 
    if ($checkResult->num_rows > 0){
        echo "Remove Wishlist";
    }
    else{
        echo "Add Wishlist";
    }
   ?></span>
</a>
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