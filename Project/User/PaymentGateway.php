
<?php 

session_start();

include("../Assets/Connection/connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
function sendMail($email){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dairyproduct638@gmail.com'; // Your gmail
    $mail->Password = 'xwnv ziti ohkg rtui'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('dairyproduct638@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
    $message = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 10px;
            text-align: center;
        }
        .content {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            text-align: center;
        }
        .thank-you {
            font-size: 28px;
            color: #27ae60;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #27ae60;
            color: #fff;
            padding: 10px 20px;
            margin: 20px 0;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Thank You for Your Purchase!
        </div>
        <div class="content">
            <p>Hi there,</p>
            <p class="thank-you">We appreciate your order with GlowKare Dairy Products!</p>
            <p>Your purchase will be carefully packaged and delivered to you shortly.</p>
            <p>If you have any questions or need assistance, feel free to reach out to our customer support.</p>
            <p>We hope you enjoy your fresh, quality dairy products!</p>
        </div>
        <div class="footer">
            &copy; ' . date("Y") . ' GlowKare Dairy Products. All rights reserved.
            <br>This is an automated message. Please do not reply.
        </div>
    </div>
</body>
</html>
';
    $mail->Subject = "Thank You for Your Purchase";
    $mail->Body = $message;

    if($mail->send()) {
        ?>
        <script>
            alert("Email Sent");
            window.location="Success.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Email Failed");
        </script>
        <?php
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="./style.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');
            
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Ubuntu', sans-serif;
            }

            body{
                background: #2196F3;
                margin: 0 10px;
            }

            .payment{
                background: #f8f8f8;
                max-width: 360px;
                margin: 80px auto;
                height: auto;
                padding: 35px;
                padding-top: 70px;
                border-radius: 5px;
                position: relative;
            }

            .payment h2{
                text-align: center;
                letter-spacing: 2px;
                margin-bottom: 40px;
                color: #0d3c61;
            }

            .form .label{
                display: block;
                color: #555555;
                margin-bottom: 6px;
            }

            .input{
                padding: 13px 0px 13px 25px;
                width: 100%;
                text-align: center;
                border: 2px solid #dddddd;
                border-radius: 5px;
                letter-spacing: 1px;
                word-spacing: 3px;
                outline: none;
                font-size: 16px;
                color: #555555;
            }

            .card-grp{
                display: flex;
                justify-content: space-between;
            }

            .card-item{
                width: 48%;
            }

            .space{
                margin-bottom: 20px;
            }

            .icon-relative{
                position: relative;
            }

            .icon-relative .fas,
            .icon-relative .far{
                position: absolute;
                bottom: 12px;
                left: 15px;
                font-size: 20px;
                color: #555555;
            }

            .btn{
                margin-top: 40px;
                padding: 12px;
                text-align: center;
            }


            .payment-logo{
                position: absolute;
                top: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                background: #f8f8f8;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0,0,0,0.2);
                text-align: center;
                line-height: 85px;
            }

            .payment-logo:before{
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                width: 90px;
                height: 90px;
                background: #2196F3;
                border-radius: 50%;
            }

            .payment-logo p{
                position: relative;
                color: #f8f8f8;
                font-family: 'Baloo Bhaijaan', cursive;
                font-size: 58px;
            }

            input[type=submit] {
                background-color: #2196F3;
                border: none;
                color: #f8f8f8;
                font-size: 16px;
                padding: 12px;
                text-align: center;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
            }

            @media screen and (max-width: 420px){
                .card-grp{
                    flex-direction: column;
                }
                .card-item{
                    width: 100%;
                    margin-bottom: 20px;
                }
                .btn{
                    margin-top: 20px;
                }
            }
        </style>
    </head>
	<?php
    if(isset($_POST["btnpay"])!="")
    {
          echo $selqry="select MAX(booking_ID) as ID,user_email from tbl_booking b inner join tbl_user u on u.user_ID=b.user_ID where booking_status='1'";
		  $res=$con->query($selqry);
	      $data=$res->fetch_assoc();
	      $bid=$data["ID"];
		  $_SESSION['booking']=$bid;
            $upD="update tbl_booking set booking_status='2',booking_date=curdate() where booking_ID='$bid' ";
            if($con->query($upD))
            {
            sendMail($data["user_email"]);
            }
        }
	?>
    <body>
        <!-- partial:index.partial.html -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

        <div class="wrapper">
            <div class="payment">
                <div class="payment-logo">
                    <p>p</p>
                </div>
                <h2>Payment Gateway</h2>
                <div class="form">
                    <form method="post">
                        <div class="card space icon-relative">
                            <label class="label">Card holder:</label>
                            <input type="text" class="input" placeholder="Card Holder" required>
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card space icon-relative">
                            <label class="label">Card number:</label>
                            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" required>
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-grp space">
                        <div class="card-item icon-relative">
    <label class="label">Expiry date:</label>
    <input 
        type="text" 
        name="expiry-date" 
        class="input" 
        id="expiry-date" 
        data-mask="00 / 00" 
        placeholder="MM / YY" 
        oninput="validateExpiryDate()"
        required
    >
    <i class="far fa-calendar-alt"></i>
</div>
                            <div class="card-item icon-relative">
                                <label class="label">CVV:</label>
                                <input type="text" class="input" data-mask="000" placeholder="000" required>
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        
    <small id="expiry-error" style="color: red; display: none;">Please enter a valid future date.</small>
                        <div class="btn">
                            <input type="submit" name="btnpay" id="btnpay" value="Pay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- partial -->
        <script>
function validateExpiryDate() {
    const expiryInput = document.getElementById('expiry-date');
    const error = document.getElementById('expiry-error');
    const [month, year] = expiryInput.value.split(' / ').map(Number);

    if (month && year) {
        const now = new Date();
        const currentMonth = now.getMonth() + 1; // JavaScript months are 0-11
        const currentYear = now.getFullYear() % 100; // Get last two digits of the year

        // Validate if the entered date is in the future
        if (year > currentYear || (year === currentYear && month >= currentMonth)) {
            error.style.display = 'none'; // Hide error message
        } else {
            error.style.display = 'block'; // Show error message
        }
    }
}
</script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>

    </body>
</html>