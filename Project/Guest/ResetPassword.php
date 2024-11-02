<?php
include("../Assets/Connection/connection.php");
session_start();
if(isset($_POST['btn_change'])){
if(isset($_SESSION['rdid']))
{
	$new=$_POST['txt_pass'];
	$retype=$_POST['txt_cpass'];
	if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
  {
		$upQry="update tbl_deliveryagent set deliveryagent_password='$new' where deliveryagent_ID=".$_SESSION['rdid'];
		if($con->query($upQry)){
		?>
		<script>
			alert("Password Updated")
			window.location="LogOut.php"
			</script>
			clearSession();
		<?php
		}
	}
}
else if(isset($_SESSION['ruid']))
{
	$new=$_POST['txt_pass'];
	$retype=$_POST['txt_cpass'];
	 if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_user set user_password='$new' where user_ID=".$_SESSION['ruid'];
		if($con->query($upQry)){
		?>
		<script>
			alert("Password Updated")
			window.location="LogOut.php"
			</script>
			clearSession();
		<?php
}
}
}
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="txt_pass" id=""></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="txt_cpass" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btn_change" value="Change Password"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>