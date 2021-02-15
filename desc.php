<?php
include "session.php";
if(isset($_GET['msg']))
{
    $id = $_GET['msg'];
    include "connection.php";
         $stmt5 ="select * from product where PRODUCTNO='$id' ";
         $stdi5=oci_parse($conn,$stmt5);
         $ex5 = oci_execute($stdi5);
         $count = 0;
         if($ex5)
         {
             while($ro = oci_fetch_assoc($stdi5))
             {
                 $count = $count + 1;
             }
         }


         if(isset($_POST['submit2']))
            {
            $pname = $_POST['productname'];
            $price = $_POST['productprice'];
            $qty = $_POST['productqty'];
            $td2 = $_POST['trader2'];
            $total = $price * $qty;
            $stmt = "insert into payment5 values(PAYMENT2.NEXTVAL,'$ifak','$pname','$qty','$total',$td2)";
            $stdi2 = oci_parse($conn,$stmt);
            $ex = oci_execute($stdi2);
            if($ex)
            {
              echo "<script>alert('Added to cart')</script>";
            }
            
            }
}


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
    .col-4{
        text-align:right;
    }
  .col-4 img
  {
      width:80%;
     height:100px;
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
<br/>
<div class="row">
    <div class="col-12">
      <?php
          include "connection.php";
          $stmtk ="select * from product where PRODUCTNO='$id' ";
          $stdi2=oci_parse($conn,$stmtk);
          $ex = oci_execute($stdi2);
          if($count>=1)
          {
             while($row=oci_fetch_assoc($stdi2))
             {
              $id= $row['PRODUCTNO'];
              $name = $row['PRODUCT_NAME'];
              $price = $row['PRICE'];
              $img = $row['image'];
              $desc = $row['DESCRIPTION'];
              $ofid = $row['OFID'];
              $shid = $row['SHID'];
              $qury = "select * from offer where OFID='$ofid'";
              $stmt2 = oci_parse($conn,$qury);
               oci_execute($stmt2);
              while($row5=oci_fetch_assoc($stmt2))
              {
                $ofna = $row5['OFNAME'];
                $ofadu = $row5['OFDURATION'];
              }
                 $qury10 = "select * from shop where SHID='$shid'";
                 $stmt10 = oci_parse($conn,$qury10);
                 oci_execute($stmt10);
                 $trader4="";
                 while($row10=oci_fetch_assoc($stmt10))
                 {
                   $trader4 = $row10['TID'];
                 }
              echo "<div class='row'>
              <div class='col-4'>
              <img src='uploads/$img' >
              </div>
              <div class='col-8'>
               <h6><b>Name:$name<br/>Price:$price<br/>Offer name:$ofna<br/>offer duaration:$ofadu</b> </h6>
               <form action='' method='post' enctype='multipart/form-data'>
               <input type='hidden' value='$id' name='productno'>
               <input type='hidden' value='$name' name='productname' >
               <input type='hidden' value='$price' name='productprice' >
               <input type='hidden' value='$trader4' name='trader2'>
                 <select name='productqty'>
                 <option value='1'>1</option>
                 <option value='2'>2</option>
                 <option value='3'>3</option>
                 <option value='4'>4</option>
                 <option value='5'>5</option>
                 </select>
                 <input type='submit' class='btn btn-primary' name='submit2' value='Add to cart'>
               </form>
              </div>
              </div> 
             
              <br/>
              <div class='row' style='margin:10px'>
              <div class='col-6'>
              <h4>Description</h4>
               <b>$desc</b>
              </div>
              </div>
              
              
              ";
             }
          }
          else{
             echo "
             <script>
             alert('data not found')
             window.location.href = 'index2.php'
             </script>
            ";
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