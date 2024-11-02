<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$userID=$_SESSION['uid'];
	$pID=$_GET['pID'];
	$title=$_POST["txt_title"];
	$desciption=$_POST["txt_description"];
	$file=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/product/'.$file);

	$insqry="insert into tbl_complaint(complaint_title,complaint_description,complaint_file,product_ID,user_ID,complaint_date)values('$title','$desciption','$file','$pID','$userID',curdate())";
	
	if($con-> query($insqry))
	{
	?>
		<script>
			alert("inserted");
			window.location="PostComplaint.php";
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
<title>COMPLAINT</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_description"></label>
      <textarea name="txt_description" id="txt_description" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>File</td>
      <td><input type='file' name="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>