
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product-Wise Sales Report</title>
</head>
<body>
<center>
    <h1 class="text-success"><u>DeliveryAgent Max Sales Report</u></h1><br>
    <form name="frm_prod" method="POST" action="">
        <table class="table table-bordered bg-warning text-dark" width="565">
            <tr>
                <td width="100"><strong>Start Date</strong></td>
                <td><input type="date" name="txt_start" id="txt_start" class="form-control" /></td>
                <td width="100"><strong>End Date</strong></td>
                <td><input type="date" name="txt_end" id="txt_end" class="form-control" /></td>
                <td width="70">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-success" />
                </td>
            </tr>
        </table><br><br>

        <?php
        ob_start();
        include("Head.php");
        include("../Assets/Connection/Connection.php");

        if (isset($_POST['btn_submit'])) {
            $start = $_POST['txt_start'];
            $end = $_POST['txt_end'];

            $selqry = "SELECT 
                            u.deliveryagent_name, u.deliveryagent_photo, u.deliveryagent_email, u.deliveryagent_contact, u.deliveryagent_address, u.deliveryagent_gender, u.deliveryagent_dob, 
                            COUNT(c.cart_ID) AS total_items
                        FROM 
                            tbl_deliveryagent u
                        JOIN 
                            tbl_booking b ON u.deliveryagent_ID = b.deliveryagent_ID
                        JOIN 
                            tbl_cart c ON c.booking_ID = b.booking_ID
                        WHERE b.booking_date BETWEEN '$start' and '$end'
                        GROUP BY 
                            u.deliveryagent_ID
                        ORDER BY 
                            total_items DESC
                        LIMIT 1";

            $result = $con->query($selqry);

            if ($data = $result->fetch_assoc()) {
        ?>

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-lg">
                                <div class="card-header bg-success text-white text-center">
                                    <h3 class="mb-0">My Profile</h3>
                                </div>
                                <div class="card-body bg-warning">
                                    <div class="row">
                                        <!-- Profile Picture -->
                                        <div class="col-md-4 text-center">
                                            <img src="../Asset/Files/product/<?php echo $data['deliveryagent_photo']; ?>" class="img-fluid rounded-circle mb-3" alt="Profile Picture" width="150">
                                        </div>

                                        <!-- Profile Details -->
                                        <div class="col-md-8">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><strong>Name:</strong></td>
                                                    <td><?php echo $data['deliveryagent_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender:</strong></td>
                                                    <td><?php echo $data['deliveryagent_gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Address:</strong></td>
                                                    <td><?php echo $data['deliveryagent_address']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email:</strong></td>
                                                    <td><?php echo $data['deliveryagent_email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Contact:</strong></td>
                                                    <td><?php echo $data['deliveryagent_contact']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Purchase:</strong></td>
                                                    <td><?php echo $data['total_items']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
                echo "<h1 class='text-center text-danger'>No Data Found</h1>";
            }
            ?>

        <?php
        }
        ?>
    </form>
</center>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>