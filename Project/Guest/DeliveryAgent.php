<?php

include("../Assets/Connection/Connection.php");

	
	if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$dob=$_POST["txt_dob"];
	$gender=$_POST["rd_gender"];
	$address=$_POST["txtarea_address"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
   $confirm=$_POST["txt_confirm"];	
   
   $selUser="select * from tbl_user where user_email='".$email."'";
	$selAdmin="select * from tbl_admin where admin_email='".$email."'";
	$selDeliveryAgent="select * from tbl_deliveryagent where deliveryagent_email='".$email."'";
	
	
	$resUser=$con->query($selUser);
	$resAdmin=$con->query($selAdmin);
	$resDeliveryAgent=$con->query($selDeliveryAgent);
	
if($resAdmin->num_rows>0 || $resUser->num_rows>0 || $resDeliveryAgent->num_rows>0){
  ?>
<script>
  alert("Mail id already exist")
</script>
  <?php
}
else{	
	
	$photo=$_FILES['file_photo']['name'];
	$tempphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Assets/Files/product/'.$photo); 
	
	$proof=$_FILES['file_proof']['name'];
	$tempproof=$_FILES['file_proof']['tmp_name'];
	move_uploaded_file($tempproof, '../Assets/Files/product/'.$proof);  
	    
		    $insqry="insert into tbl_deliveryagent(deliveryagent_name,deliveryagent_dob,
			deliveryagent_gender,deliveryagent_address,deliveryagent_contact,deliveryagent_email,deliveryagent_password,deliveryagent_proof,deliveryagent_photo) 														
								  values('$name','$dob','$gender','$address','$contact','$email','$password','$proof','$photo')";
		if($con->query($insqry))
		{
		?>
        <script>
			alert("Successfully Registed");
			window.location="DeliveryAgent.php";
		</script>
        <?php
	}
	else
	{
		echo "error";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Agent Registration</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to bottom right, #f2f2f2, #d9ffcc);
            font-family: Arial, sans-serif;
        }
        
        .registration-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-floating label {
            transition: 0.3s;
        }

        .form-floating input:focus ~ label,
        .form-floating input:not(:placeholder-shown) ~ label {
            top: -20px;
            left: 0;
            font-size: 12px;
            color: #198754;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }

        .btn-custom {
            background-color: #198754;
            color: white;
        }

        .btn-custom:hover {
            background-color: #145a32;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="registration-container">
        <h3 class="text-center text-success mb-4">Delivery Agent Registration</h3>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txt_name" name="txt_name" required placeholder="Name" pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter">
                <label for="txt_name">Name</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="txt_dob" name="txt_dob" required>
                <label for="txt_dob">Date of Birth</label>
            </div>

            <div class="mb-3">
                <label>Gender:</label><br>
                <input type="radio" id="rd_gender" name="rd_gender" value="Male" required> Male
                <input type="radio" id="rd_gender" name="rd_gender" value="Female"> Female
                <input type="radio" id="rd_gender" name="rd_gender" value="Other"> Other
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" id="txtarea_address" name="txtarea_address" rows="3" required placeholder="Address"></textarea>
                <label for="txtarea_address">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txt_contact" name="txt_contact" required placeholder="Contact" pattern="[7-9]{1}[0-9]{9}">
                <label for="txt_contact">Contact</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="txt_email" name="txt_email" required placeholder="Email">
                <label for="txt_email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="txt_password" name="txt_password" required placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}">
                <label for="txt_password">Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="txt_confirm" name="txt_confirm" required placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}">
                <label for="txt_confirm">Confirm Password</label>
            </div>

            <div class="mb-3">
                <label>Proof:</label>
                <input type="file" class="form-control" name="file_proof" required>
            </div>

            <div class="mb-3">
                <label>Photo:</label>
                <input type="file" class="form-control" name="file_photo" required>
            </div>

            <div class="text-center">
                <button type="submit" name="btn_submit" class="btn btn-custom">Register</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
