<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $dob = $_POST["txt_dob"];
    $gender = $_POST["rd_gender"];
    $address = $_POST["txtarea_address"];
    $contact = $_POST["txt_contact"];
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];
    $confirm = $_POST["txt_confirm"];

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $selUser = "SELECT * FROM tbl_user WHERE user_email='$email'";
        $selAdmin = "SELECT * FROM tbl_admin WHERE admin_email='$email'";
        $selDeliverAgent = "SELECT * FROM tbl_deliveryagent WHERE deliveryagent_email='$email'";

        $resUser = $con->query($selUser);
        $resAdmin = $con->query($selAdmin);
        $resDeliverAgent = $con->query($selDeliverAgent);

        if ($resAdmin->num_rows > 0 || $resUser->num_rows > 0 || $resDeliverAgent->num_rows > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            $photo = $_FILES['file_photo']['name'];
            $tempphoto = $_FILES['file_photo']['tmp_name'];
            move_uploaded_file($tempphoto, '../Asset/Files/Userdocs/' . $photo);

            $insqry = "INSERT INTO tbl_user (user_name, user_dob, user_gender, user_address, user_contact, user_email, user_password, user_photo) 
                       VALUES ('$name', '$dob', '$gender', '$address', '$contact', '$email', '$password', '$photo')";
            
            if ($con->query($insqry)) {
                echo "<script>alert('Successfully Registered'); window.location='NewUser.php';</script>";
            } else {
                echo "<script>alert('Error occurred during registration');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New User Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #d9f2d9;
    }
    .form-container {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        margin: auto;
    }
    .btn-custom {
        background-color: #4caf50;
        color: #ffffff;
    }
</style>
</head>
<body>

<div class="container mt-5">
    <a href="Homepage.php" class="btn btn-secondary mb-4">Home</a>
    <div class="form-container">
        <h2 class="text-center mb-4">New User Registration</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name must start with a capital letter and contain only letters and spaces">
            </div>
            <div class="mb-3">
                <label for="txt_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="txt_dob" id="txt_dob" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="rd_gender" id="rd_gender_male" value="Male" required> Male
                <input type="radio" name="rd_gender" id="rd_gender_female" value="Female"> Female
                <input type="radio" name="rd_gender" id="rd_gender_other" value="Other"> Other
            </div>
            <div class="mb-3">
                <label for="txtarea_address" class="form-label">Address</label>
                <textarea name="txtarea_address" id="txtarea_address" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="txt_contact" class="form-label">Contact</label>
                <input type="text" class="form-control" name="txt_contact" id="txt_contact" required pattern="[7-9]{1}[0-9]{9}">
            </div>
            <div class="mb-3">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" class="form-control" name="txt_email" id="txt_email" required>
            </div>
            <div class="mb-3">
                <label for="txt_password" class="form-label">Password</label>
                <input type="password" class="form-control" name="txt_password" id="txt_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}">
            </div>
            <div class="mb-3">
                <label for="txt_confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="txt_confirm" id="txt_confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}">
            </div>
            <div class="mb-3">
                <label for="file_photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="file_photo" id="file_photo" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="btn_submit" class="btn btn-custom">Submit</button>
                <button type="reset" name="btn_cancel" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("txt_confirm").oninput = function() {
    if (this.value !== document.getElementById("txt_password").value) {
        this.setCustomValidity("Passwords do not match");
    } else {
        this.setCustomValidity("");
    }
};
</script>
</body>
</html>
