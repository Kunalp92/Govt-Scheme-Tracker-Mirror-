<?php


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

$name = mysqli_real_escape_string($conn, $_POST['name']);
$age = intval($_POST['age']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
$village = intval($_POST['village']);
$state = intval($_POST['state']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$income = mysqli_real_escape_string($conn, $_POST['income']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$married = mysqli_real_escape_string($conn, $_POST['married']);
$work = mysqli_real_escape_string($conn, $_POST['work']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$dob = mysqli_real_escape_string($conn, $_POST['election']);
$receivedSchemes = mysqli_real_escape_string($conn, $_POST['receivedSchemes']);
$schemesName = mysqli_real_escape_string($conn, $_POST['schemesName']);
$schemeAmount = mysqli_real_escape_string($conn, $_POST['schemeAmount']);
$schemesName1 = mysqli_real_escape_string($conn, $_POST['schemesName1']);
$schemeAmount1 = mysqli_real_escape_string($conn, $_POST['schemeAmount1']);
$schemesName2 = mysqli_real_escape_string($conn, $_POST['schemesName2']);
$schemeAmount2 = mysqli_real_escape_string($conn, $_POST['schemeAmount2']);

$sql = "INSERT INTO nagpur_user_table (name, age, category, mobile, aadhar, village, state, country, income, gender, married, work, dob, election, receivedSchemes, schemesName, schemeAmount, schemesName1, schemeAmount1, schemesName2, schemeAmount2)
        VALUES ('$name', $age, '$category', '$mobile', '$aadhar', $village, $state, '$country', '$income', '$gender', '$married', '$work', '$dob', '$election', '$receivedSchemes', '$schemesName', '$schemeAmount', '$schemesName1', '$schemeAmount1', '$schemesName2', '$schemeAmount2')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Villager Details Add successfully");';
    echo 'window.location.href = "NagpurVillagers-add-new.php";';  // Replace "new_page.php" with the actual page URL you want to redirect to
    echo '</script>';
} else {
    echo "Error: " . mysqli_error($conn);

}



mysqli_close($conn);
?>