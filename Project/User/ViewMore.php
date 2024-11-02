<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
session_start();

$ID = $_GET['pID'];

$selqry = "SELECT * FROM tbl_product p 
            INNER JOIN tbl_subcategory s ON p.subcategory_ID=s.subcategory_ID 
            INNER JOIN tbl_category c ON s.category_ID=c.category_ID 
            WHERE p.product_ID=" . $ID;

$result = $con->query($selqry);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View More</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table {
            background-color: white;
        }
        .table td, .table th {
            color: #28a745;
        }
        .table th {
            background-color: #28a745;
            color: white;
        }
        .gallery img {
            border: 2px solid #28a745;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="Search.php" class="btn btn-secondary mb-3">Back</a>
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Product Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Category</th>
                            <td><?php echo $data['category_name']?></td>
                        </tr>
                        <tr>
                            <th>SubCategory</th>
                            <td><?php echo $data['subcategory_name']?></td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td><?php echo $data['product_quantity']?></td>
                        </tr>
                        <tr>
                            <th>Product Description</th>
                            <td><?php echo $data['product_details']?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?php echo $data['product_price']?></td>
                        </tr>
                        <tr>
                            <th>MFD</th>
                            <td><?php echo $data['product_mfd']?></td>
                        </tr>
                        <tr>
                            <th>EXP</th>
                            <td><?php echo $data['product_exp']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="gallery mt-4">
            <h5 class="text-center">Product Gallery</h5>
            <div class="row">
                <?php
                $i = 0;
                $selGal = "SELECT * FROM tbl_gallery WHERE product_ID='$ID'";
                $gresult = $con->query($selGal);
                while ($pic = $gresult->fetch_assoc()) {
                    $i++;
                ?>
                <div class="col-md-3 mb-3">
                    <img src="../Asset/Files/product/<?php echo $pic['gallery_image']?>" class="img-fluid" alt="Product Image">
                </div>
                <?php
                    if ($i % 4 == 0) {
                        echo "</div><div class='row'>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_flush();
?>
