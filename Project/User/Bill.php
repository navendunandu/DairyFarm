<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET['ID'])){
    $id=$_GET['ID'];
}
else{
    $id=$_SESSION['booking'];
}
$selQry = "select * from tbl_cart c 
inner join tbl_product p on c.product_ID = p.product_ID 
inner join tbl_booking b on c.booking_ID = b.booking_ID 
inner join tbl_subcategory s on s.subcategory_ID=p.subcategory_ID
inner join tbl_category ct on ct.category_ID=s.category_ID
inner join tbl_user u on u.user_ID=b.user_ID where b.booking_ID=".$id;
$result = $con->query($selQry);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        #invoice {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .text-primary {
            color: #3CB815 !important;
        }

        .text-secondary {
            color: #F65005 !important;
        }

        #download-btn button {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
        }

        #download-btn button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-end my-4">
        <button id="cmd" class="btn btn-warning" onClick="printDiv('content')">Download Bill</button>
    </div>

    <div id="content" class="row">
        <div id="invoice" class="col-md-8 mx-auto">
            <h1 class="text-center mb-4">Product Invoice</h1>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="text-primary">Customer Information:</h5>
                    <p><?php echo $data['user_name'] ?></p>
                    <p><?php echo $data['user_address'] ?></p>
                    <p><?php echo $data['user_contact'] ?></p>
                </div>

                <div class="col-md-6 mb-4">
                    <h5 class="text-secondary">company Information:</h5>
                    <p>Dariy Fresh Pvt Limited,</p>                       <p>Pala, Kottayam - 686662</p>
                    <p>customer care: 9487623458</p>
                    
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Product</th>
                        <th scope="col">Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $grandTotal=0;
                $result1=$con->query($selQry);
while($data1 = $result1->fetch_assoc()){

?>
                    <tr>
                        <td>1</td>
                        <td><?php echo $data1['category_name'] ?></td>
                        <td><?php echo $data1['product_code'] ?></td>
                        <td>&#8377; <?php echo number_format($data1['product_price'], 2) ?></td>
                        <td><?php echo $data1['cart_quantity'] ?></td>
                        <td>&#8377; <?php echo number_format($data1['cart_quantity'] * $data1['product_price'], 2) ?></td>
                    </tr>
                    <?php
                    $grandTotal = $grandTotal + ($data1['cart_quantity'] * $data1['product_price']);
}
?>
                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <td colspan="5" class="text-end">Grand Total:</td>
                        <td>&#8377; <?php echo $grandTotal ?></td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-center mt-4">
                <p>Thank you for shopping with us!<br>If you have any questions regarding this invoice, feel free to contact us.</p>
            </div>
        </div>
    </div>
</div>
<button="fghjk">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>