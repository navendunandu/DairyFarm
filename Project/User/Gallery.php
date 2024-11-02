<?php 
include("../Assets/Connection/Connection.php");

session_start();
ob_start();
  include("Head.php");

if(isset($_POST['btn_submit']))
{
	$ID=$_GET['pID'];
	
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/product/'.$photo); 
	
    $insQry="insert into tbl_gallery(gallery_image,product_ID) values('$photo','$ID')";
	
	if($con->query($insQry))
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
   if(isset($_GET["dID"]))
  {
	  $delQry= "delete from tbl_gallery where gallery_ID=".$_GET["dID"];
	  if($con->query($delQry))
	  {
		  ?>
          <script>
		  window.location = "Gallery.php";
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
<form action="" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Gallery Image</td>
    <td><input type='file' name="file_photo" /></td>
  </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
<table border="1">
<tr>
    <td>SNo</td>
    <td>Product name</td>
    <td>Gallery image</td>
    <td>Action</td>
    </tr>
    
    <?php
	$i=0;
	$selQry= "select * from tbl_gallery g inner join tbl_product p on g.product_ID=p.product_ID";
	$result= $con->query($selQry);
	while($data =$result-> fetch_assoc())
	{
		$i++;
		?>
    <tr>
    <td><?php  echo $i; ?></td>
    <td><?php echo $data["category_name"] ?></td>
      <td><img src="../Asset/Files/product/<?php echo $data['gallery_image']; ?>" width="100" height="100"></td>
    <td><a href="Gallery.php?dID=<?php echo $data["gallery_ID"];  ?>">Delete</a>
    </td>
    </tr>    
    <?php
	}
	?>
</table>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>