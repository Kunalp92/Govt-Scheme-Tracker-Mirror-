<?php

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


// Assume you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Query the database for the user
    $sql = "SELECT * FROM customer_data WHERE userName='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION['user'] = $username;
        // User found, redirect to the next page
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid username or password, display error message
        echo '<script type="text/javascript">';
        echo 'alert("Invalid username or password");';
        echo 'window.location.href = "index.php";';  // Replace "new_page.php" with the actual page URL you want to redirect to
        echo '</script>';
    }
}

// Close the database connection
$conn->close();

?>