<?php
if(!isset($_SESSION['name']))
{
    header('location:index.php');
}
else{
    $ifak = $_SESSION['name'];
    echo "$ifak";
}
?>