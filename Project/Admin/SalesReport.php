<?php
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product-Wise Sales Report</title>
</head>
<body>
<center>
<h6 class="font-extrabold mb-0">
<form name="frm_prod" method="POST" action="">
<table width="600" border="5">
  <tr>
    <td width="100">Start Date</td>
    <td><label for="txt_start"></label>
      <input type="date" name="txt_start" id="txt_start" />
    </td>
    <td width="100">End Date</td>
    <td><label for="txt_end"></label>
      <input type="date" name="txt_end" id="txt_end" /></td>
    <td width="100">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
  </tr>

</table><br><br>
<?php

include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	$start=$_POST['txt_start'];
	$end=$_POST['txt_end'];
	$selqry="SELECT * FROM tbl_booking b
              inner join tbl_cart c on c.booking_ID=b.booking_ID 
              INNER JOIN tbl_product p on p.product_ID=c.product_ID 
             inner join tbl_subcategory s on p.subcategory_ID=s.subcategory_ID
						 inner join tbl_category t on s.category_ID=t.category_ID
              where b.booking_date BETWEEN '$start' and '$end '";
$result=$con->query($selqry);
$i=0;
?>

<table  border="5">
  <tr>
    <td width="100" height="55" >Sno</td>
    <td width="100" >Category</td>
    <td width="100" >Subcategory</td>
   
    
    <td width="100" >Date</td>
    <td width="100" >Quantity</td>
    <td width="100">Price</td>
    <td width="100" >Image</td>
  </tr>
  <?php
while($data=$result->fetch_assoc())
{
	$i++;
?>
  <tr>
         <td><center><?php echo $i; ?></center></td>
         <td><?php echo $data['category_name']; ?></td>
         <td><?php echo $data['subcategory_name']; ?></td> 
        
         
         <td><?php echo $data['booking_date']; ?></td>
         <td><center><?php echo $data['cart_quantity']; ?></center></td>        
         <td><?php echo $data['booking_amount']; ?></td>
      <td><img src="../Asset/Files/Product/<?php echo $data['product_photo']; ?>" width="100" height="100"></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
}
?>
</form>
</h6>
</center>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>