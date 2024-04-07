<?php

// Assume you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL to check if username and password exist in the database
$sql = "SELECT * FROM gymdata WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    session_start();
    $_SESSION["username"] = $username;
    // Redirect to dashboard based on user
    $row = $result->fetch_assoc();
    $user_type = $row['user_type'];
    switch ($user_type) {
        case "bhandara_atc":
            header("Location: Bhandara-district.php");
            break;
        case "atc_nagpur":
            header("Location: ATCNagpur-district.php");
            break;
        case "gondia_atc":
            header("Location: Gondia-district.php");
            break;
        case "nagpur_atc":
            header("Location: Nagpur-district.php");
            break;
        case "wardha_atc":
            header("Location: Wardha-district.php");
            break;
        case "chandrapur_atc":
            header("Location: Chandrapur-district.php");
            break;
        case "gadchiroli_atc":
            header("Location: Gadchiroli-district.php");
            break;
        default:
            echo '<script type="text/javascript">';
            echo 'alert("Invalid user type!");';
            echo 'window.location.href = "index.php";';  // Replace "new_page.php" with the actual page URL you want to redirect to
            echo '</script>';
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Invalid username or password!");';
    echo 'window.location.href = "index.php";';  // Replace "new_page.php" with the actual page URL you want to redirect to
    echo '</script>';
}

$conn->close();
?>