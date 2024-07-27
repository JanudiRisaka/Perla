<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to add a new product
    $newName = $_POST['new_name'];
    $newCategory = $_POST['new_category'];
    $newPrice = $_POST['new_price'];
    $newQuantity = $_POST['new_quantity'];
    $newPearlType = $_POST['new_pearlType'];
    $newMetalType = $_POST['new_metalType'];
    $newChainLength = $_POST['new_chainLength'];
    $newPearlSize = $_POST['new_pearlSize'];
    $newImage = $_FILES["new_image"]["name"];
    $tempname = $_FILES["new_image"]["tmp_name"];
    $folder = "./images/" . $newImage;

    // Insert new product into tblproduct
    $insertProductQuery = $conn->prepare("INSERT INTO tblproduct (name, category, price, quantity, pearlType, metalType, chainLength, pearlSize, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertProductQuery->bind_param("sssssssss", $newName, $newCategory, $newPrice, $newQuantity, $newPearlType, $newMetalType, $newChainLength, $newPearlSize, $newImage);

    if ($insertProductQuery->execute()) {
        // Retrieve the newly inserted product's ID
        $newProductID = $conn->insert_id;

       
    } 

    $insertProductQuery->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perla</title>

        <!--To add CSS file-->
        <link rel="stylesheet" href="css/admin.css">
        <style>
            body {
                background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            }
            h2 {
                text-align:center;
                margin:0 0 30px 0;
                padding-top:10px;
                font-size:29px;}
            form {
                background-color: white;
                width: 370px;
                margin:0 auto;
                padding: 15px;
                margin-bottom: 120px;
                font-size:18px;
                margin-top:20px;
                font-family: arial, sans-serif;
                border-radius:8px;
            }
            input[type="text"], select {
                margin:5px;
                padding: 5px;
                border-radius: 10px;
                font-size:15px;
                border:1px solid #cc5500;
            }
            input[type="submit"] {
                text-decoration: none;
                color: #ffffff;
                font-size: 15px;
                border: 1px solid #cc5500;
                background-color: #cc5500;
                border-radius: 5px;
                font-size:16px;
                padding:5px 10px;
                margin-right:110px;
            }
            input[type="submit"]:hover {
                opacity: 0.8;
            }
            h2 {
                text-align:center;
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
                <a href="AdminInquiry.php">Inquiry</a>
                <a href="AdminOrder.php">Order</a>
                <a href="AdminProfile.php">Profile</a>
            </div>
        </div>  
         <!--Header section ENDS-->
        <div class="outform">
            <h2>Add a product</h2>
            <!-- Display the "Add Product" form -->
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="new_name">Name:</label></td>
                        <td><input type="text" id="new_name" name="new_name" required></td>
                    </tr>
                    <tr>
                        <td><label for="new_category">Category:</label></td>
                        <td>
                            <select id="new_category" name="new_category">
                                <option value="Necklace">Necklace</option>
                                <option value="Earring">Earring</option>
                                <option value="Ring">Ring</option>
                                <option value="Bracelet">Bracelet</option>
                                <option value="Passionoir">Passionoir</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="new_price">Price:</label></td>
                        <td><input type="text" id="new_price" name="new_price" required></td>
                    </tr>
                    <tr>
                        <td><label for="new_quantity">Quantity:</label></td>
                        <td><input type="text" id="new_quantity" name="new_quantity" required></td>
                    </tr>
                    <tr>
                        <td><label for="new_pearlType">Pearl Type:</label></td>
                        <td><input type="text" id="new_pearlType" name="new_pearlType"></td>
                    </tr>
                    <tr>
                        <td><label for="new_metalType">Metal Type:</label></td>
                        <td><input type="text" id="new_metalType" name="new_metalType"></td>
                    </tr>
                    <tr>
                        <td><label for="new_chainLength">Chain Length:</label></td>
                        <td><input type="text" id="new_chainLength" name="new_chainLength"></td>
                    </tr>
                    <tr>
                        <td><label for="new_pearlSize">Pearl Size:</label></td>
                        <td><input type="text" id="new_pearlSize" name="new_pearlSize"></td>
                    </tr>
                    <tr>
                        <td><label for="new_image">Image:</label></td>
                        <td><input type="file" id="new_image" name="new_image" accept="image/*" required><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Add Product"></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
</html>