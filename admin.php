 <?php
include "session.php";
  if(isset($_SESSION['nama']))
  {
   header("Location: home.php");
 }
 ?> 

<?php    
include ("connection.php");           
   



                 
                ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="ckeditor.js" type="text/javascript"></script>
    <title>Hello, world!</title>
    <style>
      body{
        margin:0px;
        padding:0px;
        background-color: rgba(52, 58, 64, 1);
      }
    .container-fluid{
      margin:0px;
      padding:0px;
    }
    .col-3{
      background-color: rgba(52, 58, 64, 1);
    }
    .col-3{
      height:inherit;
    }
    .col-3 a{
      color:white;
    }
    .col-9{
      background-color: white;
      min-height:500px;
    }
   
    </style>
     
  </head>
  <body>
    
<div class="container-fluid">
  <div class="row">
   <?php
   include ("header5.php");
   ?>

  
    <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Trader/Customer</a>
            <a class="nav-link" id="v-pills-shop-tab" data-toggle="pill" href="#v-pills-shop" role="tab" aria-controls="v-pills-shop" aria-selected="false">Shops</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">products</a>
            <a class="nav-link" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="false">Bills</a>
            
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">


            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
               <style>
                 button{
                   margin:10px;
                   min-height:80px;
                 }

                
                  .table th{
                    padding:7px;
                    margin:7px;
                    height:10px;
                    width:10px;
                  }

                  .table.table-striped.table-dark{
                    font-size: 10px;
                    width:200px;
                  }
                  .table.table-striped.table-primary{
                    font-size: 10px;
                    width:200px;
                    margin-top:10px;
                  }

                  .table.table-striped.table-dark{
                    font-size: 10px;
                    width:200px;
                  }

                  .table.table-striped.table-danger{
                    font-size: 10px;
                    width:200px;
                  }
                  img{
                    width:40px;
                    height:40px;
                  }
               </style>
               <?php

                include ("connection.php");
                $stmt = "select * from trader where ACTIVATE <> 'A'";
                $qry = oci_parse($conn,$stmt);
                oci_execute($qry);
                $count = 0;
                while($row=oci_fetch_assoc($qry))
                {
                     $count = $count + 1;
                }
                

                $stmt2 = " select * from trader where ACTIVATE = 'A' ";
                $qry2 = oci_parse($conn,$stmt2);
                oci_execute($qry2);
                $coun = 0;
                while($row2=oci_fetch_assoc($qry2))
                {
                  $coun = $coun + 1;
                }
                

                $stmt2 = " select * from customer";
                $qry4 = oci_parse($conn,$stmt2);
                oci_execute($qry4);
                $coun2 = 0;
                while($row=oci_fetch_assoc($qry4))
                {
                  $coun2 = $coun2 + 1;
                }
  

              echo  "<button type='button' class='btn btn-primary'>";
              echo  " Active Trader <span class='badge badge-light'>$coun</span>";
              echo  "<span class='sr-only'>unread messages</span>";
              echo  "</button>";


              echo  "<button type='button' class='btn btn-dark'>";
              echo  " Not active trader <span class='badge badge-light'>$count</span>";
              echo  "<span class='sr-only'>unread messages</span>";
              echo  "</button>";

              echo  "<button type='button' class='btn btn-danger'>";
              echo  " cutomers <span class='badge badge-light'>$coun2</span>";
              echo  "<span class='sr-only'>unread messages</span>";
              echo  "</button>";

      
                

               
                include "connection.php";
                $statement = "select * from trader where ACTIVATE = 'A'";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-primary'>";
                echo "<thead><tr>
                     <th>TID</th>
                   <th>Username</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>PhNumber</th>
                    <th>Categogry</th>
                    <th>status</th>
                    <th>Delete</th>
                    </tr>
                    </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['TID'];
                  $username = $row['USERNAME'] ;
                  $email = $row['EMAIL'];
                  $password = $row['PASSWORD'];
                  $firstname = $row['FIRSTNAME'];
                  $lastname = $row['LASTNAME'];
                  $role = $row['CATEGORY'];
                  $phno = $row['PHNUMBER'];
                  $status = $row['ACTIVATE'];
                echo "<tr>
                   <th>$id</th>
                   <th>$username</th>
                   <th>$firstname</th>
                   <th>$lastname</th>
                   <th>$email</th>
                   <th> $password</th>
                   <th>$phno</th>
                   <th>$role</th>
                   <th>$status</th>
                   <th><a href='atradelete.php?id=$id'>Delete</a></th>
                   </tr>";
                }
                echo "</tbody></table>";


                include "connection.php";
                $statement = "select * from trader where ACTIVATE <> 'A'";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-dark'>";
                echo "<thead><tr>
                     <th>TID</th>
                   <th>Username</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>PhNumber</th>
                    <th>Categogry</th>
                    <th>status</th>
                    <th>Activate</th>
                    </tr>
                    </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['TID'];
                  $username = $row['USERNAME'] ;
                  $email = $row['EMAIL'];
                  $password = $row['PASSWORD'];
                  $firstname = $row['FIRSTNAME'];
                  $lastname = $row['LASTNAME'];
                  $role = $row['CATEGORY'];
                  $phno = $row['PHNUMBER'];
                  $status = $row['ACTIVATE'];
                echo "<tr>
                   <th>$id</th>
                   <th>$username</th>
                   <th>$firstname</th>
                   <th>$lastname</th>
                   <th>$email</th>
                   <th> $password</th>
                   <th>$phno</th>
                   <th>$role</th>
                   <th>$status</th>
                   <th><a href='activate.php?id=$id'>activate</a></th>
                   </tr>";
                }
                echo "</tbody></table>";

                  
                include "connection.php";
                $statement = "select * from customer where ACTIVATE = 'A'";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-danger'>";
                echo "<thead><tr>
                     <th>Cid</th>
                   <th>Username</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>PhNumber</th>
                    <th>Delete</th>
                    </tr>
                    </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['CID'];
                  $username = $row['USERNAME'] ;
                  $email = $row['EMAIL'];
                  $password = $row['PASSWORD'];
                  $firstname = $row['FIRSTNAME'];
                  $lastname = $row['LASTNAME'];
                  $phno = $row['PHNUMBER'];
                echo "<tr>
                   <th>$id</th>
                   <th>$username</th>
                   <th>$firstname</th>
                   <th>$lastname</th>
                   <th>$email</th>
                   <th> $password</th>
                   <th>$phno</th>
                   <th><a href='acustdelete.php?id=$id'>Delete</a></th>
                   </tr>";
                }
                echo "</tbody></table>";




                include "connection.php";
                $statement = "select * from customer where ACTIVATE <> 'A'";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-danger'>";
                echo "<thead><tr>
                     <th>Cid</th>
                   <th>Username</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>PhNumber</th>
                    <th>ACTIVATE</th>
                    </tr>
                    </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['CID'];
                  $username = $row['USERNAME'] ;
                  $email = $row['EMAIL'];
                  $password = $row['PASSWORD'];
                  $firstname = $row['FIRSTNAME'];
                  $lastname = $row['LASTNAME'];
                  $phno = $row['PHNUMBER'];
                echo "<tr>
                   <th>$id</th>
                   <th>$username</th>
                   <th>$firstname</th>
                   <th>$lastname</th>
                   <th>$email</th>
                   <th> $password</th>
                   <th>$phno</th>
                   <th><a href='activate2.php?id=$id'>activate</a></th>
                   </tr>";
                }
                echo "</tbody></table>";

               ?>
            </div>

             



            <div class="tab-pane fade" id="v-pills-shop" role="tabpanel" aria-labelledby="v-pills-shop-tab">
            <br/>
            <br/>
            <?php
            include "connection.php";
                $statement = "select * from shop";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-danger'>";
                echo "<thead><tr>
                     <th>Shid</th>
                   <th>Tid</th>
                   <th>Sname</th>
                   <th>Sadress</th>
                    </tr>
                    </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['SHID'];
                  $id2 = $row['TID'];
                  $username = $row['SNAME'] ;
                  $email = $row['SADRESS'];
                echo "<tr>
                   <th>$id</th>
                   <th>$id2</th>
                   <th>$username</th>
                   <th>$email</th>
                   </tr>";
                }
                echo "</tbody></table>";

               ?>
            </div>










           <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <br/>
            <br/>
            <?php
            include "connection.php";
                $statement = "select * from product";
                $query = oci_parse($conn,$statement);
                oci_execute($query);
                echo "<table class='table table-striped table-danger'>";
                echo "<thead><tr>
                     <th>Product No</th>
                     <th>Ofid</th>
                     <th>Shid</th>
                     <th>product name</th>
                     <th>price</th>
                     <th>Image</th>
                     <th>Delete</th>
                     </tr>
                     </thead><tbody>";
                while($row=oci_fetch_assoc($query))
                {
                  $id = $row['PRODUCTNO'];
                  $id2 = $row['OFID'];
                  $id3 = $row['SHID'];
                  $username = $row['PRODUCT_NAME'] ;
                  $email = $row['PRODUCT_NAME'];
                  $img = $row['image'];
                echo "<tr>
                   <th>$id</th>
                   <th>$id2</th>
                   <th>$id3</th>
                   <th>$username</th>
                   <th>$email</th>
                   <th><img src='uploads/$img'></th>
                   <th><a href='aprodelte.php?id=$id'>Delete</a></th>
                   </tr>";
                }
                echo "</tbody></table>";

               ?>
           </div>
            
           <div class="tab-pane fade" id="v-pills-event" role="tabpanel" aria-labelledby="v-pills-event-tab">
           <br/>
           
            <?php
                    
                          include "connection.php";
                          $statement = "select * from ORDER_DETAIL";
                          $query = oci_parse($conn,$statement);
                          oci_execute($query);
                          echo "<table class='table table-striped table-danger'>";
                          echo "<thead><tr>
                               <th>OID</th>
                               <th>LINK</th>
                               <th>CID</th>
                               <th>DAYOFSHOP</th>
                               <th>TOTAL</th>
                               <th>DAYOFDELIVER</th>
                               
                               </tr>
                               </thead><tbody>";
                          while($row=oci_fetch_assoc($query))
                          {
                            $id = $row['OID'];
                            $id2 = $row['LINK'];
                            $id3 = $row['CID'];
                            $username = $row['DAYOFSHOP'] ;
                            $email = $row['TOTAL'];
                            $img = $row['DAYOFDELIVER'];
                          echo "<tr>
                             <th>$id</th>
                             <th>$id2</th>
                             <th>$id3</th>
                             <th>$username</th>
                             <th>$email</th>
                             <th>$img</th>
                             </tr>";
                          }
                          echo "</tbody></table>";

            ?>
          </div>
          


        </div>
      </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   
    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    

    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script src="/ckfinder/ckfinder.js"></script>
    <script type="text/javascript">

   
  
  </body>
</html>