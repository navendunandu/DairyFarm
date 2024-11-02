<option value="">Select Sub-Category</option>
<?php
include("../connection/connection.php");
$selQry="select * from tbl_subcategory where category_ID=".$_GET['cid'];
$result=$con->query($selQry);
while($data=$result->fetch_assoc())
{
?>
<option value="<?php echo $data['subcategory_ID']?>"><?php echo $data['subcategory_name'];?></option>
<?php
}
?>