<?php
include "connection.php";

if(isset($_POST['login']))
{
   $username = $_POST['username'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $phone = $_POST['phone'];
   $shop = $_POST['shop'];
   $shopadr = $_POST['shoadr'];
   $country = $_POST['country'];
   $state = $_POST['state'];
   $city = $_POST['city'];
   $zip = $_POST['zip'];
   $category = $_POST['category'];
   

   $stmt = "select * from trader where USERNAME='$username'";
   $qry = oci_parse($conn,$stmt);
   $exe = oci_execute($qry);
   if($exe)
   {
      $user = "";
       while($row=oci_fetch_assoc($qry))
       {
           $user = $row['USERNAME'];
       }
       if($user=="" OR $user==" ")
       {
          
        
        $pattern2 = '/^(?=.*[A-Za-z])(?=.*[!$#@_])(?=.*[0-9]).{8,20}$/';
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "<script>alert('you entered the wrong email')</script>";
        }
       else if(!preg_match($pattern2,$password))
       {
        echo "<script>alert('password should be alphanumeric')</script>";
       }
       else {
           
           $stmt2 = "select * from trader where EMAIL='$email'";
           $qry2 = oci_parse($conn,$stmt2);
           $exe2 = oci_execute($qry2);
           if($exe2)
           {
             $email2 = "";
             while($row=oci_fetch_assoc($qry2))
             {
               $email2 = $row['EMAIL'];
             }
             if($email2=="" OR $email2==" ")
             {
               $stmt4 = "select * from shop where SNAME='$shop'";
               $qry4 = oci_parse($conn,$stmt4);
               $exe4 = oci_execute($qry4);
               if($exe4)
               {
                 $shname = "";
                 while($row=oci_fetch_assoc($qry4))
                 {
                   $shname = $row['SNAME'];
                 }
                 if($shname=="" OR $shname==" ")
                 {
                   $password2 = md5($password);
                   $ad = 1;
                  $stmt5 = "insert into trader values(TRA.nextval,$ad,'$username','$firstname','$lastname','$email','$password2','$phone','$country','$state','$city','$zip','$category','D')";
                  $qry5 = oci_parse($conn,$stmt5);
                  $exe5 = oci_execute($qry5);
                  if($exe5)
                  {
                    $stmt6 = "select * from trader where EMAIL='$email'";
                    $qry6=oci_parse($conn,$stmt6);
                    $exe6 = oci_execute($qry6);
                    if($exe6)
                    {
                      $idt = 0;
                      while($row=oci_fetch_assoc($qry6))
                      {
                        $idt = $row['TID'];
                      }
                      $stmt7 = "insert into shop values('$idt','$idt','$shop','$shopadr')";
                      $qry7 = oci_parse($conn,$stmt7);
                      $exe7 = oci_execute($qry7);
                      if($exe7)
                      {
                        $stmt8  = "insert into tlogin values(tlo.nextval,'$username','password')";
                        $qry8 = oci_parse($conn,$stmt8);
                        $exe8 = oci_execute($qry8);
                        if($exe8){
                          mail($email,"joining clerkhudder","Thank you for joing clerkhudder \n we will send you the dashboard information in coming 24-hrs");
                          echo "
                          <script>
                          alert('You will given dashboard after 24-hours please wait')
                          window.location.href = 'index.php'
                          </script>
                         ";
                        }
                        
                      }
                    }
                  }
                 }
                 else{
                     echo "<script>alert('Shop name already exist')</script>";
                 }
               }
             }
             else{
              echo "<script>alert('Email already exist')</script>";
             }
           }
       }

       }
       else {
           echo "<script>alert('user already exist')</script>";
       }
   }
}







if(isset($_POST['login2']))
{
   $username = $_POST['username2'];
   $firstname = $_POST['firstname2'];
   $lastname = $_POST['lastname2'];
   $email = $_POST['email2'];
   $password = $_POST['password4'];
   $phone = $_POST['phone2'];
   $country = $_POST['country2'];
   $state = $_POST['state2'];
   $city = $_POST['city2'];
   $zip = $_POST['zip2'];
   $age = $_POST['age2'];
   $gender = $_POST['gender2'];


        $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        $pattern2 = '/^(?=.*[A-Za-z])(?=.*[!$#@_])(?=.*[0-9]).{8,20}$/';
        if(!preg_match($pattern,$email))
        {
            echo "<script>alert('you entered the wrong email')</script>";
        }
       else if(!preg_match($pattern2,$password))
       {
        echo "<script>alert('password should be alphanumeric')</script>";
       }
       else 
       {
         $stmt ="select * from customer where USERNAME='$username'";
         $qry = oci_parse($conn,$stmt);
         $exe = oci_execute($qry);
         if($exe)
         {
           $user = "";
           while($row=oci_fetch_assoc($qry))
           {
            $user = $row['USERNAME'];
           }
           if($user=="" OR $user==" ")
           {
             $stmt2 = "select * from customer where EMAIL='$email'";
             $qry2 = oci_parse($conn,$stmt2);
             $exe2 = oci_execute($qry2);
             if($exe2)
             {
               $em = "";
               while ($row=oci_fetch_assoc($qry2))
               {
                 $em = $row['EMAIL'];
               }
               if($em=="" OR $em==" ")
               {
                 $password5 = md5($password);
                 $stmt4 = "insert into customer values (CUST.nextval,'$username','$firstname','$lastname','$email','$password5','$phone','$country','$state','$city','$zip','$age','$gender','1','D')";
                 $qry4 = oci_parse($conn,$stmt4);
                 $exe4 = oci_execute($qry4);
                 if($exe4)
                 {
                   mail($email,"thank you!!","we welcome you as a customer of clerkhudder you will be actiavted in\n24-hrs");
                  echo "
                  <script>
                  alert('welcome !! will be actiavted in 24 hrs')
                  window.location.href = 'index.php'
                  </script>
                 ";
                 }
               }
               else{
                 echo "<script>alert('email already exist')</script>";
               }
             }
           }
           else {
            echo "<script>alert('user already exist')</script>";
           }
         }
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
      top: 75%;
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
  <h2>SIGN UP</h2>
  <ul class="nav nav-pills">
    <li><a data-toggle="pill" href="#trader">TRADER</a></li>
    <li><a data-toggle="pill" href="#menu1">CUSTOMER</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="trader" class="tab-pane fade in active">




<form action="" method="post">
        <div class="pass">
  <input type="text" name="username" placeholder="username" required>
 
</div>
    <div class="pass">
  <input type="text" name="firstname" placeholder="firstname">
</div>
    <div class="pass">
  <input type="text" name="lastname" placeholder="lastname">
</div>
    <div class="pass">
  <input type="text" name="email" placeholder="Email" required>
</div>

    <div class="pass">
  <input type="password" name="password" placeholder="Password" required>
</div>

    <div class="pass">
  <input type="text" name="phone" placeholder="phone number">
</div>
        <div class="pass">
  <input type="text" name="shop" placeholder="shop name" required>
</div>
        <div class="pass">
  <input type="text" name="shoadr" placeholder="shop adress" required>
</div>
<table>
  <tr>
    <th><input type="text" name="country" placeholder="country"></th>
    <th><input type="number" name="state" placeholder="state"></th> 
    <th><input type="text" name="city" placeholder="city"></th>
  </tr>
  <tr>
    <th><input type="number" name="zip" placeholder="zip"></th>
    <th>
      <select name="category" required>
      
  <option value="Butchers" selected>Butchers</option>
  <option value="Green Groceries">Green Groceries</option>
  <option value="Fish Monger">Fish Monger</option>
  <option value="Bakery">Bakery</option>
  <option value="Delicatessen">Delicatessen</option>
  <option value="Others">Others</option>
</select>
</th> 

  </tr>
</table>

<button type="submit" name="login" class="btn">REGISTER</button>
</form>











    </div>
    <div id="menu1" class="tab-pane fade">






      <form action="" method="post">
        <div class="pass">
  <input type="text" name="username2" required placeholder="Username">
</div>
    <div class="pass">
  <input type="text" name="firstname2" placeholder="Firstname">
</div>
    <div class="pass">
  <input type="text" name="lastname2" placeholder="Lastname">
</div>
    <div class="pass">
  <input type="text" name="email2" required placeholder="Email">
</div>

    <div class="pass">
  <input type="password" name="password4" required placeholder="password">
</div>
    <div class="pass">
  <input type="text" name="phone2" placeholder="phone number">
</div>
<table>
  <tr>
    <th><input type="text" name="country2" placeholder="country" ></th>
    <th><input type="text" name="state2" placeholder="state"></th> 
    <th><input type="text" name="city2" placeholder="city"></th>
  </tr>
  <tr>
    <th><input type="number" name="zip2" placeholder="zip"></th>
    <th><input type="number" name="age2" placeholder="Age"></th> 
    <th>
      <select name="gender2">
      <option value="M" selected>Male</option>
      <option value="F">Female</option>
      <option value="O">Others</option>
    </select></th>
  </tr>
</table>

  <button type="submit" name="login2" class="btn">REGISTER</button>
</form> 






    </div>
  </div>
</div>

</body>
</html>
