          <?php
               include "connection.php";
               $id = "";
               if(isset($_GET['id']))
               {
                 $id = $_GET['id'];
                 $statement = "select * from product where PRODUCTNO='$id' ";
                 $query = oci_parse($conn,$statement);
                 $exe = oci_execute($query);
                 $name = "";
                 $price = "";
                 if($exe)
                 {
                   while($row=oci_fetch_assoc($query))
                   {
                       $productname = $row['PRODUCT_NAME'];
                       $productprice = $row['PRICE'];
                       $offer = $row['OFID'];
                       $desc2= $row['DESCRIPTION'];
                   }
                 }
               }

include "connection.php";
if(isset($_POST['submit']))
{
    $name4 = $_POST['title2'];
    $off4 = $_POST['distance'];
    $pri4 = $_POST['price'];
   

    $stmt = "update
    product
    set
    PRODUCT_NAME='$name4', OFID='$off4', PRICE='$pri4'  
    where  
    PRODUCTNO='$id' ";
    $qry = oci_parse($conn,$stmt);
    $exe = oci_execute($qry);
    if($exe)
    {
        header('Location: traderdashboard.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  
  <center><h2>update Products</h2></center>
            

            <form action="" method="post" enctype="multipart/form-data" >
   
                   <div class="form-group">
                     <label for="exampleInputtitle">Title</label>
                     <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter the title" name="title2" value="<?=$productname?>">
                   </div>
   
                   <div class="form-group">
                     <label for="exampleInputDistance">Offer Id</label>
                     <input type="number" class="form-control" id="exampleInputDistance" aria-describedby="textHelp" placeholder="Enter the Offerid" name="distance"  value="<?=$offer?>">
                   </div>

                   <div class="form-group">
                     <label for="exampleInputDistance">Price</label>
                     <input type="number" class="form-control" id="exampleInputDistance" aria-describedby="textHelp" placeholder="Enter the price" name="price"  value="<?=$productprice?>">
                   </div>

                  
                   <input type="submit" name="submit" value="update">
   
               </form>
  
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>