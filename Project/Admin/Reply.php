<?php
ob_start();
include("Head.php");
?>
<?php
include("../Assets/Connection/connection.php");

if(isset($_POST['btn_reply']))
{
	$reply=$_POST['txt_reply'];
	$uqry="update tbl_complaint set complaint_reply='$reply',complaint_rdate=NOW() where complaint_ID=".$_GET['cid'];
	if($con->query($uqry))
	{
		 {
    ?>
   <script>
   			alert("Replyed");
			window.location="Complaints.php";
   </script>
	 <?php
	 }
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
<title>Reply</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Reply</td>
      <td><label for="txt_reply"></label>
      <input type="text" name="txt_reply" id="txt_reply" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_reply" id="btn_reply" value="Reply" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>