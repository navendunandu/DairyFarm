<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/connection.php");

session_start();

if(isset($_POST['btn_submit']))
{
	$pID=$_GET['pID'];
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/product/'.$photo);
	$InsQry="insert into tbl_gallery(gallery_image,product_ID) values('$photo','$pID')";
	if($con->query($InsQry))
		{
			?>
			<script>
			alert("Inserted");
			</script>
            <?php
		}
		else
		{
			?>
            <script>
			alert("Error");
			</script>
            <?php
		}
}

if(isset($_GET['did']))
{
	$DelQry="delete from tbl_gallery where gallery_ID=".$_GET['did'];
	if($con->query($DelQry))
	{
			?>
			<script>
			window.location="Gallery.php";
			</script>
           <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
</head>

<body>
<a href="AddProduct.php">Back</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Gallery Image</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl No.</td>
      <td>Product ID</td>
      <td>Gallery Image</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$SelQry="select * from tbl_gallery g inner join tbl_product p on g.product_ID=p.product_ID";
	$result=$con->query($SelQry);
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['product_ID']; ?></td>
      <td><img src="../Asset/Files/product/<?php echo $data['gallery_image']; ?>"width="400" height="400"></td>
      <td><a href="Gallery.php?did=<?php echo $data['gallery_ID'];?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>

</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>