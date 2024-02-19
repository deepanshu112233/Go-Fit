<?php 
session_start();
include '../backend/dbconnect.php';
if(!isset($_SESSION['User']))  
{
  header("Location: login.php?msg=Please login first!");
  session_destroy();
}

// Fetch the selected food item from the query string
$foodItem = $_GET['foodItem'];
// $foodItem = 'Banana';
echo $foodItem;

// Fetch the calorie count for the selected food item from the database
$query = "SELECT * FROM calories WHERE Food_Item = '$foodItem'";
// $result = mysqli_query($conn, $query);

$val = mysqli_fetch_array(mysqli_query($conn, $query))[3];
 
    echo "<b>Calories for $foodItem: $val</b>";
// } else {
//     echo "Error fetching data from the database: " . mysqli_error($conn);
// }

?>
