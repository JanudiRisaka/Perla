<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to the login page if not logged in
    header('Location: Login.html');
    exit();
}

/// Get the user's email from the session
$userEmail = $_SESSION['user_email'];

// Retrieve user details from the database
$query = "SELECT * FROM tbluser WHERE email = '$userEmail'"; // Fix: use $userEmail instead of $user_email
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch user details as an associative array
$userDetails = mysqli_fetch_assoc($result);

// Check if user details are fetched successfully
if (!$userDetails) {
    die("User details not found");
}
// Now you can access individual fields like email, name, etc.
$email = $userDetails['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perla</title>
    <!--Add CSS files-->
    <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <!--Add icons to the Footer-->
    <script src="https://kit.fontawesome.com/8d1ac6ad03.js" crossorigin="anonymous"></script>
    <style>
    .deliverystatus {
        width: 100px;
    }
    .deliverystatus td,tr,th {
        padding: 20px;
        text-align:center;
    }
    .deliverystatus img {
        margin-left: -20px;
    }
    h3 {
    font-weight:400;
    font-size: 30px;
    margin:10px;
    text-align:center;
}
    </style>
</head>
<body>
 <!--Begins of Header Section-->
 <div class="header">
     <div class="header-left">
         <a href="HomePage.php">HOME</a>
         <a href="AboutUs.php">OUR STORY</a>
         <div class="dropdown">
             <button class="dropbtn"><a href="Products.php">JEWELLERY</a></button>
             <ul>
                <li><a href="Products.php?category=Necklace">Necklaces</a></li>
                <li><a href="Products.php?category=Earring">Earrings</a></li>
                <li><a href="Products.php?category=Ring">Rings</a></li>
                <li><a href="Products.php?category=Bracelet">Bracelets</a></li>
                <li><a href="Products.php?category=PASSIONOIR">PASSIONOIR</a></li>
             </ul>
         </div>
     </div>
     <div class="logo">
         <h1 class="title">PERLA</h1>
     </div>
     <div class="header-right">
        <a href="ContactUs.php">CONTACT US</a>
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_email'])) {
            // User is logged in, display Cart and Profile links
            echo '<a href="Cart.php"><i class="fa-solid fa-cart-shopping fa-flip-horizontal" style="font-size:25px"></i></a>';
            echo '<a href="Profile.php"><i class="fas fa-user-alt" style="font-size:25px"></i></a>';
        } else {
            // User is not logged in, display Login/Sign Up link
            echo '<a href="LoginProcess.php">LOG IN / SIGN UP</a>';
        }
        ?>
    </div>
 </div>
 <!--End of Header Section-->
<div class="pcontent" style="background-image: url('images/homeimage2.png');background-repeat: no-repeat;background-size: cover;">
    <h2>My Account</h2>
    <div class="profile-page">
        <div class="form">
            <div class="profileInfo">
                <h3>Account Information</h3>
                <form action="" method="post">
                    <label for="name" class="input">
                        <label class="placeholder" for="name">Full Name:</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $userDetails['fullName']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                    <label for="email" class="input">
                        <label class="placeholder" for="email">Email:</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $userDetails['email']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                    <label for="area" class="input">
                        <label class="placeholder" for="area">Area:</label>
                        <input class="form-control" type="text" name="area" id="area" value="<?php echo $userDetails['area']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                    <label for="district" class="input">
                        <label class="placeholder" for="district">District:</label>
                        <input class="form-control" type="text" name="district" id="district" value="<?php echo $userDetails['district']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                    <label for="province" class="input">
                        <label class="placeholder" for="province">Province:</label>
                        <input class="form-control" type="address" name="province" id="province" value="<?php echo $userDetails['province']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                    <label for="phoneNumber" class="input">
                        <label class="placeholder" for="phoneNumber">Phone Number:</label>
                        <input class="form-control" type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $userDetails['phoneNumber']; ?>">
                    </label>
                    <p class="error" style="text-align: center;"></p>
                </form>
                <div class="pBtn" style="display:inline;">
                    <form action="EditUserProfile.php" method="post">
                        <a href="EditUserProfile.php"><input type="submit" name="edit" value="Edit"></a>
                    </form>
                    <form action="LogOut.php" method="post">
                        <a href="LoginProcess.php"><input type="submit" name="logout" value="Logout"></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="form">
            <h3>Order Information</h3>
            <?php
                require 'config.php';

                // Check if the user is logged in
                if (!isset($_SESSION['user_email'])) {
                    // Redirect to the login or register page
                    header('Location: LoginProcess.php');
                    exit();
                }

                // Get the user's email from the session
                $user_email = $_SESSION['user_email'];

                $uquery = "SELECT userID FROM tbluser WHERE email = '$user_email'";
                $uresult = mysqli_query($conn, $uquery);

                if ($uresult) {
                    // Check if a matching user is found
                    if (mysqli_num_rows($uresult) > 0) {
                        // Fetch the userID
                        $row = mysqli_fetch_assoc($uresult);
                        $userID = $row['userID'];
                    } else {
                        // Handle the case where no user is found
                        echo "Error: No user found with the provided email.";
                    }
                } else {
                    echo "Error fetching user data: " . mysqli_error($conn);
                }

                // Fetch order information with status, quantity, name, and image
                $query_order = "SELECT o.*, p.name, p.image FROM tblorder o
                                JOIN tblproduct p ON o.productID = p.productID
                                WHERE o.userID = '$userID'";

                $result_order = mysqli_query($conn, $query_order);

                if ($result_order) {
                    echo '<table class="deliverystatus">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Items</th>';
                    echo '<th>Name</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>Status</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Display order items with status, quantity, name, and image
                    while ($row = mysqli_fetch_assoc($result_order)) {
                        echo '<tr>';
                        echo '<td><a href="ProductDetails.php?productID=' . $row['productID'] . '"><img src="images/' . $row['image'] . '" style="width:100px;"></a></td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td class="txtstatus" style="color:black">' . $row['status'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "Error fetching order data: " . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>

        </div>
    </div>
</div>
 <!--Begin Of Footer-->
 <footer>
        <div class="row0" style="width:100%; text-align: left; display: flex;">
            <a href="https://www.instagram.com/"> <i class="fa fa-instagram" style="font-size:48px;color:rgb(255, 255, 255)"></i></a>
            <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" style="font-size:48px;color:rgb(255, 255, 255)"></i></a>
            <a href="https://twitter.com/"><i class="fa fa-twitter-square" style="font-size:48px;color:rgb(255, 255, 255)"></i></a>
            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest-square" style="font-size:48px;color:rgb(255, 255, 255)"></i></a>
            <a href="https://www.youtube.com/"><i class="fa fa-youtube-play" style="font-size:48px;color:rgb(255, 255, 255)"></i></a>
        </div>
        <div class="row1" style="width: 100%; text-align:center">
            <div class="column">
                <div class="container">
                    <i class='fas fa-phone-square-alt' style='font-size:36px'></i>
                    <a href="tel:08125439090">0812 543 9090</a>
              </div>
            </div>
            <div class="column">
                <div class="container">
                    <i class="fa fa-map-marker" style="font-size:36px"></i>
                  <a href="https://www.google.com/maps/@6.8890825,79.8541825,20.17z?entry=ttu">1000,  FLOWER STREET,  COLOMBO,  SRI LANKA</a>
              </div>
            </div>
            <div class="column">
                <div class="container">
                  <i class="fa-solid fa-envelope" style='font-size:36px'></i>
                  <a href="mailto:INFO@PERLA.LK">INFO@PERLA.LK</a>
              </div>
            </div>
        </div>
        <div class="row2" style="width: 100%; text-align:center; display: flex;">
            <div class="column">
                <div class="container">
                  <a href="AboutUs.html">About Us</a>
              </div>
            </div>
            <div class="column">
                <div class="container">
                  <a href="Terms&privacy.html">Terms of Service</a>
              </div>
            </div>
            <div class="column">
                <div class="container">
                  <a href="ContactUs.html">Contact Us</a>
              </div>
            </div>
        </div>
        <div id="cpyright" style="font-size:15px; text-align:center;">
        <i>2023 ALL Right Reserved</i>
        </div>
    </footer>
    <!--End of footer-->
</body>
</html>