<?php
    require 'config.php';
    session_start();
?>
<!--Perla home page-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perla</title>
    <!--Add CSS files-->
    
 <script src="../homeheader.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <!--Add icons-->
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
        if (isset($_SESSION['user_email'])) {
            echo '<a href="Cart.php"><i class="fa-solid fa-cart-shopping fa-flip-horizontal" style="font-size:25px"></i></a>';
            echo '<a href="Profile.php"><i class="fas fa-user-alt" style="font-size:25px"></i></a>';
        } else {
            echo '<a href="LoginProcess.php">LOG IN / SIGN UP</a>';
        }
        ?>
    </div>

 </div>
 <!--End of Header Section-->
    <!--Begins of Content Section-->
    <div class = "content">
        <div class="intro">
            <div class="mySlides" id="mySlides">
                <img src="images/img8.png" width="100%">
            </div>
            <div class="mySlides">
                <img src="images/LOVE PEARLS.png" width="100%">
            </div>
            <div class="mySlides">
                <img src="images/LOVE PEARLS (1).png" width="100%">
            </div>
        </div><br>        
        <div class="subhead">
            <h2>Pearl Jewellery</h2>
        </div>
        <div class="product" style="background-image: url('images/homeimage2.png');background-repeat: no-repeat;background-size: cover;">
        <?php

            $query = "SELECT * FROM tblproduct WHERE category = 'Necklace' LIMIT 3";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<div class="product" style="background-image: url(\'images/homeimage2.png\');background-repeat: no-repeat;background-size: cover;">';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product1">';
                    echo '<img src="images/' . $row['image'] . '" style="width: 350px; margin-top: 10%;">';
                    echo '<div class="view"> ';
                    echo '<p><a href="ProductDetails.php?id=' . $row['productID'] . '">VIEW DETAILS</a></p>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '</div>';
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }
        ?>

        </div>
        <div class="intro-section" style="background-image: url('images/3.png'); background-repeat: no-repeat;background-size: cover;">
            <div class="imageright">
                <img src="images/img15.webp" alt="Image">
            </div>
            <div class="textleft">
                <h1>Effortless Elegance with Pearl Jewelry</h1>
                <p>Delight in sophistication with our exquisite new collection. Discover timeless elegance and elevate your wardrobe.</p>
                <div class="view"> 
                    <p><a href="Products.php">VIEW DETAILS</a></p>
                </div>
            </div>
        </div>
        <div class="subhead">
            <h2>PASSIONOIR 2023</h2>
        </div>
        <div class="product" style="background-image: url('images/Always\ with\ you.png');background-repeat: no-repeat;background-size: cover;">
            <?php
                $query = "SELECT * FROM tblproduct WHERE category = 'Passionoir' LIMIT 3";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<div class="product" style="background-image: url("images/Always\ with\ you.png"); background-repeat: no-repeat;background-size: cover;">';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="product1">';
                        echo '<img src="images/' . $row['image'] . '" style="width: 350px; margin-top: 10%;">';
                        echo '<div class="view"> ';
                        echo '<p><a href="ProductDetails.php?id=' . $row['productID'] . '">VIEW DETAILS</a></p>';
                        echo '</div>';
                        echo '</div>';
                    }

                    echo '</div>';
                } else {
                    echo "Error fetching data: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            ?>
        </div>
        <div class="intro-section" style="background-image: url('images/4.png');background-repeat: no-repeat;background-size: cover;">
            <div class="imageright">
                <img src="images/image11.jpg" alt="image">
            </div>
            <div class="textleft">
                <h3>High Jewellery Collection</h3>
                <h1>Praise to the Sea</h1>
                <p>Delight in sophistication with our exquisite new collection. Discover timeless elegance and elevate your wardrobe.</p>
                <div class="view"> 
                    <p><a href="Products.php" >VIEW DETAILS</a></p>
                </div>
            </div>
        </div>
        <div class="intro">
            <img src="images/Always with you (1).png"; style="width: 100%;">
        </div>
    </div>
    <!--End Of Content Section--> 
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
    <!--Add js-->
    <script src="js/homeheader.js" type="text/javascript"></script>
</body>
</html>
