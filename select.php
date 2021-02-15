<?php

  include "session.php";
  
  if (isset($_POST['submit'])) {
    $day = $_POST['day'];
    $time = $_POST['time'];
  }

  include ('connection.php');
  $dateTime = new DateTime();
  echo $dateTime->format('Y-m-d H:i:s');

   
 ?>
 
