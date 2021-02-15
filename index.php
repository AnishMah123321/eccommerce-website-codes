<?php
include "connection.php";

if(isset($_POST['search2']))
{
  $msg = $_POST['search'];
  header("location:search.php?msg=$msg");
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
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">

    
    <title>ClerkHudder mart</title>
    <style>
        body{
            margin:0px;
            padding:0px;

        }
        .style1{
            background-color: rgb(28, 48, 113);
        }
        .container-fluid
        {
            margin:0px;
            padding:0px;
        }
        .row{
            margin:0px;
            padding:0px;
        }
        .col-4{
            margin:0px;
            padding: 0px;
        }
        .col-4 .row img{
            width:100px;
            height:100px;
            margin-left:10px;
        }
        .col-4 .row b{
            background-color: white;
            color: rgb(28, 48, 113);
            width:400px;
            text-align: center;
            margin:1px;
           padding:4px;
        }

        .col-4 .row a{
            background-color: white;
            color: black;
            width:400px;
            padding:4px;
            text-align: left;
            margin:1px;
            text-decoration: none;
        }
        .col-4 .row a:hover
        {
          color:red;
        }
        .col-8 .row form
        {
            margin:4px;
        }
        .col-8 .row form .te
        {
            width:300px;
            height:35px;
            border-radius:2px;
            border:rgb(28, 48, 113)
        }
        .col-8 .row form .btn .btn-primary
        {
            height:34px;
        }
        #carouselExampleIndicators
        {
            width:100%;
            height:290px;
            margin-right:10px;
            margin-bottom:1px;
        }
        .carousel-inner
        {
            height: inherit;
            width: inherit;
        }
        .carousel-inner .carousel-item img{
            height: 290px;
            width:100%;
        }
        .col-8{
            margin:0px;
            padding:0px;
        }
        .rig
        {
            margin-top: 4px;
            margin-left:40px;
        }
        .rig .btn .btn-info .btn-lg
        {
            height:35px;
        }



        .slider {
        width: 90%;
        margin-left:5%;
    }
    .slider .card
    {
      width:400px;
      height:400px;
      margin:10px;
    }
    .slick-slide {
      margin: 0px 20px;
    }


    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
    }
     .footer
     {
       background-color: #000;
       color:#fff;
       
     }
     .footer h4{
      text-align: center;
      margin:2px;
     }
     .footer p{
     padding:10px;
     }
     .fotter{
       text-align: center;
     }
     .footer iframe
     {
       padding:10px;
     }
    </style>





<style>
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }


    .jssorb057 .i {position:absolute;cursor:pointer;}
    .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
    .jssorb057 .i:hover .b {stroke-opacity:.7;}
    .jssorb057 .iav .b {stroke-opacity: 1;}
    .jssorb057 .i.idn {opacity:.3;}

    .jssora073 {display:block;position:absolute;cursor:pointer;}
    .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
    .jssora073:hover {opacity:.8;}
    .jssora073.jssora073dn {opacity:.4;}
    .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
</style>


  </head>
  <body>
    <div class="container-fluid">

        <div class="style1">

        <div class="row">
            <div class="col-4">
                <div class="row">
                 <img src ="web.png" alt="web.jpeg"/>
                </div>
                    <div class="row">
                        <b>Category</b><br/>
                        <a href="notfound.php">Butuchers</a><br/>
                        <a href="notfound.php">Green Groceries</a><br/>
                        <a href="notfound.php">Fish Monger</a><br/>
                        <a href="notfound.php">Bakery</a><br/>
                        <a href="notfound.php">Delicatessen</a>
                        <a href="notfound.php">Others</a>
                    </div>
            </div>
            <div class="col-8">
                <div class="row">
                                 <form action="" method="post">
                                            <input type="text" placeholder="Search.." name="search" class="te">
                                            <input type="submit" class="btn btn-primary" value="submit" name="search2">
                                 </form>
                                  <div class="rig">
                                  <a href='login.php'><button type="submit" class="btn btn-primary">Login</button></a>
                                  </div>
                </div>

                <div class="row">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="1930_H_SALE_t1_large_new.jpeg" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="1930_H_SALE_t1_large_new.jpeg" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="1930_H_SALE_t1_large_new.jpeg" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>



                </div>


            </div>
        </div>

    </div>

</div>

<hr/>

<!--Container section-->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">


       
       <?php

         $qry="select * from shop";
         $stdi1 = oci_parse($conn,$qry);
         oci_execute($stdi1);
         while($row=oci_fetch_assoc($stdi1))
         {
           include "connection.php";
          echo "<center><h4><b>".$row['SNAME']."</b></h4></center> ";
          echo "<hr/>";
          $a = $row['SHID'];
          $query = "select * from product where SHID='$a'";
          $stmt = oci_parse($conn,$query);
          oci_execute($stmt);
          echo "<br/>";
          echo "<section class='vertical-center-4 slider'>";
          while($row2=oci_fetch_assoc($stmt))
          {
            $name = $row2['PRODUCT_NAME'];
            $price = $row2['PRICE'];
            $image = $row2['image'];
            $ofid = $row2['OFID'];
            $qury = "select * from offer where OFID='$ofid'";
            $stmt2 = oci_parse($conn,$qury);
             oci_execute($stmt2);
            while($row5=oci_fetch_assoc($stmt2))
            {
              $ofna = $row5['OFNAME'];
              $ofadu = $row5['OFDURATION'];
            }
            echo" <div>
          <div class='card' style='width: 18rem;'>
          <img class='card-img-top' src='uploads/$image' alt='Card image cap' height='210px'>
          <div class='card-body'>
          <h5 class='card-title'>$name</h5>
          <p class='card-text'>offer name:$ofna<br/>
          offer duration:$ofadu<br/>
          price:$price<br/>
          <a href='notfound.php' class='btn btn-primary'>ADD TO CART</a>
          </div>
          </div>
          </div>";
          }
          echo "</section>";
         }
           

        ?>

    </div>
</div>
</div>






    <!--footer-->
    <div class="footer">
      <footer>
        <div class="row">
          <div class="col-4">
            <b><h4>Contacts</h4></b>
            <p>Name:Clerhuddermart </br>adress: England, leeds beckket </br>ph no: 01-22229 </br>Email:clerhuddermart@outlook.com
            <center> <br/><h5>About</h5><br/>
            This shop is about selling product and making customer<br/>
            feel free to shop when they are free and the idea to <br/>
            to make this website is to focus those group of people<br/>
            who are really having busy daily working where they <br/>
            have to fear about delievry date and waiting hours <br/>
            for delievery boy here they can select there slots <br/>
            and feel free to recieve there product
             </center>
            </p>
          </div>
          <div class="col-4">
            <b><h4>Faq</h4></b>
            <p class="fotter"><b style="color:red">Whats is the payment method of purchase?</b><br/>Paypal is the payment method.<br>
               <b style="color:red">Do you Deliever your product?</b><br/>No, we dont deliver our product<br>
               <b style="color:red">Where is your store?</b> <br/>In the leeds clerkhudder<br>
               <b style="color:red">How do i get confirmation about order</b> <br/>You get a pdf invoice of shooping<br></p>
          </div>
          <div class="col-4">
            <b><h4></h4></b>
            <div style="width: 100%"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=leeds+(clerkhudder%20marts)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Plot a route map</a></iframe></div><br />
          </div>
        </div>

        <div class="row">
          <div class="col-12">
           <center><h6>Copyright&copy;Clerhuddermart.com</h6></center> 
          </div>
        </div>
      </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).on('ready', function() {
        $(".vertical-center-4").slick({
          infinite: true,
          slidesToShow: 3,
           slidesToScroll: 3,
           arrow:true
        });
      });
  </script>


 


</body>




</html>