<?php

session_start();
ob_start();
include("Head.php");

include("../Assets/Connection/Connection.php");


 if(isset($_GET["ID"]))
    {
	 $upQry = "update tbl_booking set booking_status=".$_GET['stat']." where booking_ID=".$_GET['ID'];
	
	if($con-> query($upQry))
	 {
    ?>
   <script>
   			alert("Updated");
			//window.location="Order.php";
   </script>
	 <?php
	 }
	 else
	 {
		 ?>
   <script>
   			alert("Failed");
			window.location="Order.php";
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
		<h1><u>Delivery Orders</u></h1>
		<form method="POST" action "">


			<?php
	
$selqry="select * from tbl_booking b inner join tbl_user u on b.user_ID=u.user_ID where deliveryagent_ID=".$_SESSION['did'];
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

<td>


						<?php
      if($data['booking_status']==4)
	  {
		  echo "Out For Delivery";
	  }
	  if($data['booking_status']==5)
	  {
		  echo "Deliverd";
	  }
	  ?>
      



	</td>
	<td>
	<?php
      if($data['booking_status']==3)
	  {
		  ?>

						<a href="Order.php?ID=<?php echo $data['booking_ID']?>&stat=4">Out For Delivery</a>
						<?php
	  }
	  if($data['booking_status']==4)
	  {
		  ?>

						<a href="Order.php?ID=<?php echo $data['booking_ID']?>&stat=5">Delivery Completed</a>
						<?php
	  }
	  ?>
	</td>
</tr>
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
