<?php
session_start();
include('dbconnect.php');
$jh = $_POST['hours_1'];
$jm = $_POST['minutes_1'];
$eh = $_POST['hours_2'];
$em = $_POST['minutes_2'];
$ch = $_POST['hours_3'];
$cm = $_POST['minutes_3'];
$ph = $_POST['hours_4'];
$pm = $_POST['minutes_4'];
$hh = $_POST['hours_5'];
$hm = $_POST['minutes_5'];
$oh = $_POST['hours_6'];
$om = $_POST['minutes_6'];
$j = ($jh * 60) + $jm;
$e = ($eh * 60) + $em;
$c = ($ch * 60) + $cm;
$p = ($ph * 60) + $pm;
$h = ($hh * 60) + $hm;
$o = ($oh * 60) + $om;
$currentDate = date("Y-m-d");
$email = $_SESSION['email'];
$query = "SELECT * FROM physical_activity where Email = '$email' and Date = '$currentDate'"; 
if(mysqli_num_rows(mysqli_query($conn,$query)) == 0)
{
    $query = "INSERT INTO `physical_activity` (`Email`, `Date`, `Jogging`, `Exercise`, `Cycling`, `Playing`, `Hiking`, `Other_Physical`) VALUES ('$email', '$currentDate', '$j', '$e', '$c', '$p', '$h', '$o');"; 
    mysqli_query($conn,$query);
}
else
{
    $query = "UPDATE physical_activity SET Jogging = Jogging + $j, Exercise = Exercise + $e, Cycling = Cycling + $c, Playing = Playing + $p, Hiking = Hiking + $h, Other_Physical = Other_Physical + $o WHERE Email = '$email'"; 
    mysqli_query($conn,$query);
}
header('Location: ../webpages/emotions_ba.php');
?>