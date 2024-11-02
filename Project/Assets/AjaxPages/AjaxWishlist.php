<?php
include("../connection/connection.php");
session_start();
$productID = $_GET['pid'];
$userID = $_SESSION['uid'];

// Check if the product is already in the wishlist
$checkQry = "SELECT * FROM tbl_wishlist WHERE product_ID = $productID AND user_ID = $userID";
$checkResult = $con->query($checkQry);

if ($checkResult->num_rows > 0) {
    // Product is in the wishlist, so remove it
    $removeQry = "DELETE FROM tbl_wishlist WHERE product_ID = $productID AND user_ID = $userID";
    if ($con->query($removeQry) === TRUE) {
        echo json_encode(['status' => 'removed']);
    }
} else {
    // Product is not in the wishlist, so add it
    $addQry = "INSERT INTO tbl_wishlist (user_ID, product_ID) VALUES ($userID, $productID)";
    if ($con->query($addQry) === TRUE) {
        echo json_encode(['status' => 'added']);
    }
}
?>
