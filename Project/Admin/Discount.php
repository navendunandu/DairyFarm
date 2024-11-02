<?php
ob_start();
include("Head.php");
?>
<?php
session_start();
include("../Assets/connection/connection.php");

if(isset($_POST['btn_submit']))
{
	$dis=$_POST['txt_discount'];
	$amt=$_POST['txt_amount'];
	$maxamt=$_POST['txt_maxamount'];
	$insQry="insert into tbl_discount(dis_percentage,dis_amount,dis_maxamount)values('$dis','$amt','$maxamt')";
	if($con->query($insQry))
	{
	}
	else
	{
		echo "ERROR";
	}
}
if(isset($_GET['aid']))
	{
		$upsQry="update tbl_discount set dis_status=1 where  dis_ID=".$_GET['aid'];
		if($con->query($upsQry))
		{ echo "updated";
		}
		else
		{
			echo "error";
		}
	}
		if(isset($_GET['did']))
	{
		$upsQry="update tbl_discount set dis_status=0 where  dis_ID=".$_GET['did'];
		if($con->query($upsQry))
		{ echo "updated";
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

<form id="form2" name="form2" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>Discount</td>
    <td>
      <label for="txt_discount"></label>
      <input type="text" name="txt_discount" id="txt_discount" />
    </td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>
      <label for="txt_amount"></label>
      <input type="text" name="txt_amount" id="txt_amount" />
    </td>
  </tr>
  <tr>
    <td>Max.amount</td>
    <td>
      <label for="txt_maxamount"></label>
      <input type="text" name="txt_maxamount" id="txt_maxamount" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
    </td>
  </tr>
</table>
<table width="200" border="1">
  <tr>
    <td>Sl No.</td>
    <td>Discount</td>
    <td>Amount</td>
    <td>Max amount</td>
    <td>Status</td>
    <td>Action</td>
  
  </tr>
  <?php
  $i=0;
  $selQry="select*from tbl_discount";
  $result=$con->query($selQry);
  while($row=$result->fetch_assoc())
  {
	  $i++;
	  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['dis_percentage'] ?></td>
    <td><?php echo $row['dis_amount'] ?></td>
    <td><?php echo $row['dis_maxamount'] ?></td>
    <td><?php if ($row['dis_status']==0)
	  {
		  echo"Discount inactive";
	  }else if ($row['dis_status']==1)
	  {
		  echo "Discount active";
	  }
		?>  
	  </td>
      <td>
      <?php
      if($row['dis_status']==0)
      {
      ?>
    <a href="Discount.php?aid=<?php echo $row['dis_ID'];?>">
Activate</a>
<?php
}
else if($row['dis_status']==1)
{
	?>
<a href="Discount.php?did=<?php echo $row['dis_ID'];?>">
deactivate</a>
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