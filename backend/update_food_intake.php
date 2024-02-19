<?php
session_start();

// Assuming you have established the database connection earlier and stored it in $conn

if(isset($_POST['emoji']) && isset($_SESSION['email'])) {
    $emoji = $_POST['emoji'];
    $email = $_SESSION['email'];

    // Query to get calories for the selected emoji
    $query = "SELECT Cals_Per_100_Grams FROM calories WHERE Food_Category = '$emoji'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $calories = $row['Cals_Per_100_Grams'];

        // Check if the user already has an entry for this food category
        $query = "SELECT * FROM food_intake WHERE Email = '$email' AND Food_Category = '$emoji'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0) {
            // Insert a new entry
            $query = "INSERT INTO food_intake (Email, Food_Category, Calories) VALUES ('$email', '$emoji', '$calories')";
        } else {
            // Update existing entry
            $query = "UPDATE food_intake SET Calories = Calories + '$calories' WHERE Email = '$email' AND Food_Category = '$emoji'";
        }

        // Execute the query
        mysqli_query($conn, $query);
        echo "Success";
    } else {
        echo "Failed to retrieve calories for the selected emoji.";
    }
} else {
    echo "Invalid request.";
}
?>
