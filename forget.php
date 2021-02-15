<?php
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    mail($email,"forget password","forget password link: http://localhost/project%20management/fg2.php");
    echo "
                 <script>
                 alert('mail sent')
                 window.location.href = 'index.php'
                 </script>
                ";
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
      height:330px;
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
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Enter email" name="email"\ >
                     </div>
					  
                      <center><input type="submit" class="btn btn-primary" value="RESET" name="submit"></center>
                    </form>
                  
</div>
</div>
</div>
</div>
</body>
</html>
