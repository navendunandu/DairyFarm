<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");

if(isset($_GET["aID"]))
{
$uqry="update tbl_deliveryagent set deliveryagent_status=1 where deliveryagent_ID=".$_GET['aID'];

	if($con-> query($uqry))
	{
	
?>
        <script>
				alert("Accepted");
				window.location="AcceptedList.php";
		</script>
<?php
    }
}
if(isset($_GET["rID"]))	
{
$uqry="update tbl_deliveryagent set deliveryagent_status='2' where deliveryagent_ID=".$_GET['rID'];

	if($con-> query($uqry))
	{
	
?>
        <script>
				alert("Rejected");
				window.location="AcceptedList.php";
		</script>
<?php
    }
}

?>
<html>
<head>
<title>ACCEPTED LIST </title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form name="frmfarmer" action="POST" method="">
<h1><u>ACCEPTED LIST</u></h1>
<table border="1">
  <tr>
    <td>Sno</td>
    <td>Name</td>
    <td>gender</td>
    <td>Address</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Password</td>
    <td>Proof</td>
    <td>Photo</td>
    <td>Action</td>
  </tr>
  <?php

    $selqry="select * from tbl_deliveryagent where deliveryagent_status='1'";

 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $data['deliveryagent_name']; ?></td>         
		 <td><?php echo $data['deliveryagent_gender']; ?></td>
         <td><?php echo $data['deliveryagent_address']; ?></td>
         <td><?php echo $data['deliveryagent_contact']; ?></td>
         <td><?php echo $data['deliveryagent_email']; ?></td>
         <td><?php echo $data['deliveryagent_password']; ?></td>
         <td><a href="../Asset/Files/product/<?php echo $data['deliveryagent_proof']; ?>" target="_blank"><img src="../Asset/Files/product/<?php echo $data['deliveryagent_proof']; ?>" wIDth="100" height="100"></a></td>
         <td><a href="../Asset/Files/product/<?php echo $data['deliveryagent_photo']; ?>" target="_blank"><img src="../Asset/Files/product/<?php echo $data['deliveryagent_photo']; ?>" wIDth="100" height="100"></td>
   <td>
         <a href="AcceptedList.php?rID=<?php echo $data['deliveryagent_ID'];?>">Reject</a>
            </td>
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
