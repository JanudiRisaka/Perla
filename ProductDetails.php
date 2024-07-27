<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products.html</title>
        <!--Add CSS files-->
        <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
        <link rel="stylesheet" type="text/css" href="css/productDetails.css">
        <!--Add icons to the Footer-->
        <script src="https://kit.fontawesome.com/8d1ac6ad03.js" crossorigin="anonymous"></script>
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
            session_start();

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
    <!--Begins of content-->
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
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
                // Assuming you have a form field for productID
                $productID = isset($_POST['productID']) ? $_POST['productID'] : null;
                $user_email = $_SESSION['user_email'];
                $quantity = 1; // You may adjust the quantity as needed

                if (!$productID) {
                    echo "Error: Product ID is not set.<br>";
                    exit();
                }

                // Use INSERT ... ON DUPLICATE KEY UPDATE
                $insertQuery = "INSERT INTO tblcart (userID, productID, quantity) VALUES ('$userID', '$productID', '$quantity') 
                                ON DUPLICATE KEY UPDATE quantity = quantity + 1";

                $insertResult = mysqli_query($conn, $insertQuery);

                if (!$insertResult) {
                    echo "Error adding product to cart: " . mysqli_error($conn);
                }
                else {
                    echo '<script>alert("Add to cart successfully!");</script>';
                    header('Location: Cart.php');
                    exit(); // Ensure that the script stops execution after the redirect
                }
            }

            if (isset($_GET['productID'])) {
                $productID = $_GET['productID'];
                $query = "SELECT * FROM tblproduct WHERE productID = '$productID'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<form method="post" action="ProductDetails.php">';  // Change the action to Cart.php or the appropriate page
                        echo '<div class="product-container">';
                        echo '<div class="product">';
                        echo '<div class="image">';
                        echo '<img style="width:500px;" src="images/' . $row['image'] . '">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="product">';
                        echo '<div class="detail-text"><br><br><br>';
                        echo '<h4 class="txtp">' . $row['name'] . '</h4>';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '<h5><b>Rs.' . $row['price'] . '</b></h5>';
                        echo '<div class="details">';
                        echo '<h5>Details</h5>';
                        echo '<ul>';
                        echo '<li>Authentic freshwater pearl</li>';
                        echo '<li>Pearl size: ' . $row['pearlSize'] . '</li>';
                        echo '<li>Pearl Type: ' . $row['pearlType'] . '</li>';
                        echo '<li>Chain metal: ' . $row['metalType'] . '</li>';
                        echo '<li>Chain length: ' . $row['chainLength'] . '</li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '<input type="hidden" name="productID" value="' . $row['productID'] . '">';
                        echo '<input type="submit" name="add_to_cart" class="submit-btn" value="ADD TO CART">';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</form>';
                    }
                } else {
                    echo "Error fetching data: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>
            <!--end of content-->
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
