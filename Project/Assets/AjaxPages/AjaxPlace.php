<option value="">Select Place</option>
<?php
include("../connection/connection.php");
$selQry="select * from tbl_place where district_ID=".$_GET['pid'];
$result=$con->query($selQry);
	while($data=$result->fetch_assoc())
	{ 
?>
		<option value="<?php  echo $data['place_ID']?>"><?php echo $data['place_name'] ;?></option>
		<?php
			}
		?>