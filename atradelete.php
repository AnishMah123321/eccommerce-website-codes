<?php
include "session.php";
include "connection.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $id2 = 0;
    $stmt = "select * from shop where TID = '$id'";
    $qry = oci_parse($conn,$stmt);
    oci_execute($qry);
    while($row=oci_fetch_assoc($qry))
    {
        $id2 = $row['SHID'];
    }
    $stmt2  = "select * from product where SHID='$id2'";
    $qry2 = oci_parse($conn,$stmt2);
    oci_execute($qry2);
    while($row=oci_fetch_assoc($qry2))
    {
        $name = $row['PRODUCT_NAME'];
         $stmt8  = " delete from payment5 where PNAME='$name' ";
         $qry8 = oci_parse($conn,$stmt8);
         oci_execute($qry8);
    }  

    $statement = "delete from product where SHID='$id2'";
    $query = oci_parse($conn,$statement);
    $exe=oci_execute($query);
   if($exe)
   {

    $statement2 = "delete from shop where SHID = '$id2'";
    $query2 = oci_parse($conn,$statement2);
    $exe2=oci_execute($query2);
    if($exe2)
    {
        $statement4 = "select * from trader where TID ='$id'";
        $query4 = oci_parse($conn,$statement4);
        $exe4=oci_execute($query4); 
        if($exe4)
        {
            $name = "";
            $email = "";
            while($row12=oci_fetch_assoc($query4))
            {
               $name = $row12['USERNAME'];
               $email = $row12['EMAIL'];
            }
             $stm = "delete from TLOGIN where USERNAME='$name'";
             $qr = oci_parse($conn,$stm);
             $ex = oci_execute($qr);
             if($ex)
             {
                 mail($email,"about Deletion of trader","Your Trader account has been deletd because of breaking law of data duplication");
                 $statement44 = "delete from trader where TID ='$id'";
                  $query44 = oci_parse($conn,$statement44);
                  $exe44=oci_execute($query44); 
                  if($exe44)
                  {
                    echo "
                    <script>
                    alert('Your Trader Has Been Deleted')
                    window.location.href = 'admin.php'
                    </script>
                   ";
                  }
             }
        }
    }
   }
    


}

?>