<?php

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
$username=$_SESSION['uname'];
$userID=$_SESSION['uid'];
$selUser="select * from tbl_user where user_ID=".$userID;
$resUser=$con->query($selUser);
$data=$resUser->fetch_assoc();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td colspan='2'><img src="../Asset/Files/product/<?php echo $data['user_photo'];?>" width="250" height="100"></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $data['user_name'];?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $data['user_gender'];?></td>
  </tr>
  <tr>
    <td>Date Of Birth</td>
    <td><?php echo $data['user_dob'];?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $data['user_address'];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data['user_email'];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $data['user_contact'];?></td>
  </tr>
  <?php

	$selqry="select * from tbl_user";
 	$result=$con->query($selqry);
	$data=$result->fetch_assoc();
 ?>
  <tr>
    <td colspan="2"><div align="center">
    <a href="EditProfile.php">Edit</a>&nbsp;&nbsp;
    <a href="ChangePassword.php">Change Password</a>
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
