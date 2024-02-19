<?php 
session_start();
include '../backend/dbconnect.php';
if(!isset($_SESSION['User']))  
{
  header("Location: login.php?msg=Please login first!");
  session_destroy();
}
?>

<?php
$query = "SELECT * FROM calories where Food_Item = 'Apple'";
$query_run = mysqli_query($conn,$query) ;
$val = mysqli_fetch_array(mysqli_query($conn,$query))[3];
?>