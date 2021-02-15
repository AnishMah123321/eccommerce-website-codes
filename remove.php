<?php
include "session.php";
include "connection.php";
$qtyla = 0;
$new = 0;
if(isset($_GET['id']))
{
$id = $_GET['id'];
$stmt2 = "select * from payment5 where PID='$id' AND CID='$ifak'";
$stdi2 = oci_parse($conn,$stmt2);
$exe2 = oci_execute($stdi2);
$prona = "";

if($exe2)
{
  while($row=oci_fetch_assoc($stdi2))
  {
      $prona = $row['PNAME'];
      $qty = $row['PQTY'];
      $qtyla = $qty;
  }
  include "connection.php";
  $stmt4 = "select * from product where PRODUCT_NAME='$prona'";
  $qry4 = oci_parse($conn,$stmt4);
  $exe4 = oci_execute($qry4);
  if($exe4)
  {
      $qty2 = 0;
      while($row2=oci_fetch_assoc($qry4))
      {
        $qty2 = $row2['QUANTITI'];
      }
      $new = $qtyla+$qty2;
      echo "$new";


      $stmt5 = "update product set QUANTITI=$new where PRODUCT_NAME='$prona'";
      $qry5 = oci_parse($conn,$stmt5);
      $exe5 = oci_execute($qry5);
      if($exe5)
      {
        $stmt = "delete from payment5 where PID='$id' AND CID='$ifak'";
        $stdi = oci_parse($conn,$stmt);
        $ex = oci_execute($stdi);
        if($ex)
        {
            header('Location:payment.php');
        } 
        else{
            echo "Oops";
        }
      }
  }
}

}
?>