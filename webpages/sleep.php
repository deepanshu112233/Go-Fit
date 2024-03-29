<?php 
session_start();
include '../backend/dbconnect.php';
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../styling/sleep.css"> -->
    <title>Sleep</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Montserrat:wght@100&family=Pixelify+Sans&display=swap');
      .child1{
        width:12em;
        height:16em;
      }
      .counter-button{
        height:7em;
        width:6em;
      }
      body{
          font-family: 'AR One Sans', sans-serif;
      }
      .opt{
        margin-top:2em;
        text-align:center;
      }
      h1{
        margin-bottom:1em;
      }
      .counter-button {
        padding-bottom:2em;
        margin-right:10em;
        margin-left:7em;
      }

      .counter-value {
        display:inline-block;
        /* width:4em;
        height:2em; */
        padding-top:0.5em;
        font-size:4em;
          /* font-size: 30px; */
          /* margin-top: 10px; */
        /* border:0.1em solid black; */
      }
      .nav-link{
          color:white;
      }
      .navbar-brand{
          color:white;
          /* height:2em; */
      }
      .nav-link{
          margin-right: 2em;
      }
      nav{
          font-size: 1.25em;
          height:4em;
      }
      .logout{
          height:4em;
          width:4em;
          margin-top:0 !important;
      }
      .btn{
        margin-left:5em;
        margin-top:3em;
        justify-self: center;
        /* height:4em; */
        width:8em;
        /* margin-top:1em; */
        width:5em;
      }
    </style>
  </head>
  <body>
    <?php include 'components/navbar.php' ?>

    <!-- <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="dietchoices.php">Diet Choices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="waterintake.php">Water Intake</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="sleep.php">Sleep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="physicalactivities.php">Physical Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stressrelivingactivities.php">Stress Relieving Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="result.php">Result</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="demo.php">Your Activity</a>
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
    </nav> -->

    <form action="../backend/backendsleep.php" method = "post">
        <div class='opt'>
          <h1>How many hours did you sleep today?</h1><br>
          <img src="../images/moon1.png">
          <img src = "../images/counter.jpeg" class="counter-button child" id="increment-button">
          <!-- <span class="counter-value child" id="counter-value" name="water">0</span> -->
          <input class="counter-value" id="counter-value" name="sleep" value="0">
          <!-- <span>glasses</span> -->
        </div>
        
        <!-- <div class="opt"><input type="submit" value="Submit" class="btn btn-success"></div> -->
        <div class="opt"><button class="btn btn-success" onClick="location.href='result.php';">Submit</button></div>
        Hello, <?php echo $_SESSION['email'] ?>
    </form>

  <script>
    const incrementButton = document.getElementById('increment-button');
    const counterValueInput = document.getElementById('counter-value');

    // Add click event listener to the increment button
    incrementButton.addEventListener('click', function() {
        // Get the current value of the counter input
        let currentValue = parseInt(counterValueInput.value);

        // Increment the counter value by 1
        currentValue++;

        // Update the value of the counter input
        counterValueInput.value = currentValue;
    });
  </script>
     
  </body>
</html>