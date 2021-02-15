<?php
include "connection.php";
if(isset($_POST['submit']))
{
  $privelage = $_POST['pr'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pattern2 = '/^(?=.*[A-Za-z])(?=.*[!$#@_])(?=.*[0-9]).{8,20}$/';
  if(!preg_match($pattern2,$password))
  {
    echo "<script>alert('password should be alphanumeric')</script>";
  }
  else 
  {
    $stmt = "select * from $privelage where EMAIL='$email'";
    $qry = oci_parse($conn,$stmt);
    $exe = oci_execute($qry);
    if($exe)
    {
       $emi = "";
       while($row=oci_fetch_assoc($qry))
       {
         $emi = $row['EMAIL'];
       }
       if($emi=="" OR $emi==" ")
       {
        echo "<script>alert('Email doesnt exist')</script>";
       }
       else 
       {
         $password2 = md5($password);
          $stmt2 ="update $privelage set PASSWORD='$password2' where EMAIL='$email'";
          $qry2 = oci_parse($conn,$stmt2);
          $exe2 = oci_execute($qry2);
          if($exe2)
          {
            echo "
            <script>
            alert('updated')
            window.location.href = 'http://localhost/project%20management/index.php'
            </script>
           ";
          }
       }
    }else{
      echo "<script>alert('Email dosen't exist')</script>";
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
      height:380px;
      margin-top:90px;
      border-radius: 15px;
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
      border-radius:4px;
    }
    h4{
      color: red;
    }
    </style>
  </head>
  <body>
      <div class="container-fluid">
      <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
           <div class="from">
                      
                      
                      <form  action="" method="post" enctype="multipart/form-data">
                    <h4> Forgot Your Password?</h4>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address / Username</label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Enter email" name="email"\ >
                        <label>New Password</label>
                        <input type="password" class="form-control"placeholder="Enter password" name="password"\ >


                        <label>Confirm Privelage</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="pr">
                          <option value="customer">Customer</option>
                          <option value="trader">Trader<option>
                        </select>

                        
                       

                      <center><input type="submit" class="btn btn-primary" value="RESET" name="submit"></center>
                    </form>
                  
</div>
</div>
</div>
</div>
</body>
</html>
