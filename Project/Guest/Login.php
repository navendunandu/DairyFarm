<?php

include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btn_submit"]))
{
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];

    $selUser = "select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
    $selAdmin = "select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
    $selDeliveryAgent = "select * from tbl_deliveryagent where deliveryagent_email='".$email."' and deliveryagent_password='".$password."'";

    $resUser = $con->query($selUser);
    $resAdmin = $con->query($selAdmin);
    $resDeliveryAgent = $con->query($selDeliveryAgent);

    if($userData = $resUser->fetch_assoc())
    {
        $_SESSION['uid'] = $userData['user_ID'];
        $_SESSION['uname'] = $userData['user_name'];
        header("location:../User/Homepage.php"); 
    }
    else if($adminData = $resAdmin->fetch_assoc())
    {
        $_SESSION['aid'] = $adminData['admin_ID'];
        $_SESSION['aname'] = $adminData['admin_name'];
        header("location:../Admin/Homepage.php");
    }
    else if($deliveryagentData = $resDeliveryAgent->fetch_assoc())
    {
        $_SESSION['did'] = $deliveryagentData['deliveryagent_ID'];
        $_SESSION['dname'] = $deliveryagentData['deliveryagent_name'];
        header("location:../DeliveryAgent/Homepage.php"); 
    }
    else
    {
        ?>
        <script>
        alert("Invalid Credential");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Farm Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom right, #f2f2f2, #d9ffcc);
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
            color: #006600;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-group {
            position: relative;
            margin-bottom: 30px;
        }

        .form-group label {
            position: absolute;
            top: 11px;
            left: 15px;
            font-size: 16px;
            color: #aaa;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus + label, 
        .form-control:valid + label {
            top: -18px;
            left: 10px;
            font-size: 12px;
            color: #339933;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .submit-btn {
            width: 100%;
            background-color: #339933;
            border: none;
            color: white;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #267326;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #339933;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2 class="login-header">  Login</h2>

    <form action="" method="post">
        <div class="form-group">
            <input type="email" name="txt_email" id="txt_email" class="form-control" required>
            <label for="txt_email">Email</label>
        </div>

        <div class="form-group">
            <input type="password" name="txt_password" id="txt_password" class="form-control" required>
            <label for="txt_password">Password</label>
        </div>

        <div class="forgot-password">
            <a href="ForgetPassword.php">Forget Password?</a>
        </div>

        <button type="submit" name="btn_submit" class="submit-btn">Submit</button>

        <div class="login-footer">
            <a href="../">Back to Homepage</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
