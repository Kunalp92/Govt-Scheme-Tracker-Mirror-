<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details from the database based on user ID
    // Modify this query to match your database schema
    $sql = "SELECT * FROM nagpur_user_table WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Output user details
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Age: " . $row['age'] . "</p>";
        // Add more details as needed
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}
?><?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details from the database based on user ID
    // Modify this query to match your database schema
    $sql = "SELECT * FROM nagpur_user_table WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Output user details
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Age: " . $row['age'] . "</p>";
        // Add more details as needed
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}
?>