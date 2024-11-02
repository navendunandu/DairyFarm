<?php
ob_start();
include("Head.php");
?>
<?php

session_start();

include("../Assets/Connection/Connection.php");


 if(isset($_GET["ID"]))
    {
	$uQry = "update tbl_booking set booking_status=".$_GET['st']." where booking_ID=".$_GET['ID'];
	if($con -> query($uQry))
	 {
    ?>
<script>
	alert("Updated");
	window.location = "UserBooking.php";
</script>
<?php
	 }
	 else
	 {
		 ?>
<script>
	alert("Failed");
	window.location = "UserBooking.php";
</script>
<?php
	 }
	}
		if(isset($_GET['accpt'])){
	$uQry = "update tbl_booking set booking_status=3,admin_ID=".$_SESSION["aid"]." where booking_ID=".$_GET['accpt'];
	if($con -> query($uQry))
	 {
    ?>
<script>
	alert("Order Accepted");
	window.location = "UserBooking.php";
</script>

<?php
	 }
	}
	
?>





<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>User Booking</title>
</head>

<body>
	<a href="Homepage.php">Home</a>
	<center>
		<h1><u>USER BOOKING</u></h1>
		<form method="POST" action "">


			<?php
	
$selqry="select * from tbl_booking b inner join tbl_user u on b.user_ID=u.user_ID where booking_status >='2'";
$result=$con->query($selqry);


while($data=$result->fetch_assoc())
  { 
 
?>

			<table border="5" bordercolor="black">

				<tr>

					<td align="center" colspan="9">
						---------------------------------------------------------------------------------------------------
						Customer Name:
						<?php echo $data['user_name'];?>
						---------------------------------------------------------------------------------------------------
					</td>
				</tr>
				<tr>
					<td height="27">Sno</td>
					<td width="200">Name</td>
					<td width="200">category</td>
					<td width="150">Quantity</td>
					<td width="200">Price</td>
					<td width="200">Total</td>
					<td>Photo</td>
					<td>status</td>
					<td>Action</td>
				</tr>
				<?php

	
$bselqry="select * from tbl_cart c inner join tbl_product p on c.product_ID=p.product_ID inner join tbl_booking b on c.booking_ID=b.booking_ID inner join tbl_subcategory sc on sc.subcategory_ID=p.subcategory_ID INNER join tbl_category ct on ct.category_ID=sc.category_ID where c.booking_ID=".$data['booking_ID'];
	
$bresult=$con->query($bselqry);

$i=0;
$total_price=0;

  while($bdata=$bresult->fetch_assoc())
  { 
		$total=$bdata['cart_quantity'] * $bdata['product_price'];
      $total_price = $total + $total_price;
	  $i++;
  ?>

				<tr>
					<td>
						<?php echo $i;?>
					</td>
					<td>
						<?php echo $bdata["category_name"]?>
					</td>
					<td>
						<?php echo $bdata["subcategory_name"]?>
					</td>
					<td>
						<?php echo $bdata['cart_quantity'];?>
					</td>
					<td>
						<?php echo $bdata["product_price"]?>
					</td>
					<td>
						<?php echo $total ?>
					</td>
					<td><img src="../Asset/Files/Product/<?php echo $bdata['product_photo'];?>" width="200"
							height="200"></td>
					<!-- <td>Total Amount:
						<?php echo $data["booking_amount"]?>
					</td> -->
					<td>
						<?php
						if($data['booking_status']>=3)
						{
							$selDelv="select * from tbl_deliveryagent where deliveryagent_ID=".$data['deliveryagent_ID'];
							$resDelv=$con->query($selDelv);
							$dataDelv=$resDelv->fetch_assoc();
							echo "Delivery Assign to ".$dataDelv['deliveryagent_name']."<br>";
						}
	     if($data['booking_status']==1)
	     {
		  echo "Your order is confirmed";
	      }
		  else if($data['booking_status']==2)
		  {
			  echo "packed";
		  }
		  else if($data['booking_status']==4)
		  {
			  echo "Out For Delivery";
		  }
		  else if($data['booking_status']==5)
		  {
			  echo "Delivery Completed";
		  }
		  ?>
</td>
<td>


						<?php
      if($bdata['booking_status']==1)
	  {
		  ?>

						<a href="UserBooking.php?cid=<?php echo $bdata['booking_ID']?>&stat=2">packed</a>
						<?php
	  }
	  if($bdata['booking_status']==2)
	  {
		  ?>

						<a href="AssignDeliveryAgent.php?bid=<?php echo $bdata['booking_ID']?>">shipped</a>
						<?php
	  }
	  ?>

</tr>


	</td>
				</tr>
				<?php		
 }
  ?>
  <tr>
	<td>
 	Total Price: <?php echo $total ?>
</td>
<td>
	Discount: <?php echo $total-$data["booking_amount"]  ?>
</td>
<td>
	Payable Amount: <?php echo $data["booking_amount"]  ?>
</td>

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