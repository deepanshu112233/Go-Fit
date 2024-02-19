<?php
session_start();
include('dbconnect.php');
$w = $_POST['water'];
// $w = 0;
echo $w;
// $s = $_POST['sleep'];
$currentDate = date("Y-m-d");
$email = $_SESSION['email'];
$query = "SELECT * FROM water_intake where Email = '$email' and Date = '$currentDate'"; 
if(mysqli_num_rows(mysqli_query($conn,$query)) == 0)
{
    // $query = "INSERT INTO `data` (`Email`, `Date`, `Jogging`, `Exercise`, `Cycling`, `Playing`, `Hiking`, `Other_Phy`, `Chanting`, `Yoga`, `Meditation`, `Water`, `Sleep`, `Calories`) VALUES ('$email', '$currentDate', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$w', '$s', '0');"; 
    $query = "INSERT INTO `water_intake` (`Email`, `Date`, `Water`) VALUES ('$email', '$currentDate', '$w');"; 
    mysqli_query($conn,$query);
}
else
{
    $query = "UPDATE water_intake SET Water = Water + $w WHERE Email = '$email'";
    mysqli_query($conn,$query);
}

echo 'hello';
header('Location: ../webpages/result.php');
?>