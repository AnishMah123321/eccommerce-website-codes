<?php
include "session.php";
include "connection.php";
$id = 0;
if(isset($_GET['id']))
{
  $id=$_GET['id'];
}
$stmt = "update trader set ACTIVATE='A' where TID='$id'";
$qry = oci_parse($conn,$stmt);
$exe = oci_execute($qry);
if($exe)
{
    $stmt2 = "select * from trader where TID='$id'";
    $qry2 = oci_parse($conn,$stmt2);
    $exe2 = oci_execute($qry2);
    if($exe2)
    {
        $mail = "";
        while($row=oci_fetch_assoc($qry2))
        {
            $mail = $row['EMAIL'];
        }
        mail($mail,"your dashboard activate","please login to your dashboard with your default crediational \n and add product\n Oracle Dashboard Password:password");
        header("Location:admin.php");
    }
}


?>