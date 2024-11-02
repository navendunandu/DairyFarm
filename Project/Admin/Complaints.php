<?php
ob_start();
include("Head.php");
?>
<?php
include("../Assets/Connection/connection.php");

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">

<table width="400" border="1">
  <tr>
    <td>SNo</td>
    <td>product code</td>
    <td>Date</td>
    <td>Title</td>
    <td>Product</td>
    <td>File</td>
    <td>Description</td>
    <td>Reply</td>
    
  </tr>
  <?php
  $i=0;
  $selqry="select * from tbl_complaint c inner join tbl_product p on c.product_ID=p.product_ID ";

  $result=$con->query($selqry);
  while($row=$result->fetch_assoc())
  {
	  $i++;
	  
  ?>
  <tr>
    <td><?php echo $i?></td>
       <td><?php echo $row['product_code'] ?></td>
    <td><?php echo $row['complaint_date'] ?></td>
    <td><?php echo $row['complaint_title'] ?></td>
    <td><?php echo $row['category_name'] ?></td>
    <td><img src="../Asset/Files/product/<?php echo $row['complaint_file'];?>" width="400" height=400"/></td>
    <td><?php echo $row['complaint_description'] ?></td>
    <td><a href="Reply.php?cid=<?php echo $row['complaint_ID'] ?>">Reply</a></td>
    
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