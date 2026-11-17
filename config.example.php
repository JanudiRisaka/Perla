
<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$db = "perla";

// Create database connection
$conn = new mysqli($servername, $username, $password, $db);

// Check database connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Unable to connect to the database.");
}

$conn->set_charset("utf8mb4");

?>
