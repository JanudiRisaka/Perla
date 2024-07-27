<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}

// Delete product
if (isset($_POST['delete'])) {
    $productId = $_POST['deleteid'];
    $query = "DELETE FROM tblproduct WHERE productID = '$productId'";
    mysqli_query($conn, $query);
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
            .upper h2 {
                text-align:center !important;
                margin:0 0 30px 0;
                padding-top:10px;
                font-size:29px;
            }
             .product-table {
                font-family: arial, sans-serif;
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 98%;
                border-radius:8px;
                border: 3px solid white;
                background-color: white;
            }
            .product-table th {
                text-align: center;
                padding: 10px;
                border: 1px solid white;
            }
            table a, .add , button[type=submit]{
                font-family: arial, sans-serif;
                text-decoration: none;
                color: #ffffff;
                font-size: 15px;
                border: 1px solid #cc5500;
                background-color: #cc5500;
                display: flex;
                justify-content: space-around;
                border-radius: 5px;
                font-size:16px;
                padding:5px 10px;
                margin:5px;
            }
            .add {
                font-size: 16px;
                border: 1px solid #cc5500;
                background-color: #cc5500;
                border-radius: 5px;
                color: white;
                text-decoration: none;
            }
            .upper {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .upper > div {
                color: white;
                margin: 10px;
                text-align: center;
                line-height: 75px;
                font-size: 30px;
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
         <div class="upper">
            <h2 style="flex-grow: 11">Product Details</h2>
            <a href="AdminProductUpdate.php" class="add" >Update</a>
            <a href="AdminProductAdd.php" class="add">+Add Product</a>
        </div>
        <?php
        $query = "SELECT * FROM tblproduct";
        $result = mysqli_query($conn, $query);

        echo '<table class="product-table" id="admintables">';
        echo '<tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Pearl Type</th>
            <th>Metal Type</th>
            <th>Chain Length</th>
            <th>Pearl Size</th>
            <th>Actions</th>
            </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            $productID = $row['productID'];
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $pearlType = $row['pearlType'];
            $metalType = $row['metalType'];
            $chainLength = $row['chainLength'];
            $pearlSize = $row['pearlSize'];

            echo '<tr>';
            echo '<td>' . $productID . '</td>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $price . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td>' . $pearlType . '</td>';
            echo '<td>' . $metalType . '</td>';
            echo '<td>' . $chainLength . '</td>';
            echo '<td>' . $pearlSize . '</td>';
            echo '<td>
            
            <form method="post" action="AdminProduct.php" style="display:inline;">
                
                <input type="hidden" name="deleteid" value="' . $productID . '">
                <button type="submit" name="delete" >Delete</button>
            </form></td>';
            echo '</tr>';
            }
            echo '</table>';
        
        $conn->close();
    ?>
</body>
</html>
