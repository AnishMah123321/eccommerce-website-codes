<?php
include "connection.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    echo "$id";

    $stmt2 = "select * from product where PRODUCTNO = '$id' ";
    $qry2 = oci_parse($conn,$stmt2);
    oci_execute($qry2);
    $name = "";
    while($row=oci_fetch_assoc($qry2))
    {
        $name = $row['PRODUCT_NAME']; 
    }

     $stmt = "delete from product where PRODUCTNO = '$id' ";
    $qry = oci_parse($conn,$stmt);
    $ex = oci_execute($qry);
     if($ex)
     {
        $stmt4 = "delete from payment5 where PNAME = '$name' ";
        $qry4 = oci_parse($conn,$stmt4);
        $ex4 = oci_execute($qry4);
        if($ex4)
        {
            echo "
                        <script>
                        alert('You deleted the product')
                        window.location.href = 'traderdashboard.php'
                        </script>
                       ";
           
        }
     }
}


?>