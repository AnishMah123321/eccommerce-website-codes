<?php
include "session.php";
include "connection.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
        $stmt2 = "delete from payment5 where CID='$id' ";
        $qry2 = oci_parse($conn,$stmt2);
        $exe2 = oci_execute($qry2);
        if($exe2)
        {
            $stmt = "select *  from customer where CID='$id' ";
            $qry = oci_parse($conn,$stmt);
            $exe = oci_execute($qry);
            if($exe)
            {
                $email = "";
                while($row=oci_fetch_assoc($qry))
                {
                    $email = $row['EMAIL'];
                }
                mail($email,"Deleted Info","Your Customer user have been deleted");
                $stmt4 = "delete from customer where CID='$id' ";
                $qry4 = oci_parse($conn,$stmt4);
                $exe4 = oci_execute($qry4);
                if($exe4)
                {
                    echo "
                        <script>
                        alert('you deleted the cutsomer')
                        window.location.href = 'admin.php'
                        </script>
                       ";
                }
            }

        }
    
}
?>