<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products.html</title>
        
        <!--Add CSS files-->
        <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
        <link rel="stylesheet" type="text/css" href="css/products.css">
        
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
    <!-- Product-Section HTML Code STARTS -->
        <div class="products-container">
        <?php
            require 'config.php';

            // Sanitize and validate the category parameter
            $category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

            $query = "SELECT * FROM tblproduct";

            if ($category) {
                $query .= " WHERE category = '$category'";
            }

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo "<div class='product-image'>";
                echo "<img src='./images/{$row['image']}' alt='{$row['name']}'>";
                echo "<button class='view-details-btn'><a href='ProductDetails.php?productID={$row['productID']}'>View Details</a></button>";
                echo "</div>";
                echo "<div class='product-text'>";
                echo "<p>{$row['name']}</p>";
                echo "<p>Rs.{$row['price']}</p>";
                echo "</div>";
                echo "</div>";
            }

            mysqli_close($conn);
            ?>


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