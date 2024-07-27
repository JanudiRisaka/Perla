<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Perla</title>

        <!--To add CSS file-->
        <link rel="stylesheet" href="css/admin.css">
        <style>
             body {background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%); min-height:537px;}
             h2 {
                text-align:center !important;
                margin:0 0 30px 0;
                padding-top:10px;
                font-size:29px;
            }
            .form {
                font-size:18px;
                width: 390px;
                margin:0 auto;
                padding: 10px;
                border-radius: 10px;
                opacity:0.8;
                background-color:white;
            }
            .input input {
                padding: 15px 0 15px 0;
                border: none;
                outline: none;
                border-radius: 10px;
                font-size:18px;
                margin-left:10px;
            }
            .form input[type="submit"] {
                width: 90%;
                border-radius: 10px;
                background-color: #cc5500;
                color: white;
                padding: 15px
            }
            .form input[type="submit"]:hover {
                opacity: 0.8;
            }
            a {
                text-decoration: none; 
                text-decoration-color: #cc5500; 
            }
        </style>
    </head>

    <body>
        <!--Header section BEGINS-->
        <div class="header">
            <div class="header-left">
                <h1 class="title">PERLA</h1>
            </div>
            <div class="header-right">
                <a href="AdminProduct.php">Product</a>
                <a href="AdminCustomer.php">Customer</a>
                <a href="AdminInquiry.php">Inquiry</a>
                <a href="AdminOrder.php">Order</a>
                <a href="AdminProfile.php">Profile</a>
            </div>
        </div>  
         <!--Header section ENDS-->
        <h2>Profile Details</h2>
        <div class="form">
            <div class="profileInfo">
                <form action="" method="post">
                <?php
                if (isset($_POST['logout'])) {
                    
                    session_unset();
                    session_destroy();
                
                    header("Location: LoginPage.html");
                    exit();
                }
                    if (isset($_SESSION['admin_email'])) {
                        $adminEmail = $_SESSION['admin_email'];

                        $query = "SELECT name FROM tbladmin WHERE email = '$adminEmail'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $adminData = mysqli_fetch_assoc($result);

                            if ($adminData) {
                                $adminName = $adminData['name'];

                                echo '<label for="name" class="input">';
                                echo '<label class="placeholder" for="name">Full Name:</label>';
                                echo "<input class='form-control' type='text' name='name' id='name' readonly value='$adminName'>";
                                echo '</label>';
                                echo '<p class="error" style="text-align: center;"></p>';
                                echo '<label for="email" class="input">';
                                echo '<label class="placeholder" for="email">Email:</label>';
                                echo "<input class='form-control' type='text' name='email' id='email' readonly value='$adminEmail'>";
                                echo '</label>';
                                echo '<p class="error" style="text-align: center;"></p>';
                            } else {
                                // Admin data not found, handle the error as needed
                                echo "Admin data not found";
                            }
                        } else {
                            // Query was not successful, handle the error as needed
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                    ?>
                </form>
                <form action="LogOut.php" method="post">
                        <a href="LoginProcess.php"><input type="submit" name="logout" value="Logout"></a>
                </form>
            </div>
        </div>
    </body>
</html>
