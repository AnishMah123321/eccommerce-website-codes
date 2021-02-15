<?php
$conn=oci_connect('ADMIN','raghu','//localhost/xe');
if($conn)
{
   // echo "you are connected";
}
else
{
    echo "you are not connected";
}
?>