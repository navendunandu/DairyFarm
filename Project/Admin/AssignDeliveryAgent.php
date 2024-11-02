<?php
ob_start();
include("Head.php");
?>
<?php
session_start();
 include("../Assets/Connection/Connection.php");
 if(isset($_POST["btn_submit"]))
 {
	$deliveryagent=$_POST["DeliveryAgent"];
	$upQry="update tbl_booking set booking_status=3, deliveryagent_ID=".$_POST['DeliveryAgent']." where booking_ID=".$_GET['bid'];
	if($con->query($upQry)){
		
		$upQry="update tbl_deliveryagent set deliveryagent_availability=1 where deliveryagent_ID=".$_POST['DeliveryAgent'];
		
		
	?>
    <script>
	alert("Assigned")
	window.location="UserBooking.php"
	</script>
    <?php	
	}
 }
?>

  <form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Agent</td>
      <td> 
	  <select name="DeliveryAgent">
	  <option value="----select----">----select----</option>
	  <?php
	  $SelQry="select * from tbl_deliveryagent where deliveryagent_status=1 and deliveryagent_availability=0";
	  
	  $result=$con->query($SelQry);
	  while($data=$result->fetch_assoc())
	  {
		  ?>
		 <option value="<?php echo $data['deliveryagent_ID']?>"><?php echo $data['deliveryagent_name'];?></option>
		 <?php
	  }
	  ?></select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>