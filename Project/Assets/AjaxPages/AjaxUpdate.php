<?php

include("../connection/connection.php");

session_start();

$qty=$_GET["qty"];
$cartID=$_GET["cid"];

if($qty<=0)
{
	$delqry="delete from tbl_cart where cart_ID=".$cartID;
	if($con-> query($delqry))
	{
				echo "deleted";
    }
	else
	{
		       echo "Error";
	
		}
}
else
{
	$sql="update tbl_cart SET cart_quantity = '$qty' where cart_ID=".$cartID;			    
	if($con-> query($sql))
	{
				echo "updated";
    }
	else
	{
		        echo "Error";
	
		}
}
 
?>