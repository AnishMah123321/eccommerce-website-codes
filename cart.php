<?php
include "session.php";
if(isset($_GET['id']))
{
$id = $_GET['id'];
echo "$id";
}
?>