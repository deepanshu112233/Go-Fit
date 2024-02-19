<?php
    session_start();
    if(!isset($_SESSION['User']))  
    {
        header("Location: login.php?msg=Please login first!");
        session_destroy();
    }
    include('../backend/dbconnect.php');
    $email = $_SESSION['email'];




    /*$query = "SELECT SUM(Jogging) FROM physical_activity WHERE Email = '$email';";
    $j = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Exercise) FROM physical_activity WHERE Email = '$email';";
    $e = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Cycling) FROM physical_activity WHERE Email = '$email';";
    $c = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Playing) FROM physical_activity WHERE Email = '$email';";
    $p = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Hiking) FROM physical_activity WHERE Email= '$email';";
    $h = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Other_Physical) FROM physical_activity WHERE Email = '$email';";
    $o = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/
    $query = "SELECT COALESCE(SUM(Jogging), 0) FROM physical_activity WHERE Email = '$email';";
    $j = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Exercise), 0) FROM physical_activity WHERE Email = '$email';";
    $e = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Cycling), 0) FROM physical_activity WHERE Email = '$email';";
    $c = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Playing), 0) FROM physical_activity WHERE Email = '$email';";
    $p = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Hiking), 0) FROM physical_activity WHERE Email = '$email';";
    $h = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Other_Physical), 0) FROM physical_activity WHERE Email = '$email';";
    $o = mysqli_fetch_array(mysqli_query($conn, $query))[0];






    /*$query = "SELECT SUM(Chanting) FROM stress_activity WHERE Email = '$email';";
    $c = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Yoga) FROM stress_activity WHERE Email = '$email';";
    $y = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Meditation) FROM stress_activity WHERE Email = '$email';";
    $m = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/
    $query = "SELECT COALESCE(SUM(Chanting), 0) FROM stress_activity WHERE Email = '$email';";
    $c = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Yoga), 0) FROM stress_activity WHERE Email = '$email';";
    $y = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Meditation), 0) FROM stress_activity WHERE Email = '$email';";
    $m = mysqli_fetch_array(mysqli_query($conn, $query))[0];





    /*$query = "SELECT SUM(Water) FROM water_intake WHERE Email = '$email';";
    $water = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT SUM(Sleep) FROM sleep WHERE Email = '$email';";
    $sleep = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/
    $query = "SELECT COALESCE(SUM(Water), 0) FROM water_intake WHERE Email = '$email';";
    $water = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(SUM(Sleep), 0) FROM sleep WHERE Email = '$email';";
    $sleep = mysqli_fetch_array(mysqli_query($conn, $query))[0];




    //$query = "SELECT SUM(Calories) FROM data WHERE Email = '$email';";
    //$cal = mysqli_fetch_array(mysqli_query($conn,$query))[0];



    //$query = "SELECT COUNT(*) FROM physical_activity WHERE Email = '$email';";
    //$cnt = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    //$cnt = 2;
    // $query = "SELECT COUNT(*) FROM stress_activity WHERE Email = '$email';";
    // $cnt2 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT COUNT(*) FROM physical_activity WHERE Email = '$email';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row[0] > 0) {
            // Update cnt2
            $cnt = $row[0];
        } else {
            // Set cnt2 to 1
            $cnt = 1;
        }
    } else {
        // Handle query error
        $cnt = 1; // Default to 1 in case of error
    }



    $query = "SELECT COUNT(*) FROM stress_activity WHERE Email = '$email';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row[0] > 0) {
            // Update cnt2
            $cnt2 = $row[0];
        } else {
            // Set cnt2 to 1
            $cnt2 = 1;
        }
    } else {
        // Handle query error
        $cnt2 = 1; // Default to 1 in case of error
    }


    $tot = $j + $e + $c + $p + $h + $o;
    $avg = round(($tot / $cnt),2);
    $j = round(($j / $cnt),2);
    $e = round(($e / $cnt),2);
    $c = round(($c / $cnt),2);
    $p = round(($p / $cnt),2);
    $h = round(($h / $cnt),2);
    $o = round(($o / $cnt),2);



    $c = round(($c / $cnt2),2);
    $y = round(($y / $cnt2),2);
    $m = round(($m / $cnt2),2);




    $water = round(($water / $cnt),2);
    $sleep = round(($sleep / $cnt),2);
    //$cal = round(($cal / $cnt),2);



    $currentDate = date("Y-m-d");
    $email = $_SESSION['email'];



    /*$query = "SELECT Jogging FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    $j1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Exercise FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    $e1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Cycling FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    // $c1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Playing FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    $p1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Hiking FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    $h1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Other_Physical FROM physical_activity where Email = '$email' and Date = '$currentDate';"; 
    $o1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/

    //$query = "SELECT COALESCE(Jogging, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    //$j1 = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(Jogging, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $j1 = $row ? $row[0] : 0;
    } else {
        $j1 = 0; // Set default value to 0 if query fails
    }


    //$query = "SELECT COALESCE(Exercise, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    //$e1 = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $query = "SELECT COALESCE(Exercise, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $e1 = $row ? $row[0] : 0;
    } else {
        $e1 = 0; // Set default value to 0 if query fails
    }


    $query = "SELECT COALESCE(Cycling, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    //$c1 = mysqli_fetch_array(mysqli_query($conn, $query))[0];
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $c1 = $row ? $row[0] : 0;
    } else {
        $c1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Playing, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $p1 = $row ? $row[0] : 0;
    } else {
        $p1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Hiking, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $h1 = $row ? $row[0] : 0;
    } else {
        $h1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Other_Physical, 0) FROM physical_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $o1 = $row ? $row[0] : 0;
    } else {
        $o1 = 0; // Set default value to 0 if query fails
    }





    /*$query = "SELECT Chanting FROM stress_activity where Email = '$email' and Date = '$currentDate';"; 
    $c1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Yoga FROM stress_activity where Email = '$email' and Date = '$currentDate';"; 
    $y1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Meditation FROM stress_activity where Email = '$email' and Date = '$currentDate';"; 
    $m1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/
    $query = "SELECT COALESCE(Chanting, 0) FROM stress_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $c1 = $row ? $row[0] : 0;
    } else {
        $c1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Yoga, 0) FROM stress_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $y1 = $row ? $row[0] : 0;
    } else {
        $y1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Meditation, 0) FROM stress_activity WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $m1 = $row ? $row[0] : 0;
    } else {
        $m1 = 0; // Set default value to 0 if query fails
    }





    /*$query = "SELECT Water FROM water_intake where Email = '$email' and Date = '$currentDate';"; 
    $water1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $query = "SELECT Sleep FROM sleep where Email = '$email' and Date = '$currentDate';"; 
    $sleep1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];*/
    $query = "SELECT COALESCE(Water, 0) FROM water_intake WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $water1 = $row ? $row[0] : 0;
    } else {
        $water1 = 0; // Set default value to 0 if query fails
    }

    $query = "SELECT COALESCE(Sleep, 0) FROM sleep WHERE Email = '$email' AND Date = '$currentDate';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $sleep1 = $row ? $row[0] : 0;
    } else {
        $sleep1 = 0; // Set default value to 0 if query fails
    }







    //$query = "SELECT Calories FROM data where Email = '$email' and Date = '$currentDate';"; 
    //$cal1 = mysqli_fetch_array(mysqli_query($conn,$query))[0];
    $tot = $j1 + $e1 + $c1 + $p1 + $h1 + $o1;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../styling/result.css">
        <title>Result</title>
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
                            <a class="nav-link" href="dietchoices.php">Diet Choices</a>
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
                            <a class="nav-link active" href="result.php">Result</a>
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

        <div class="bdy">
            <div class="row">
                <div class="card">
                    <img class="card-img-top" src="../images/jogging.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Jogging</h5>
                        <p class="txt">Average Jogging time : <?php echo  "<span><b>$j</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt">Today's Jogging time : <?php echo  "<span><b>$j1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/exercise.jpg" alt="Card image cap" width="20px">
                    <div class="card-body">
                        <h5 class="card-title">Exercise</h5>
                        <p class="txt">Average Exercise time : <?php echo  "<span><b>$e</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Exercise time : <?php echo  "<span><b>$e1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/Cycling.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Cycling</h5>
                        <p class="txt">Average Cycling time : <?php echo  "<span><b>$c</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Cycling time : <?php echo  "<span><b>$c1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <img class="card-img-top" src="../images/playing.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Playing</h5>
                        <p class="txt">Average Playing time : <?php echo  "<span><b>$p</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Playing time : <?php echo  "<span><b>$p1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/hiking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Hiking</h5>
                        <p class="txt">Average Hiking time : <?php echo  "<span><b>$h</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Hiking time : <?php echo  "<span><b>$h1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/others.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">All physical activities</h5>
                        <p class="txt">Average physical activities time : <?php echo  "<span><b>$avg</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's physical activities time : <?php echo  "<span><b>$tot</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <img class="card-img-top" src="../images/chanting.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Chanting</h5>
                        <p class="txt">Average Chanting time : <?php echo  "<span><b>$c</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Chanting time : <?php echo  "<span><b>$c1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/yoga.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="txt">Average Yoga time : <?php echo  "<span><b>$y</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Yoga time : <?php echo  "<span><b>$y1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/meditation.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Meditation</h5>
                        <p class="txt">Average Meditation time : <?php echo  "<span><b>$m</b></span>";?><span>&nbsp;minutes</span></p>
                        <p class="txt txt1">Today's Meditation time : <?php echo  "<span><b>$m1</b></span>";?><span>&nbsp;minutes</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <img class="card-img-top" src="../images/water.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Water</h5>
                        <p class="txt">Average glasses of water : <?php echo  "<span><b>$water</b></span>";?><span>&nbsp;glasses</span></p>
                        <p class="txt txt1">Today's glasss of water : <?php echo  "<span><b>$water1</b></span>";?><span>&nbsp;glasses</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/sleep.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sleep</h5>
                        <p class="txt">Average sleep time : <?php echo  "<span><b>$sleep</b></span>";?><span>&nbsp;hours</span></p>
                        <p class="txt txt1">Today's sleep time : <?php echo  "<span><b>$sleep1</b></span>";?><span>&nbsp;hours</span></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/calories.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Calories</h5>
                        <p class="txt">Average calories consumed : <?php echo  "<span><b>$cal</b></span>";?><span>&nbsp;Kcal</span></p>
                        <p class="txt txt1">Today's calories consumed : <?php echo  "<span><b>$cal1</b></span>";?><span>&nbsp;Kcal</span></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
