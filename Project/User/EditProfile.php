<?php

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();

//$uname=$_SESSION['sname'];

$userID=$_SESSION['uid'];
if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$gender=$_POST["rd_gender"];
	$dob=$_POST["txt_dob"];
	$address=$_POST["txtarea_address"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	
		$uqry="update tbl_user SET user_name='$name',user_gender='$gender',user_dob='$dob',user_address='$address',user_email='$email',user_contact='$contact' WHERE user_ID='".$_SESSION['uid']."'";
		if($con->query($uqry))
		{
		?>
        <script>
			window.location="MyProfile.php";
		</script>
        <?php
				
		}
	else
	{
		echo "Error Updating Record!!!: ".$con->error;
    }
}
	$seluser="select * from tbl_user  WHERE user_ID='".$_SESSION['uid']."'";
 	$result=$con->query($seluser);
	$data=$result->fetch_assoc();
	
?>

<html>
<head>
<title>Edit Profile</title>
</head>
<body>
<div class="container my-4 p-4 rounded shadow-sm bg-white">
    <a href="MyProfile.php" class="btn btn-green mb-4">Back</a>
    <h2 class="text-center text-success mb-4"><u>Edit Profile</u></h2>

    <form id="form1" name="form1" method="post" action="">
        <table class="table table-borderless">
            <tr>
                <td><label for="txt_name" class="form-label">Name</label></td>
                <td>
                    <input type="hidden" name="txt_aID" id="txt_aID" value="<?php echo $aID; ?>" />
                    <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $data['user_name']; ?>" required>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Gender</label></td>
                <td>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="rd_gender" id="rd_gender_male" value="Male" <?php echo ($data['user_gender'] == 'Male') ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="rd_gender_male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="rd_gender" id="rd_gender_female" value="Female" <?php echo ($data['user_gender'] == 'Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rd_gender_female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="rd_gender" id="rd_gender_other" value="other" <?php echo ($data['user_gender'] == 'Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rd_gender_other">Other</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label for="txt_dob" class="form-label">Date Of Birth</label></td>
                <td><input type="date" class="form-control" name="txt_dob" id="txt_dob" value="<?php echo $data['user_dob']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="txt_email" class="form-label">Email</label></td>
                <td><input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $data['user_email']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="txtarea_address" class="form-label">Address</label></td>
                <td><textarea class="form-control" name="txtarea_address" id="txtarea_address" rows="4"><?php echo $data['user_address']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="txt_contact" class="form-label">Contact</label></td>
                <td><input type="text" class="form-control" name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" value="<?php echo $data['user_contact']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <button type="submit" name="btn_edit" id="btn_edit" class="btn btn-green mt-3">Edit</button>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>