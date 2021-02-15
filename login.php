<?php
session_start();
include "connection.php";
 
if(isset($_POST['submit']))
{
$email = html_entity_decode($_POST['email'], ENT_QUOTES);
$password = html_entity_decode($_POST['password'], ENT_QUOTES);
$password2 = md5($password);
$privelage = $_POST['privelage'];

if($privelage == 1)
{
  $st = "select * from customer where (USERNAME = '$email' OR EMAIL = '$email')";
  $qr = oci_parse($conn,$st);
  $co = oci_execute($qr);
  $user = "";
  while($ro=oci_fetch_assoc($qr))
  {
    $user = $ro['USERNAME'];
  }
  if($user==" " OR $user=="")
  {
    $error1='UserName doesnot exit';
    header("Location: login.php?msg1=$error1");
  }
  else
  {
    $st2 = "select * from customer where PASSWORD = '$password2'";
    $qr2 = oci_parse($conn,$st2);
    $co2 = oci_execute($qr2);
    $user2 = "";
    while($ro=oci_fetch_assoc($qr2))
    {
      $user2 = $ro['USERNAME'];
    }
if($user2==" " OR $user2=="")
{
  $error1='Password doesnot exit';
  header("Location: login.php?msg1=$error1");
}
else 
{
  $stmt = "select * from customer where (USERNAME = '$email' OR EMAIL = '$email') AND PASSWORD = '$password2'"; 
  $qry = oci_parse($conn,$stmt);
  $count = oci_execute($qry);
  $count5 =0;
  while($row=oci_fetch_assoc($qry))
  {
    $id = $row['CID'];
    $count5 = $count5 +1;
  }

  if($count5 >= 1)
  {
    header("Location: index2.php?id=$id");
    $_SESSION['name']=$id;
  }
  else{
    $error1='User Does not exist';
    header("Location: login.php?msg1=$error1");
  }
}
     }
  

}



if($privelage == 3)
{
  $stmt = "select * from admin where (USERNAME = '$email' OR EMAIL = '$email') AND PASSWORD = '$password2'"; 
  $qry = oci_parse($conn,$stmt);
  $count = oci_execute($qry);
  $count5 =0;
  while($row=oci_fetch_assoc($qry))
  {
    $id = $row['AID'];
    $count5 = $count5 +1;
  }

  if($count5 >= 1)
  {
    header("Location: admin.php");
    $_SESSION['name']=$id;
  }
  else{
    $error1='User Does not exist';
    header("Location: login.php?msg1=$error1");
  }

}

if($privelage == 2)
{
  $stmt = "select * from trader where (USERNAME = '$email' OR EMAIL = '$email') AND PASSWORD = '$password2' AND ACTIVATE='A'"; 
  $qry = oci_parse($conn,$stmt);
  $count = oci_execute($qry);
  $count5 = 0;
  while($row=oci_fetch_assoc($qry))
  {
    $id = $row['TID'];
    $count5 = $count5 +1;
  }

  if($count5 >= 1)
  {
    header("Location: traderdashboard.php");
    $_SESSION['name']=$id;
  }
  else{
    $error1='User Does not exist';
    header("Location: login.php?msg1=$error1");
  }

}

}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
    body{
      margin:0px;
      padding:0px;
     
      position: relative;
      opacity:0.9;
      
    }
    .container-fluid{
      margin:0px;
      padding:0px;
      
    }
    .from{

     background:rgba(0,0,0,1);
      color:white;
      height:450px;
      margin-top:90px;
    }
    .from form{

      padding:20px;
    }
    .from h4{
      padding-top:15px;
      text-align:center;
    }
    .from a{
      color:white;
    }
    fieldset
    {
      border:2px;
    }

    .btn.btn-primary
    {
      margin-top:25px;
      width:100%;
      border-radius:1px;
    }
    small{
      color:red;
    }
    </style>
  </head>
  <body>
      <div class="container-fluid">
      <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
           <div class="from">
                      <h4>Login Page</h4>
                      <?php
                      if(isset($_GET['msg1']))
                      {
                        if(!empty($_GET['msg1']))
                        {
                          $er = $_GET['msg1'];
                          echo "<center><small>$er</small></center>";
                        }
                        
                      }
                      ?>
                      <form  action="" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address / Username</label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Enter email" name="email"\ >
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                      </div>
					  <label for="exampleInputEmail1">Privelage</label>
					  <select class="custom-select" name="privelage">
						<option value="1">Customer</option>
						<option value="2">Trader</option>
						<option value="3">Admin</option>
					</select>
                      <center><input type="submit" class="btn btn-primary" value="submit" name="submit"></center>
                    </form>
                    <div class="row">
                    <div class="col-6">
                    <a href="signup.php"><b><center>Register User?</center></b></a>
                    </div>
                    <div class="col-6">
                    <a href="forget.php"><b><center>Forget password?<center></b></a>
                    </div>
                    <div>
           </div>
           </div>
            <div class="col-4"></div>
           </div>
      </div>
