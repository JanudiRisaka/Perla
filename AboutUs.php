<<!--Perla home page-->
<!DOCTYPE html>
<html>
<head>
    <title>Aboutus</title>
    <!--Add CSS files-->
    <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
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
    <!--Begins of Content-->
    <div class = "content">
        <div class="intro">
            <img src="images/shop.png" width="100%">
            <h2>ABOUT PERLA</h2>
            <p>In 1967, our founder Lillian Linton successfully created the world's first cultured pearls. Ever since then, Perla has been seeking to harness the allure of pearls, translating our hopes and dreams into pearl necklaces for over 130 years.We cut off cost by taking pearls directly from pearl farming origins and return the savings to our valuable buyers. We also design and make quality pearl jewelry by own hands. Thanks to handmade and customizable jewelry, our online store offers a continuous variety of fantastic collections along with limited edition that fit any budget. Whether you're a pearl lover or just searching for a giving away, this is the right place for you. Happy shopping.</p>
        </div><br>
        <div class="intro1">
            <h2>Our pearls</h2>
            <p>The quality of a pearl is determined by several criteria, including its size, shape, colour, and lustre. An important factor to look out for is the thickness of the nacre as this determines the pearl's lustre. Only the Akoya cultured pearls with the highest quality and lustre can be bestowed with the name “Mikimoto Pearl.”</p>
            <h3>The quality of Perla's Pearl</h3>
            <table>
                <tr>
                    <th>Lustre</th>
                    <td>One of the most important things to look for in a pearl is lustre. The lustre of the pearl is affected by the surface quality and the thickness and evenness of the nacre. Typically, the thicker the nacre, the finer the lustre will be on the pearl.</td>
                </tr>
                <tr>
                    <th>Nacre thickness</th>
                    <td>For nucleated pearls, the thickness of the nacre is often a reliable measure of how long each pearl has been cultured, how long it will last, and its quality. Generally, the longer pearls are left to grow, the thicker the nacre.</td>
                </tr>
                <tr>
                    <th>Shape</th>
                    <td>In general, the closer the pearl is to a perfect sphere in shape, the better it is considered to be. However, pearls in various forms are also embraced. For example, baroque pearls are loved because of their irregular and intriguing shape, which gives them a unique charm, and teardrop pearls hang down daintily.</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>Pearl size is a diameter measured in millimeters. Make sure you choose the right size to fit your mood and outfit.</td>
                </tr>
                <tr>
                    <th>Colour</th>
                    <td>Pearls occur naturally in white and cream shades. Pink, white, green, cream, and gold Akoya cultured pearls can be encountered. It is generally considered that the more even the colour, the better quality a pearl is.</td>
                </tr>
            </table>
            <div class="image-container">
                <div class="imgage-item" style="width: 30%;">
                    <img src="images/pearl2.png" alt="image">
                    <p id="pearltext">imgage-itemWhite South Sea cultured pearl</p>
                </div>
                <div class="imgage-item" style="width: 30%;">
                    <img src="images/pearl3.png" alt="Image">
                    <p id="pearltext">Conch pearl</p>
                </div>
                <div class="imgage-item" style="width: 30%;">
                    <img src="images/pearl4.png" alt="Image">
                    <p id="pearltext">Golden South Sea cultured pearl</p>
                </div>
                <div class="imgage-item"style="width: 30%;">
                    <img src="images/pearl5.png" alt="Image">
                    <p id="pearltext">Akoya cultured pearl</p>
                </div>
                <div class="imgage-item"style="width: 30%;">
                    <img src="images/pearl6.png" alt="Image">
                    <p id="pearltext">Golden South Sea cultured pearl</p>
                </div>
            </div>
            
        </div>
        <div class="intro2">
            <h2>Perla's SDG Initiatives</h2>
            <div class="column1">
              <div class="card1">
                <img src="images/ocean0.jpg" alt="image" style="width:100%">
                <div class="container1">
                  <h3>Sustainability</h3>
                  <p>One of our goals is to preserve and protect the ocean and promote coexistence with nature as a prerequisite to producing beautiful pearls. We strive to help the pearl industry improve overall while promoting environmental sustainability.</p>
                </div>
              </div>
            </div>
          
            <div class="column1">
                <div class="card1">
                  <img src="images/ocean2.webp" alt="image" style="width:100%">
                  <div class="container1">
                    <h3>Our social responsibility</h3>
                    <p>We strive to help build a better society where people feel empowered and live fulfilling lives as we protect the environment. Mikimoto is actively involved in creating a more sustainable future through jewellery making.</p>
                  </div>
                </div>
              </div>
            
              <div class="column1">
                <div class="card1">
                  <img src="images/ocean3.webp" alt="image" style="width:100%">
                  <div class="container1">
                    <h3>Social contributions</h3>
                    <p>Perla cooperates with marine research, and also provides support for artistic and cultural activities that enrich people's minds and lifestyles.We are here to enrich people's lives with beautiful jewellery.</p>
                  </div>
                </div>
              </div>
          </div>
    </div>
    <!--End of Content-->
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