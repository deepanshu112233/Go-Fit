<?php 
	$servername = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$database = "acs_glucometer"; 
	$conn = mysqli_connect($servername,$username, $password, $database) or die ("Could not connect to MySQL");
	// $conn = mysqli_connect($servername,$username, $password, $database);
	// if(!conn){
	// 	die ("Could not connect to MySQL".mysqli_connect($conn));
	// }
	// else{
	// 	echo "Connections successfully established";
	// }
?> 
