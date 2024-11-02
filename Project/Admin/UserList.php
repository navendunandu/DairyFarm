<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");

?>
<html>
<head>
<title>Users List</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form name="frmweaver" action="POST" method="">
<h1><u>USER LIST</u></h1>
<table border="1">
  <tr>
    <td>Sno</td>
    <td>Name</td>
    <td>Dob</td>
    <td>Gender</td>
     <td>Address</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Password</td>
    <td>Photo</td>
  </tr>
  <?php

    $selqry="select * from tbl_user";

 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $data['user_name']; ?></td>
         <td><?php echo $data['user_dob']; ?></td>          
		 <td><?php echo $data['user_gender']; ?></td>
         <td><?php echo $data['user_address']; ?></td>
         <td><?php echo $data['user_contact']; ?></td>
         <td><?php echo $data['user_email']; ?></td>
         <td><?php echo $data['user_password']; ?></td>
         <td><img src="../Asset/Files/product/<?php echo $data['user_photo']; ?>" width="100" height="100"></td>
    </td>  </tr>
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









