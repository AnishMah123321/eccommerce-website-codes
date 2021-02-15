<?php
$connect=oci_connect('ADMIN','raghu','//localhost/xe');
if($connect)
{
   // echo "you are connected";
}
else
{
    echo "you are not connected";
}
?>