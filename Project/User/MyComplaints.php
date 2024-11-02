<?php
session_start();

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Complaints</title>
</head>
<body>
<div class="container my-4">
    <a href="Homepage.php" class="btn btn-green mb-4">Home</a>
    <h2 class="text-success text-center mb-4"><u>Complaint Details</u></h2>
    
    <table class="table table-bordered table-green">
        <thead>
            <tr>
                <th>SlNo</th>
                <th>Product Code</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>File</th>
                <th>Reply</th>
                <th>Reply Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $userID = $_SESSION['uid'];
            $selqry = "SELECT * FROM tbl_complaint c 
                       INNER JOIN tbl_product p ON c.product_ID = p.product_ID 
                       INNER JOIN tbl_subcategory sc ON sc.subcategory_ID = p.subcategory_ID 
                       INNER JOIN tbl_category ct ON ct.category_ID = sc.category_ID 
                       WHERE user_ID = $userID";
            $result = $con->query($selqry);
            $i = 0;

            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['product_code']; ?></td>
                <td><?php echo $data['complaint_title']; ?></td>
                <td><?php echo $data['complaint_description']; ?></td>
                <td><?php echo $data['complaint_date']; ?></td>
                <td><?php echo $data['category_name']; ?></td>
                <td><?php echo $data['subcategory_name']; ?></td>
                <td><img src="../Asset/Files/product/<?php echo $data['complaint_file']; ?>" class="img-fluid" style="max-width: 200px;"></td>
                <td><?php echo $data['complaint_reply']; ?></td>
                <td><?php echo $data['complaint_rdate']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>