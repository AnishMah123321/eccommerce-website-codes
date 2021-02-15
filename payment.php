<?php
include "session.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Payment </title>
    <style>
    footer{
      background:black;
      color :white;
      position:fixed;
      width:100%;
      bottom:0px;
    }
   
    .table{
        margin-top:10px;
        margin-bottom:10px;
    }
    form{
      margin:10px;
    }
    </style>
  </head>
  <body>
    <div class="row">
        <div class="col-12">


                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                        <a class="navbar-brand" href="index2.php"><img src="web.png" alt="clerhudder mart" height="40px" width="40px"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            </li>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item">
                            </li>
                          </ul>
                          <span class="navbar-text">
                           <a href='logout.php'> logout </a>
                          </span>
                        </div>
                      </nav>
                

        </div>
    </div>

<div class="row">
    <div class="col-12">
        <?php
         include "connection.php";
         $stmt ="select * from payment5 where CID='$ifak'";
         $stdi2=oci_parse($conn,$stmt);
         $ex = oci_execute($stdi2);
         $total = 0;
         echo "<table class='table'>
         <tr>
         <th><b>Name</b></th> <th><b>Quantity</b></th> <th><b>price</b></th> <th><b>Remove</b></th>";
         while($row=oci_fetch_assoc($stdi2))
         {
          $total2= $row['TOTAL'];
          $name = $row['PNAME'];
          $qty = $row['PQTY'];
          $id = $row['PID'];
          $total = $total + ($total2*$qty);

         echo"<tr> <th>$name</th> <th>$qty</th> <th><b>$total2</th> <th><a href='remove.php?id=$id'>Remove</a></th></tr>";
         }
         echo"<tr> <th></th> <th></th> <th><b>Grand Total</b></th> <th>$total</th></tr>";
         echo "</table>";
        ?>
</div>
</div>
  



<div class="row">
    <div class="col-12">
        <?php
         include "connection.php";
      

      

        $stmt ="select * from payment5 where CID='$ifak'";
        $stdi2=oci_parse($conn,$stmt);
        $ex = oci_execute($stdi2);
        $total = 0;
        if($ex){
        echo "<form action='https://www.sandbox.paypal.com/us/signin' method='post'>
         <input type='hidden' name='cmd' value='_cart'>
         <input type='hidden' name='upload' value='1'>
         <input type='hidden' name='business' value='rahul29090-facilitator@outlook.com'>";
         $count = 0;
        while($row=oci_fetch_assoc($stdi2))
        {
         $total2= $row['TOTAL'];
         $name = $row['PNAME'];
         $qty = $row['PQTY'];
         $id = $row['PID'];
         $total = $total + $total2;
         $count = $count + 1;

       echo "<input type='hidden' name='item_name_$count' value='$name'>
         <input type='hidden' name='amount_$count' value='$total2'>
         <input type='hidden' name='quantity_$count' value='$qty'>";
        
        }
       echo" <input type='submit' value='PayPal payment' class='btn btn-primary'>
        </form>";

       }
        ?>
</div>
</div>


  <footer>
    <div class="row">
      <div class="col-12">
        <center><h6>Copyright&copy;Clerhuddermart.com</h6></center>
      </div>
    </div>
  </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>