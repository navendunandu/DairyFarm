<?php

include("../connection/connection.php");

session_start();

$selqry="select * from tbl_booking where user_ID='".$_SESSION["uid"]."' and booking_status='0'";
$result=$con->query($selqry);
if($result->num_rows>0)
{
    $selqry="select MAX(booking_ID) as ID from tbl_booking where user_ID='".$_SESSION["uid"]."' and booking_status='0'";
	$res=$con->query($selqry);
	$row=$res->fetch_assoc();
	$bid = $row["ID"];
    $selqry="select * from tbl_cart where booking_ID='".$bid."'and product_ID='".$_GET["pid"]."' and cart_status='0'";
    $result=$con->query($selqry);
    if($result->num_rows>0)
    {
            echo "Already Added to Cart";  
    }
    else
    {
        $insQry1="insert into tbl_cart(product_ID,booking_ID)values('".$_GET["pid"]."','".$bid."')";
        if($con->query($insQry1))
            { 
                echo "Added to Cart";
            }
        else
        {
            echo "Failed";
        }
    }
}
else
{
    $insqry="insert into tbl_booking(user_ID) value('".$_SESSION['uid']."')";
    if ($con->query($insqry))
    {
        $selqry="select MAX(booking_ID) as ID from tbl_booking where user_ID='".$_SESSION["uid"]."' and booking_status='0'";
        $res=$con->query($selqry);
        if($row=$res->fetch_assoc())
        {
            $bid=$row["ID"];
            $insQry1="insert into tbl_cart(product_ID,booking_ID)values('".$_GET["pid"]."','".$bid."')";
            if($con->query($insQry1))
                { 
                    echo "Added to Cart";
                }
            else
            {
                echo "Failed";
            }
        }

    }
}

?>