<?php
ob_start();
include("Head.php");
?>
<?php

include("../Assets/Connection/Connection.php");
	
	if(isset($_POST["btn_submit"]))
{
	$category=$_POST["selcategory"];
	$name=$_POST["txt_name"];
	
$selSub="select * from tbl_subcategory where subcategory_name='".$name."'";
$resSub=$con->query($selSub);
if($resSub->num_rows>0){
  ?>
<script>
  alert("Subcategory already exist")
</script>
  <?php
}
else
{

	
	 $insqry="insert into tbl_subcategory(subcategory_name,category_ID)values('$name','$category')";
		if($con->query($insqry))
		{
		?>
        <script>
			alert("inserted");
			window.location="Subcategory.php";
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
$subcategoryID=$_GET["delID"];
$delqry="delete from tbl_subcategory where subcategory_ID=$subcategoryID";

	if($con-> query($delqry))
	{
	
?>
        <script>
				alert("deleted");
				window.location="Subcategory.php";
		</script>
<?php
    }
	else
	{
		 echo "Error";
	
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="" method="POST">
<table border="1">

<tr>
<td>Category</td>
<td>
<select name="selcategory">
	<option value="---select---">---select---</option>
<?php
$selqry="select * from tbl_category";
 	$result=$con->query($selqry);
	while($data=$result->fetch_assoc())
	{ 
?>
		<option value="<?php  echo $data['category_ID']?>"><?php echo $data['category_name'] ;?></option>
		<?php
			}
		?>
    	</select>
    </td>
</tr>
  <tr>
    <td>subcategory</td>
    <td><label for="txt_subcategory"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
  </tr>
</table><br>
<table border="1">
  <tr>
    <td>Sno</td>
    <td>Category</td>
    <td>Subcategory</td>
    <td>Action</td>
  </tr>
  <?php
 
	$selqry="select * from tbl_subcategory s inner join tbl_category c on s.category_ID=c.category_ID";
 	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
	{ 
	$i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
     <td><?php echo $data['category_name'] ?></td>
     <td><?php echo $data['subcategory_name'] ?></td>
    <td><a href="Subcategory.php?delID=<?php echo $data['subcategory_ID'];?>">Delete</a></td>
  </tr>
  <?php
}
?>
</table>
<p>&nbsp;</p>
 </div>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>