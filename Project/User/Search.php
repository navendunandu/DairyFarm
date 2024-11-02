<?php
 session_start();
 
 include("../Assets/Connection/Connection.php");
 	ob_start();
include("Head.php");

  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<title>Search</title>
</head>

<body onload="getSearch()">
<div class="container my-4 p-4 bg-white shadow rounded">
    <a href="MyCart.php" class="btn btn-green mb-4">My Cart</a>
    <h3 class="text-success text-center mb-4">Search Products by Category</h3>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="form-group col-md-4">
                <label for="selcategory">Category</label>
                <select class="form-control" name="selcategory" id="selcategory" onChange="getSubcat(this.value),getSearch()">
                    <option value="">--- Category ---</option>
                    <?php
                    $selQry = "select * from tbl_category";
                    $result = $con->query($selQry);
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data['category_ID']?>">
                            <?php echo $data['category_name']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="sel_subcat">Subcategory</label>
                <select class="form-control" name="sel_subcat" id="sel_subcat" onchange="getSearch()">
                    <option value="">--- Subcategory ---</option>
                </select>
            </div>
        </div>
    </form>

    <div id="result" class="text-center mt-4"></div>
</div><script src ="../Assets/JQ/jQuery.js"></script>
<script> 
function getSubcat(cid){
   $.ajax({
	   url:"../Assets/AjaxPages/AjaxSubCat.php?cid=" + cid,
	   success:function(result){
		   $("#sel_subcat").html(result);
	   }
   });
   }
   </script>
  
  <script>
   function getSearch(){
	   var cat = document . getElementById("selcategory").value;
	   var subcat = document . getElementById("sel_subcat").value;
	   console.log("Category :" + cat);
	   console.log("Subcategory:"+subcat);
   $.ajax({
	 url:"../Assets/AjaxPages/AjaxSearch.php?cat=" + cat +"&subcat="+subcat,
	   success:function(result){
		   $("#result").html(result);
	   }
   });
   }
   </script>
   
   <script>
  function addCart(pid){
    $.ajax({
        url:"../Assets/AjaxPages/AjaxAddCart.php?pid=" + pid,
        success: function(result) {
            alert(result);
        }
    });
     }

     function toggleWishlist(productID) {
    $.ajax({
        url: '../Assets/AjaxPages/AjaxWishList.php?pid='+productID,
        success: function(response) {
            let res = JSON.parse(response);
            alert(res.status)
            let wishlistText = document.getElementById('wishlist-text-' + productID);
            if (res.status === 'added') {
    console.log("Added", wishlistText.innerText);
    wishlistText.innerText = 'Remove Wishlist';
    console.log("Text changed to:", wishlistText.innerText);
} else if (res.status === 'removed') {
    console.log('Removed', wishlistText.innerText);
    wishlistText.innerText = 'Add Wishlist';
    console.log("Text changed to:", wishlistText.innerText);
}
        }
    });
}
   </script>
		   
</html>
<?php
include("Foot.php");
ob_flush();
?>