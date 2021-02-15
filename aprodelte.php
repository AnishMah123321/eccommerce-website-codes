<?php
include "session.php";
include "connection.php";
if(isset($_GET['id']))
{
    
    $id = $_GET['id'];
    $stmt2 = "select * from product where PRODUCTNO = '$id' ";
    $qry2 = oci_parse($conn,$stmt2);
    oci_execute($qry2);
    $name = 0;
    $na = '';
    while($row=oci_fetch_assoc($qry2))
    {
        $name = $row['SHID'];
        $na = $row['PRODUCT_NAME'];
    }
     $stmt4 = "select * from SHOP where SHID='$name'";
     $qry4 = oci_parse($conn,$stmt4);
     $exe=oci_execute($qry4);
     $name2 = 0;
     if($exe)
     {
         while($row2=oci_fetch_assoc($qry4))
         {
          $name2=$row2['TID'];
         }
         $stmt5 = "select * from TRADER where TID='$name2'";
         $qry5 = oci_parse($conn,$stmt5);
         $exe2 = oci_execute($qry5);
         if($exe2)
         {
            $email2='';
             while($row4=oci_fetch_assoc($qry5))
             {
               $email2=$row4['EMAIL'];
             }
             $stmt10 = "delete from product where PRODUCTNO = '$id' ";
             $qry10 = oci_parse($conn,$stmt10);
             $ex10 = oci_execute($qry10);
             if($ex10)
             {
                 $stmt11 = "delete from payment5 where PNAME='$na' AND TID='$name2' ";
                 $qry11 = oci_parse($conn,$stmt11);
                 $ex11 = oci_execute($qry11);
                 if($ex11)
                 {
                     mail($email2,"Warining","You have Duplicated the item or image from\n other trader's item next time your trader will be deleted from\nclerkhudder mart");
                     echo "
                        <script>
                        alert('You deleted the product')
                        window.location.href = 'admin.php'
                        </script>
                       ";
                 }
             }
         }
     }      
        
}
     


?>