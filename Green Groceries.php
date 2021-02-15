<?php
include "session.php";
    include "connection.php";
    $stmt = "select * from trader where CATEGORY='Green Groceries'";
    $qry = oci_parse($conn,$stmt);
    $exe = oci_execute($qry);
    while($row=oci_fetch_assoc($qry))
    {


        $id = $row['TID'];
        $stmt2 = "select * from shop where TID='$id'";
        $qry2 = oci_parse($conn,$stmt2);
        $exe2 = oci_execute($qry2);

        while($row=oci_fetch_assoc($qry2))
        {
         $id2 = $row['SHID'];
         $stmt5 ="select * from product where SHID='$id2'";
         $stdi5=oci_parse($conn,$stmt5);
         $ex5 = oci_execute($stdi5);
         $count = 0;
         if($ex5)
         {
             while($row = oci_fetch_assoc($stdi5))
             {
                 $count = $count + 1;
             }
         }


         if(isset($_POST['submit2']))
         {
          $id = $_POST['productno'];
          $pname = $_POST['productname'];
          $price = $_POST['productprice'];
          $qty = $_POST['productqty'];
          $td = $_POST['trader2'];
          $total = $price;
          $quan = $_POST['quan'];
          $comp = $quan-$qty;
          if($comp<=0)
          {
            echo "<script>alert('Out Of stock')</script>";
          }
          else 
          {
                $qry8 = "select * from payment5 where CID='$ifak'";
                $stmt = oci_parse($conn,$qry8);
                oci_execute($stmt);
                $data = 0;
                $data2 = 0;
                while($row=oci_fetch_assoc($stmt))
                {
                  $data2 = $row['PQTY'];
                  $data = $data + $data2;
                }
                
                $waka = $data +$qty;
                if($waka>20)
                {
                  echo "<script>alert('20 Item per shopping')</script>";
                }
                else 
                {
                  $stmt = "insert into payment5 values(PAYMENT2.NEXTVAL,'$ifak','$pname','$qty','$total',$td)";
                  $stdi2 = oci_parse($conn,$stmt);
                  $ex = oci_execute($stdi2);
                  if($ex)
                  {
                    $stmt2 = "update product set QUANTITI='$comp' where PRODUCTNO='$id'";
                    $stdi4 = oci_parse($conn,$stmt2);
                    $ex2 = oci_execute($stdi4);
                    if($ex2)
                    {
                      echo "<script>alert('Added to cart')</script>";
                    }
                  }
                }
          }

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
$stmt = "select * from trader where CATEGORY='Green Groceries'";
    $qry = oci_parse($conn,$stmt);
    $exe = oci_execute($qry);
    while($row=oci_fetch_assoc($qry))
    {


        $id = $row['TID'];
        $stmt2 = "select * from shop where TID='$id'";
        $qry2 = oci_parse($conn,$stmt2);
        $exe2 = oci_execute($qry2);

        while($row=oci_fetch_assoc($qry2))
        {
         $id2 = $row['SHID'];
         $stmt5 ="select * from product where SHID='$id2'";
         $stdi5=oci_parse($conn,$stmt5);
         $ex5 = oci_execute($stdi5);
         $count = 0;
         if($ex5)
         {
             while($row = oci_fetch_assoc($stdi5))
             {
                  $id= $row['PRODUCTNO'];
                  $name = $row['PRODUCT_NAME'];
                  $price = $row['PRICE'];
                  $img = $row['image'];
                  $shid = $row['SHID'];
                  $qu = $row['QUANTITI'];
         

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
                   <h6><b>Name:$name<br/>Price:$price</b> </h6>
                   <form action='' method='post' enctype='multipart/form-data'>
                   <input type='hidden' value='$id' name='productno'>
                   <input type='hidden' value='$name' name='productname' >
                   <input type='hidden' value='$price' name='productprice' >
                   <input type='hidden' value='$trader4' name='trader2'>
                   <input type='hidden' value='$qu' name='quan'>
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
                 
                  <br/>";
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
            }  
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