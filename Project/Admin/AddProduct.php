<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");

session_start();
	
	if(isset($_POST["btn_submit"]))
{
	$subcategory=$_POST["sel_subcat"];
	
	$price=$_POST["txt_price"];
	$mfd=$_POST["txt_mfd"];
	$exp=$_POST["txt_exp"];
	$quantity=$_POST["txt_quantity"];
	
	$details=$_POST["txtarea_details"];
	
	
	
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/Product/'.$photo); 
	
		  $insqry="insert into tbl_product(product_mfd,product_exp,product_quantity,product_price,product_details,subcategory_ID,product_photo) 												
					 values('$mfd','$exp','$quantity','$price','$details','$subcategory','$photo')";
		if($con->query($insqry))
		{
			$product_ID = $con->insert_id; //Latest Product Id
        // Update the product_code with the desired format
		$code = 1000 + $product_ID;
        $product_code = "DAIRY".$code;
        $updateqry = "UPDATE tbl_product SET product_code='$product_code' WHERE product_ID=$product_ID";
		if($con->query($updateqry)){
		?>
        <script>
			alert("inserted");
			// window.location="AddProduct.php";
		</script>
        <?php
		}
	}
	else
	{
		echo "error";
    }
}
if(isset($_GET["delID"]))
{
$productID=$_GET["delID"];
$delqry="delete from tbl_product where product_ID=$productID";

	if($con-> query($delqry))
	{
	
?>
        <script>
				alert("deleted");
				window.location="AddProduct.php";
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
<title>Add Product</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="" method="POST" enctype="multipart/form-data">
<table border="1">

<tr>
<td width="128">category</td>
<td width="172">
<select name="selcategory" onChange="getSubcat(this.value)">
	<option value="---select---">---select---</option>
<?php
$selqry="select * from tbl_category";
 	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{ 
?>
		<option value="<?php  echo $data['category_ID']?>"><?php echo $data['category_name'] ;?></option>
		<?php
			}
		?>
    	</select>
    </td>
</tr>
<tr>
<td>subcategory</td>
<td>
<select name="sel_subcat" id="sel_subcat">
	<option value="">---select---</option>

    	</select>
    </td>
</tr>
  
   <tr>
    <td>Price</td>
    <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price"  /></td>
  </tr>
  <tr>
    <td>mfd</td>
    <td><label for="txt_mfd"></label>
      <input type="date" name="txt_mfd" id="txt_mfd"  /></td>
  </tr><tr>
    <td>exp</td>
    <td><label for="txt_exp"></label>
      <input type="date" name="txt_exp" id="txt_exp"  /></td>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><label for="txt_quantity"></label>
      <input type="text" name="txt_quantity" id="txt_quantity"  /></td>
  </tr>
  
  <tr>
    <td>Details</td>
    <td><label for="txtarea_Details"></label>
      <textarea name="txtarea_details" cols="25" rows="2"></textarea></td>
  </tr>
  
  <tr>
    <td>  Image</td>
    <td><input type='file' name="file_photo" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
  </tr>
</table><br>
<table  border="1">
  <tr>
    <td width="20" height="20" >Sno</td>
    <td width="110" >Category</td>
    <td width="110">Subcategory</td>
    <td width="20" >mfd</td>
    <td width="20" >exp</td>
    <td width="10">price</td>
    <td width="29">Details</td>
     <td width="11">Quantity</td>
    <td width="10" >Image</td>
    <td width="20">Action</td>
     
  <?php
 
	$selqry="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_ID=s.subcategory_ID
										 inner join tbl_category c on s.category_ID=c.category_ID order by product_ID desc";
 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
         <td ><?php echo $i; ?></td>
         <td><?php echo $data['category_name']; ?></td>
         <td><?php echo $data['subcategory_name']; ?></td>
         <td><?php echo $data['product_mfd']; ?></td>
         <td><?php echo $data['product_exp']; ?></td>
               
      <td><?php echo $data['product_price']; ?></td>
         <td><?php echo $data['product_details']; ?></td>
         <td><?php echo $data['product_quantity']; ?></td>
         
      <td><img src="../Asset/Files/Product/<?php echo $data['product_photo']; ?>" width="400" height="400"></td>
      <td><a href="AddProduct.php?delID=<?php echo $data['product_ID'];?>">Delete</a>
      <a href="Gallery.php?pID=<?php echo $data['product_ID'];?>">  Add More</a>  <a href="Stock.php?pid=<?php echo $data['product_ID']?>">Stock quantity</a></td>
</td>
  </tr>
  <?php
}
?>
</table>
<p>&nbsp;</p>
 </div>
</form>
</body>

<script src ="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubcat(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/Ajaxsubcat.php?cid=" + cid,
      success: function (result) {

        $("#sel_subcat").html(result);
      }
    });
  }

</script>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>