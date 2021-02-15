<?php
include "session.php";
include "connection.php";
$id = 0;
if(isset($_GET['id']))
{
  $id=$_GET['id'];
}
$stmt = "update customer set ACTIVATE='A' where CID='$id'";
$qry = oci_parse($conn,$stmt);
$exe = oci_execute($qry);
if($exe)
{
    $stmt2 = "select * from customer where CID='$id'";
    $qry2 = oci_parse($conn,$stmt2);
    $exe2 = oci_execute($qry2);
    if($exe2)
    {
        $mail = "";
        while($row=oci_fetch_assoc($qry2))
        {
            $mail = $row['EMAIL'];
        }
        mail($mail,"customer activate","happy shopping !!!\n visit link:http://localhost/project%20management/index.php");
        header("Location:admin.php");
    }
}


?>