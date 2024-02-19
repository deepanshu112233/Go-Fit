<?php
session_start();
include('dbconnect.php');
$s = $_POST['sleep'];
// $w = 0;
echo $s;
// $s = $_POST['sleep'];
$currentDate = date("Y-m-d");
$email = $_SESSION['email'];
$query = "SELECT * FROM sleep where Email = '$email' and Date = '$currentDate'"; 
if(mysqli_num_rows(mysqli_query($conn,$query)) == 0)
{
    // $query = "INSERT INTO `data` (`Email`, `Date`, `Jogging`, `Exercise`, `Cycling`, `Playing`, `Hiking`, `Other_Phy`, `Chanting`, `Yoga`, `Meditation`, `Water`, `Sleep`, `Calories`) VALUES ('$email', '$currentDate', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$w', '$s', '0');"; 
    $query = "INSERT INTO `sleep` (`Email`, `Date`, `Sleep`) VALUES ('$email', '$currentDate', '$s');"; 
    mysqli_query($conn,$query);
}
else
{
    $query = "UPDATE sleep SET Sleep = Sleep + $s WHERE Email = '$email'";
    mysqli_query($conn,$query);
}

echo 'hello';
header('Location: ../webpages/result.php');
?>