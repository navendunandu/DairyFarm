<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");

$name='';
$email='';
$password='';
$aID=0;

if(isset($_POST["btn_submit"]))
{
	$aID=$_POST["txt_aID"];
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	if($aID!=0)
	{
		$uqry="update tbl_admin SET admin_name='$name',admin_email='$email',admin_password='$password' WHERE admin_ID='$aID'";
		if($con->query($uqry))
		{
		?>
            <script>
				alert("updated");
				window.location="AdminRegistration.php";
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
        $insqry="insert into tbl_admin(admin_name,admin_email,admin_password)values('$name','$email','$password')";
		if($con->query($insqry))
		{
		?>
        <script>
			alert("inserted");
			window.location="AdminRegistration.php";
		</script>
        <?php
	}
	else
	{
		echo "error";
    }
}
}

if(isset($_GET["delID"]))
{
$adminID=$_GET["delID"];
$delqry="delete from tbl_admin where admin_ID=$adminID";

	if($con-> query($delqry))
	{
	
?>
        <script>
				alert("deleted");
				window.location="AdminRegistration.php";
		</script>
<?php
    }
	else{
		echo "Error";
	}
}

if(isset($_GET["eID"]))
{
	$aID=$_GET["eID"];
	$selqry="select * from tbl_admin where admin_ID='$aID'";
 	$result=$con->query($selqry);
	$data=$result->fetch_assoc();
	$name=$data['admin_name'];
    $email=$data['admin_email']; 
    $password=$data['admin_password'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="" method="POST">
<table  border="1">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
    <input type="hidden" name="txt_aID" id="txt_aID" value="<?php echo $aID ;?>" />
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $name; ?>" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
          <input type="text" name="txt_email" id="txt_email" value="<?php echo $email ?>" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" value="<?php echo $password;?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </div></td>
    </tr>
</table><br>
<table width="557"  border="1">
  <tr>
    <td width="52">Sno</td>
    <td width="125">Name</td>
    <td width="94">Email</td>
    <td width="111">Password</td>
    <td width="141">Action</td>
  </tr>
  <?php
 
	$selqry="select * from tbl_admin";
 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data['admin_name']; ?></td>
    <td><?php echo $data['admin_email']; ?></td>
    <td><?php echo $data['admin_password']; ?></td>
    <td><a href="AdminRegistration.php?delID=<?php echo $data['admin_ID'];?>">Delete</a>
    <a href="AdminRegistration.php?eID=<?php echo $data['admin_ID'];?>">Edit</a></td>
  </tr>
  <?php
}
?>
</table>
 </div>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>