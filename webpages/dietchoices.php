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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How Are You Feeling Today?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styling/dietchoices.css">
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
              <a class="nav-link active" href="dietchoices.php">Diet Choices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="waterintake.php">Water Intake</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sleep.php">Sleep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="physicalactivities.php">Physical Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stressrelivingactivities.php">Stress Relieving Activities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="demo.php">Result</a>
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
    </nav>

    <br>
        <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Fruits" onclick="selectEmoji('Fruits')">
              <div class="emoji"><img src="../images/fruits.jpg"></div>
              <span class="txt">
                <a href="dietcategories/fruits.php">Fruits</a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Soft-drinks" onclick="selectEmoji('Soft-drinks')">
              <div class="emoji"><img src="../images/soft-drinks.jpg"></div>
              <span class="txt">
                <a href="dietcategories/softdrinks.php">Soft-drinks</a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Chappatis" onclick="selectEmoji('Chapatis')">
              <div class="emoji"><img src="../images/chappatis.jpeg"></div>
              <span class="txt">Chapatis</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Cereals" onclick="selectEmoji('Dairy-products')">
              <div class="emoji"><img src="../images/cereals.jpg"></div>
              <span class="txt">Dairy products</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Chips" onclick="selectEmoji('Vegetarian')">
              <div class="emoji"><img src="../images/chips.jpg"></div>
              <span class="txt">Vegetarian food</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="emoji-box" id="Chips" onclick="selectEmoji('Non-vegetarian')">
              <div class="emoji"><img src="../images/chips.jpg"></div>
              <span class="txt">Non vegetarian food</span>
            </div>
          </div>
        </div>
      </div>
        </div>

    Hello, <?php echo 
      $_SESSION['email'] 
    ?>
   <?php echo "<b>$val</b>";?>

   
    
    <script>
    
    function selectEmoji(emoji) {
        if(document.getElementById(emoji).style.border == "2px solid red") {
            document.getElementById(emoji).style.border = "";
            console.log(emoji)
          } else {
            document.getElementById(emoji).style.border = "2px solid red";
            console.log(emoji)
        }
    }

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
