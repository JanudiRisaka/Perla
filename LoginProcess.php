<?php
session_start();
require 'config.php';

if (isset($_POST["submit"])) {
    $Email = $_POST["email"];
    $Password = $_POST["password"];

    // READ user
    $userSql = "SELECT * FROM tbluser WHERE email = '$Email' AND Password = '$Password'";
    $userResult = $conn->query($userSql);

    // READ admin
    $adminSql = "SELECT * FROM tbladmin WHERE email = '$Email' AND Password = '$Password'";
    $adminResult = $conn->query($adminSql);

    if ($userResult->num_rows > 0) {
        $userRow = mysqli_fetch_assoc($userResult);
        
        // Check if the user is active
        if ($userRow['status'] == 'active') {
            echo "User login successful";
            $_SESSION['user_email'] = $userRow['email'];
            header('Location: HomePage.php');
            exit(); // Ensure that the script stops execution after the redirect
        } else {
            echo '<script>alert("User account is inactive");</script>';
            echo '<script>window.location.href = "Homepage.php";</script>';
            exit();
        }
    } elseif ($adminResult->num_rows > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        echo '<script>alert("Admin login successful");</script>';
        $_SESSION['admin_email'] = $adminRow['email'];
        header('Location: AdminProduct.php');
       
    } else {
        echo '<script>alert("Invalid username or password");</script>';
    }
}

$conn->close();
?>
<!--Log in Page-->
<!DOCTYPE html>
<html>
<head>
  <title>signin</title>
  <!--Add CSS files-->
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <!--Add js-->
  <script src="js/register.js"></script>

</head>
<body style="background-image: url('images/pearl-2900136_1280.jpg');background-repeat: no-repeat;background-size: cover;">
  <div class="form">
    <a class="header">Login</a>
    <form action="LoginProcess.php" method="post">
        <p class="error" style="text-align: center;"></p>
        <label for="email" class="input">
            <label class="placeholder" for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="user@gmail.com" required>
        </label>
        <p class="error" style="text-align: center;"></p>
        <label for="pswd" class="input">
            <label class="placeholder" for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="******" required>
        </label>
        <p class="error" style="text-align: center;"></p>
    
          <input type="submit" name="submit" value="Login" onClick="validationAll(event)">
        
        <span class="footer">Don't have an account? <a href="Register.php">Register here</a></span>
    </form>
</body>
</html>