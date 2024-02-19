<?php 
session_start();

include '../../backend/dbconnect.php';
if(!isset($_SESSION['User']))  
{
  header("Location: login.php?msg=Please login first!");
  session_destroy();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How Are You Feeling Today?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styling/dietchoices.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="../dietchoices.php">Diet Choices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../waterintake.php">Water Intake</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../sleep.php">Sleep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../physicalactivities.php">Physical Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../stressrelivingactivities.php">Stress Relieving Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../demo.php">Result</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../demo.php">Your Activity</a>
            </li>
          </ul>
          <span class = "navbar-brand" href = "#">
            Hello, <?php echo $_SESSION['User'] ?>
            <a href = "../backend/logout.php">
                <img src = "../images/logout.png" class="logout">
            </a>
          </span>
        </div>
      </div>
    </nav>

    <br>
    
        <div class="container">
  <form action="../result.php" method="post">
    <div class="row">
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Apple')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Apple
          <input type="text" class="form-control shadow-none" name="apple_quantity" placeholder="Enter quantity">
        </div>
      </div>
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Banana')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Banana
          <input type="text" class="form-control shadow-none" name="banana_quantity" placeholder="Enter quantity">
        </div>
      </div>
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Mango')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Mango
          <input type="text" class="form-control shadow-none" name="mango_quantity" placeholder="Enter quantity">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Orange')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Orange
          <input type="text" class="form-control shadow-none" name="orange_quantity" placeholder="Enter quantity">
        </div>
      </div>
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Papaya')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Papaya
          <input type="text" class="form-control shadow-none" name="papaya_quantity" placeholder="Enter quantity">
        </div>
      </div>
      <div class="col-md-4">
        <div class="emoji-box" id="Fruits" onclick="fetchCalories('Grapes')">
          <div class="emoji"><img src="../../images/apple.jpg"></div> 
          Grapes
          <input type="text" class="form-control shadow-none" name="grapes_quantity" placeholder="Enter quantity">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


    <!-- <label for="calories"><h4>Number of Calories you consumed :</h4></label>
    <input type="number" name="calories" class="calories" value="0">
    yo: <div id="caloriesDisplay"></div> -->
    Hello, <?php echo 
      $_SESSION['email'] 
    ?>
    <?php
    $query = "SELECT * FROM calories where Food_Item = 'Apple'";
    $query_run = mysqli_query($conn,$query) ;
    $val = mysqli_fetch_array(mysqli_query($conn,$query))[3];
    ?>
   <?php echo "<b>$val</b>";?>

   
    
  <script>
    function fetchCalories(foodItem) {
    // Make an AJAX request to fetch calorie count
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update frontend with fetched calorie count
                document.getElementById('caloriesDisplay').innerHTML = xhr.responseText;
            } else {
                console.error('Error fetching data:', xhr.statusText);
            }
        }
    };
    xhr.open('GET', 'fetch_calories.php?foodItem=' + encodeURIComponent(foodItem), true);
    xhr.send();
}
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
