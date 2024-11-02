
<?php
        
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");		
session_start();
$userID=$_SESSION['uid'];
$selUser="select * from tbl_user where user_ID=".$userID;
$resUser=$con->query($selUser);
$data=$resUser->fetch_assoc();

if(isset($_POST["btn_changepassword"]))
{
	$old=$_POST["txt_old"];
	$new=$_POST["txt_new"];
	$retype=$_POST["txt_retype"];
	if($data['user_password']==$old)
	{
	if($new==$retype)
	{
		$uqry="update tbl_user SET user_password='$new' WHERE user_ID='".$_SESSION['uid']."'";
		
		if($con->query($uqry))
		{
		?>
        <script>
			window.location="MyProfile.php";
		</script>
        <?php
	}
	else
	{
		echo "error";
}
}
else
{	
?>
        <script>
				alert("New Password and Re-Type Password does not match!!!");
		</script>
<?php
    }
}
	else
	{
			
?>
        <script>
				alert("Incorrect Password");
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>
<body>
<a href="MyProfile.php">Back</a>
<form action="" method="post">
<table width="252" border="1">
   <tr>
    <td>Old Password</td>
    <td><label for="txt_old"></label>
      <input type="text" name="txt_old" id="txt_old" placeholder="Enter Old Password"></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" placeholder="Enter New Password"></td>
  </tr>
  <tr>
    <td>Re-TypePassword</td>
    <td><label for="txt_retype"></label>
      <input type="text" name="txt_retype" id="txt_retype" placeholder="Enter Retype Password"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_changepassword" id="btn_changepassword" value="Change Password" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>