<?php
include "connection.php";
include "session.php";
$stmt = "select * from customer where CID='$ifak'";
$qry = oci_parse($conn,$stmt);
$exe = oci_execute($qry);
   $firstname2 = "";
   $lastname2 = "";
   $phone2= "";
   $country2 = "";
   $state2 = "";
   $city2 = "";
   $zip2 = "";
   $age2 = "";
   $mail = "";
if($exe)
{
   while($row=oci_fetch_assoc($qry))
   {
       $firstname2 = $row['FIRSTNAME'];
       $lastname2 = $row['LASTNAME'];
       $phone2 = $row['PHNUMBER'];
       $country2 = $row['COUNTRY'];
       $state2 = $row['STATE'];
       $city2 = $row['CITY'];
       $zip2 = $row['ZIP'];
       $age2 = $row['AGE'];
       $mail = $row['EMAIL'];

       
   }
}

if(isset($_POST['login2']))
{
   $firstname = $_POST['firstname2'];
   $lastname = $_POST['lastname2'];
   $phone = $_POST['phone2'];
   $country = $_POST['country2'];
   $state = $_POST['state2'];
   $city = $_POST['city2'];
   $zip = $_POST['zip2'];
   $age = $_POST['age2'];
   $stmt2 = "update 
   customer 
   set 
   FIRSTNAME='$firstname',LASTNAME='$lastname',PHNUMBER='$phone',COUNTRY='$country',STATE='$state',CITY='$city',ZIP='$zip',AGE='$age' 
   where CID='$ifak' ";
   $qry = oci_parse($conn,$stmt2);
   $exe2 = oci_execute($qry);
   if($exe2)
   {
       echo "you updated";
       mail($mail,"update","You currently updated your creditional");
       header("Location:index2.php");
   }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
  <title>sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css.css">
  
  <style>
    body{

    }
    li{
      background-color: black;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      width: 155px;
      font-size: 18px;
    }
    a{
      color: white;
    }
    .container
    {
      position: absolute;
      top: 50%;
      left: 50%;
      background: rgba(0,0,0,.8);
      transform: translate(-50%,-50%);
      width: 400px;
      padding: 40px;
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0,0,0,.5);
      border-radius: 10px;


    }
    .container h2{
    padding: 13px;
    font-size: 24px;
    color: white;
    background: #1b2d72;
    width: 150px;
    border: none;
    border-radius: 5px;
    margin-left: 70px; 
    font-weight: bold;
    text-align: center;
    }
    .container .pass{
      position: relative;
    }
    .container .pass input{
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      letter-spacing: 1px;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }
    .container .pass label{
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px;
      color: #fff;
      letter-spacing: 1px;
      pointer-events: none;
      transition: .5s;
      margin-top: 5px;
      font-size: 18px;
    }
    .container .pass input:focus ~ label,
    .container .pass input:valid ~ label{
      top: -18px;
      left: 0;
      color: #03a9f4;
      font-size: 20px;
    }
  .btn{
    padding: 13px;
    font-size: 24px;
    color: white;
    background: #1b2d72;
    width: 150px;
    border: none;
    border-radius: 10px;
    margin-left: 80px; 
    font-weight: bold;
    text-align: center;
  }
  .btn:hover{
    color:white;
  }
  table{
    color: white;
    font-weight: bold;
  }
  .radio{
    color: white;
    font-weight: bold;
    font-size: 16px;
    margin-left: 40px;
  }

  select{
    margin-left: 10px;
    width: 115px;
    position: fixed;
    margin-top: -15px;
    border: none;
    color: white;
    font-weight: bold;
    background: rgba(0,0,0,.8);
    font-size: 18px;

  }

  </style>
</head>
<body>

<div class="container">
  <h2>Details</h2>

<form action="" method="post">
        
    <div class="pass">
  <input type="text" name="firstname2" placeholder="Firstname" value="<?=$firstname2?>">
</div>
<div class="pass">
<input type="text" name="lastname2" placeholder="Lastname" value="<?=$lastname2?>">
</div>
    <div class="pass">
  <input type="text" name="phone2" placeholder="phone number" value="<?=$phone2?>">
</div>
<table>
  <tr>
    <th><input type="text" name="country2" placeholder="country" value="<?=$country2?>"></th>
    <th><input type="text" name="state2" placeholder="state" value="<?=$state2?>"></th> 
    <th><input type="text" name="city2" placeholder="city" value="<?=$city2?>"></th>
  </tr>
  <tr>
    <th><input type="number" name="zip2" placeholder="zip" value="<?=$zip2?>"></th>
    <th><input type="number" name="age2" placeholder="Age" value="<?=$age2?>"></th> 
  </tr>
</table>

  <button type="submit" name="login2" class="btn">update</button>
</form> 

</div>

</body>
</html>
