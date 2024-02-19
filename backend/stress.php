<?php
session_start();
include('dbconnect.php');
$ch = $_POST['hours_1'];
$cm = $_POST['minutes_1'];
$yh = $_POST['hours_2'];
$ym = $_POST['minutes_2'];
$mh = $_POST['hours_3'];
$mm = $_POST['minutes_3'];
$lh = $_POST['hours_4'];
$lm = $_POST['minutes_4'];
$dh = $_POST['hours_5'];
$dm = $_POST['minutes_5'];
$th = $_POST['hours_6'];
$tm = $_POST['minutes_6'];
$wh = $_POST['hours_7'];
$wm = $_POST['minutes_7'];
$ph = $_POST['hours_8'];
$pm = $_POST['minutes_8'];
$oh = $_POST['hours_9'];
$om = $_POST['minutes_9'];
$c = ($ch * 60) + $cm;
$y = ($yh * 60) + $ym;
$m = ($mh * 60) + $mm;
$l = ($lh * 60) + $lm;
$d = ($dh * 60) + $dm;
$t = ($th * 60) + $tm;
$w = ($wh * 60) + $wm;
$p = ($ph * 60) + $pm;
$o = ($oh * 60) + $om;
$currentDate = date("Y-m-d");
$email = $_SESSION['email'];
$query = "SELECT * FROM stress_activity where Email = '$email' and Date = '$currentDate'"; 
if(mysqli_num_rows(mysqli_query($conn,$query)) == 0)
{
    $query = "INSERT INTO `stress_activity` (`Email`, `Date`, `Chanting`, `Yoga`, `Meditation`,`Listening_Music`,`Dancing`,`Talking`,`Writing`,`Playing_Instrument`,`Other_Stress`) VALUES ('$email', '$currentDate','$c', '$y', '$m','$l','$d','$t','$w','$p','$o');"; 
    mysqli_query($conn,$query);
}
else
{
    $query = "UPDATE stress_activity SET Chanting = Chanting + $c, Yoga = Yoga + $y, Meditation = Meditation + $m,Listening_Music = Listening_Music + $l,Dancing = Dancing + $d,Talking = Talking + $t,Writing = Writing + $w,Playing_Instrument = Playing_Instrument + $p,Other_Stress = Other_Stress + $o  WHERE Email = '$email'"; 
    mysqli_query($conn,$query);
}
header('Location: ../webpages/emotions_ba.php');
?>