<?php
session_start();
require 'config.php';

if (isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $status = 'active'; // Consider using lowercase for consistency (e.g., 'active')

    // CREATE
    $sql = "INSERT INTO tbluser(email, fullName, password, status)
            VALUES('$email', '$name', '$password', '$status')";

    if ($conn->query($sql)) {
        // Registration successful
        $_SESSION['user_email'] = $email; // Set the session variable with the registered email
        header('Location: HomePage.php');
        exit(); // Make sure to exit after a header redirect
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!-- Register Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Add CSS files -->
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <script src="js/register.js"></script>
</head>
<body style="background-image: url('images/pearl-2900136_1280.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="form">
        <a class="header">Register</a>
        <form action="Register.php" method="post">
            <label for="name" class="input">
                <label class="placeholder" for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="John Smith">
            </label>
            <p class="error" style="text-align: center;"></p>
            <label for="email" class="input">
                <label class="placeholder" for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="user@gmail.com">
            </label>
            <p class="error" style="text-align: center;"></p>
            <label for="password" class="input">
                <label class="placeholder" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="******">
            </label>
            <p class="error" style="text-align: center;"></p>
            <input type="checkbox" name="accept" id="accept">
            <label class="placeholder" for="accept">Agree to terms & conditions</label>
            <p class="error" style="text-align: center;"></p>
            <input type="submit" name="submit" value="Register">
            <span class="footer">Already have an account? <a href="LoginProcess.php">Login here</a></span>
        </form>
    </div>
</body>
</html>
