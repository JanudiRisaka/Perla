<?php
session_start();
require 'config.php';
ob_start();
// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to the login page if not logged in
    header('Location: Login.html');
    exit();
}

// Fetch user data
$user_email = $_SESSION['user_email'];

$query = "SELECT * FROM tbluser WHERE email = '$user_email'";
$result = mysqli_query($conn, $query);

// Fetch the user data
$tbluser = mysqli_fetch_assoc($result);

// Initialize total price
$totalPrice = 0;

?>
<!--Perla home page-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perla</title>
    <!--Add CSS files-->
    <link rel="stylesheet" type="text/css" href="css/Header&Footer.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
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
        // Check if the user is logged in
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
    <div class="cartProfile" style="background-image: url('images/homeimage2.png'); background-repeat: no-repeat;background-size: cover;">
        <div class="row">
            <div class="col-75">
                <div class="container-checkout">
                    <form action="Cart.php" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname">Full Name</label>
                                <input type="text" id="fname" name="firstname" value="<?php echo $tbluser['fullName']; ?>" readonly>
                                
                                <label for="area">Area</label>
                                <input type="text" id="area" name="address" value="<?php echo $tbluser['area']; ?>"readonly>
                                
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" value="<?php echo $tbluser['district']; ?>"readonly>
                                
                                <label for="province">Province</label>
                                <input type="text" id="province" name="province" value="<?php echo $tbluser['province']; ?>"readonly>
                                
                                <label for="phone">Phone number</label>
                                <input type="text" id="phone" name="phone" value="<?php echo $tbluser['phoneNumber']; ?>"readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-25">
                <div class="container">
                <h4>Cart <span class="cart" style="color:black"><i class='fa-solid fa-cart-shopping fa-flip-horizontal' style='font-size:25px'></i></span></h4>
                <?php
                    $uquery = "SELECT userID FROM tbluser WHERE email = '$user_email'";
                    $uresult = mysqli_query($conn, $uquery);
                   
                    if ($uresult) {
                        if (mysqli_num_rows($uresult) > 0) {
                            $row = mysqli_fetch_assoc($uresult);
                            $userID = $row['userID'];
                        } else {
                        echo "Error: No user found with the provided email.";
                        }
                    } else {
                        echo "Error fetching user data: " . mysqli_error($conn);
                    }
                    $query_cart = "SELECT c.*, p.image, p.price FROM tblcart c
                        JOIN tblproduct p ON c.productID = p.productID
                        WHERE c.userID = '$userID'";
                    $result_cart = mysqli_query($conn, $query_cart);
                    
                    if (!$result_cart) {
                        die("Query failed: " . mysqli_error($conn));
                    }
                ?>
                <form method="post" action="Cart.php" id="update-form">
                <?php
                    // Display cart items with product details and an "Update" button
                    while ($row = mysqli_fetch_assoc($result_cart)) {
                        echo '<div class="conbox">';
                        echo '<form method="post" action="Cart.php">';
                        echo '<p>';
                        echo '<a href="ProductDetails.php?productID=' . $row['productID'] . '" class="image-link"><img src="images/' . $row['image'] . '"></a>';
                        echo '<label for="quantity">QTY</label>';
                        echo '<input type="number" class="quantity" name="quantity[' . $row['productID'] . ']" min="1" max="5" value="' . $row['quantity'] . '" data-productid="' . $row['productID'] . '" data-price="' . $row['price'] . '">';
                        echo '<button type="submit" class="clear-cart-btn" name="clear_cart"style="position: absolute;top: 15px;right: 0;border:none;background-color=white; :hover{opacity:0.8;}"><i class="fa-solid fa-x" style="color: #000000;"></i></button>';
                        echo '<span class="prices" style="font-size: 18px; position: absolute; bottom: 94px; right: 0;" id="price_' . $row['productID'] . '">Rs.' . ($row['quantity'] * $row['price']) . '</span>';
                        echo '<button type="submit" style="background-color: #cc5500; color: white; padding: 12px; margin: 10px 0; border: none; width: 100%; border-radius: 20px; cursor: pointer; font-size: 17px;" class="update-btn" name="update_product" value="' . $row['productID'] . '">Update</button>';
                        echo '<input type="hidden" name="product_id" value="' . $row['productID'] . '">';  // Moved the hidden input inside the form
                        echo '</p>';
                        echo '</form>';
                        echo '</div>';
                    }
                    
                    // Handle the removal of a specific product from the cart
                    if (isset($_POST['clear_cart'])) {
                        // Check if a specific product ID is provided in the form
                        if (isset($_POST['product_id'])) {
                            // Sanitize and retrieve the product ID
                            $productID = mysqli_real_escape_string($conn, $_POST['product_id']);
                    
                            // Perform the deletion from tblcart for the specific product
                            $clearCartQuery = "DELETE FROM tblcart WHERE userID = '$userID' AND productID = '$productID'";
                            $clearCartResult = mysqli_query($conn, $clearCartQuery);
                        } 
                    }
                        
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Check if the 'update_product' button is clicked
                        if (isset($_POST['update_product'])) {
                            // Get product ID and new quantity from the form
                            $productID = mysqli_real_escape_string($conn, $_POST['update_product']);
                            $newQuantity = mysqli_real_escape_string($conn, $_POST['quantity'][$productID]);
                            
                            // Validate the new quantity (you may add more validation if needed)
                            if (is_numeric($newQuantity) && $newQuantity > 0 && $newQuantity <= 5) {
                                    // Update quantity in tblcart
                                $updateQuery = "UPDATE tblcart SET quantity = '$newQuantity' WHERE productID = '$productID' AND userID = '$userID'";
                                $updateResult = mysqli_query($conn, $updateQuery);
                            
                                if ($updateResult) {
                                    // Calculate and update the total
                                    $updateTotalQuery = "UPDATE tblcart SET total = quantity * (SELECT price FROM tblproduct WHERE productID = '$productID') WHERE productID = '$productID' AND userID = '$userID'";
                                    $updateTotalResult = mysqli_query($conn, $updateTotalQuery);
                                    
                                    if ($updateTotalResult) {
                                        header('Location: Cart.php');
                                        exit();
                                    } else {
                                        echo "Error updating total: " . mysqli_error($conn);
                                    }
                                } else {
                                    echo "Error updating cart: " . mysqli_error($conn);
                                }
                            }
                        }
                    }
                ?>
                </form>
                <?php
                    // Handle the "Continue to checkout" button
                    if (isset($_POST['checkout'])) {
                        // Insert cart items into tblorder
                        $insertOrderQuery = "INSERT INTO tblorder (userID, productID, quantity, total,status) 
                        SELECT tblcart.userID, tblcart.productID, tblcart.quantity, tblcart.quantity * tblproduct.price, 'pending'
                        FROM tblcart
                        JOIN tblproduct ON tblcart.productID = tblproduct.productID
                        WHERE tblcart.userID = '$userID'";

                        $insertOrderResult = mysqli_query($conn, $insertOrderQuery);

                        if ($insertOrderResult) {
                            // Successfully inserted into tblorder, you can now clear the cart
                            $clearCartQuery = "DELETE FROM tblcart WHERE userID = '$userID'";
                            $clearCartResult = mysqli_query($conn, $clearCartQuery);

                            if ($clearCartResult) {
                                echo '<script>alert("Order placed successfully!");</script>';
                                header('Location: Profile.php'); 
                                exit();
                            } else {
                                echo "Error clearing cart: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Error placing order: " . mysqli_error($conn);
                        }
                    }
                    ob_end_flush();
                    mysqli_close($conn);
                ?>
                <form method="post">
                    <input type="submit" value="Continue to checkout" name="checkout" class="btn">
                </form>    
            </div>
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
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var updateButtons = document.querySelectorAll(".update-btn");

        updateButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var productID = button.getAttribute("data-productid");
                var quantityInput = document.querySelector('[data-productid="'+ productID +'"]');
                var priceElement = document.getElementById("price_" + productID);

                // Update total price
                var price = quantityInput.getAttribute("data-price");
                var totalPrice = quantityInput.value * price;
                priceElement.textContent = "Rs." + totalPrice;

                // Submit the form synchronously
                document.getElementById("update-form").submit();
            });
        });
    });
</script>
