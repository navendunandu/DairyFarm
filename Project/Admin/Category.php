<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");

$name='';
$aID=0;
{
	if(isset($_POST["btn_submit"]))
{
	$aID=$_POST["txt_aID"];
	$name=$_POST["txt_name"];

$selCat="select * from tbl_category where category_name='".$name."'";
$resCat=$con->query($selCat);
if($resCat->num_rows>0){
  ?>
<script>
  alert("Category already exist")
</script>
  <?php
}
else

	if($aID!=0)
	{
		$uqry="update tbl_category SET category_name='$name' WHERE category_ID='$aID'";
		if($con->query($uqry))
		{
		?>
            <script>
				alert("updated");
				window.location="Category.php";
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
		$insqry="insert into tbl_category(category_name)values('$name')";
		if($con->query($insqry))
		{
		?>
        <script>
			alert("inserted");
			window.location="Category.php";
		</script>
        <?php
	}
	else
	{
		echo "error";
    }
}
}
}
if(isset($_GET["delID"]))
{
$categoryID=$_GET["delID"];
$delqry="delete from tbl_category where category_ID=$categoryID";

	if($con-> query($delqry))
	{
	
?>
        <script>
				alert("deleted");
				window.location="Category.php";
		</script>
<?php
    }
	else
	{
		 echo "Error";
	
		}
}
if(isset($_GET["eID"]))
{
	$aID=$_GET["eID"];
	$selqry="select * from tbl_category where category_ID='$aID'";
 	$result=$con->query($selqry);
	$data=$result->fetch_assoc();
	$name=$data['category_name'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="" method="POST">
<table border="1">
  <tr>
    <td>Category</td>
    <td><label for="txt_name"></label>
      <input type="hidden" name="txt_aID" id="txt_aID" value="<?php echo $aID ;?>" />
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $name ;?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
  </tr>
</table><br>
<table width="282"  border="1">
  <tr>
    <td width="30">Sno</td>
    <td width="104">Name</td>
    <td width="66">Action</td>
  </tr>
  <?php
 
	$selqry="select * from tbl_category";
 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data['category_name']; ?></td>
    <td><a href="category.php?delID=<?php echo $data['category_ID'];?>">Delete</a>
    <a href="category.php?eID=<?php echo $data['category_ID'];?>">Edit</a></td>
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