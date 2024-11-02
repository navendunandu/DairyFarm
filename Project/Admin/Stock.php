<?php
ob_start();
include("Head.php");
?>
<?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST['btnsubmit']))
{
	$stock=$_POST['txtstock'];
	$ProductID = $_GET["pid"];
	 $insQry="insert into tbl_stock	(stock_quantity,stock_date,product_ID) values 
	 ('$stock',curdate(),'$ProductID')";
	 if($con->query($insQry))
	 {
?>
      <script>
	  alert("inserted");
	  window.location="Stock.php?pid=<?php echo $ProductID ?>";
	  </script>
      <?php
	 }
	 else
	 {
		 echo "error";
	 }
}
 if(isset($_GET["delID"]))
    {
	$stockID = $_GET["delID"];
	$delQry = "delete from tbl_stock where stock_ID = '$stockID'";
	if($con -> query($delQry))
	 {
    ?>
   <script>
   			alert("Deleted");
			window.location="Stock.php";
   </script>
	 <?php
	 }
	 else
	 {
		 echo "error";
	 }
	}
	?>
	
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="POST">
<table wIDth="200" border="1">
  <tr>
    <td>Stock Quantity</td>
    <td><input name="txtstock" type="text" ID="txtstock" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="btnsubmit" type="submit" value="Submit"/></td>    
  </tr>
</table>

<table wIDth="200" border="1">
  <tr>
    <td>slno</td>
    <td>Date</td>
    <td>Quantity</td>
    <td>Action</td>
  </tr>
  <?php
  $selQry="select * from tbl_stock where product_id =".$_GET['pid'];
  $result=($con->query($selQry));
  $i=0;
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  <tr> 
    <td><?php echo $i?></td>
    <td><?php echo $data['stock_date']?></td>
    <td><?php echo $data['stock_quantity']?></td>
    <td><a href="Stock.php?delID=<?php echo $data['stock_ID']?>">Delete</a></td>
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