
<?php
require 'config.php';
session_start();
ob_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}
// Update record if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $productID = $_POST['productID'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $pearlType = $_POST['pearlType'];
    $metalType = $_POST['metalType'];
    $chainLength = $_POST['chainLength'];
    $pearlSize = $_POST['pearlSize'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./images/" . $image;

    // Use prepared statement to prevent SQL injection
    $updateQuery = mysqli_prepare($conn, "UPDATE tblproduct SET name=?, category=?, price=?, quantity=?, pearlType=?, metalType=?, chainLength=?, pearlSize=?, image=? WHERE productID=?");
   
    // Bind parameters
    mysqli_stmt_bind_param($updateQuery, "ssdississi", $name, $category, $price, $quantity, $pearlType, $metalType, $chainLength, $pearlSize, $image, $productID);
    // Execute the prepared statement
    if (mysqli_stmt_execute($updateQuery)) {
        echo "<script>alert('Updated successfully');</script>";
        header('Location: AdminProductUpdate.php');
        exit();
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
    }

    // Close the prepared statement
    mysqli_stmt_close($updateQuery);
}

// Fetch data from the database
$query = "SELECT * FROM tblproduct";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
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
        input[type=submit], table a, input[type=file] {
            text-decoration: none;
            color: #ffffff;
            font-size: 15px;
            border: 1px solid #cc5500;
            background-color: #cc5500;
            padding: 5px;
            border-radius: 5px;
            display: inline-block; 
        }
        input[type=submit]:hover, table a:hover, .add:hover {
            opacity: 0.8;
        }
        input[type=text], select, input[type=file] {
            border: 1px solid white;
            width: 100%; 
            box-sizing: border-box; 
        }
        .product-table img {
            width: auto;
            height: auto;
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
        <h2>Update Product</h2>
        <?php
echo '<form method="post" action="" enctype="multipart/form-data">';
echo '<table class="product-table" id="admintables">';
echo '<tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Pearl Type</th>
        <th>Metal Type</th>
        <th>Chain Length</th>
        <th>Pearl Size</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<form method="post" action="" enctype="multipart/form-data">';
    echo '<td>' . $row['productID'] . '<input type="hidden" name="productID" value="' . $row['productID'] . '"></td>';
    echo '<td><input type="text" name="name" value="' . $row['name'] . '"></td>';
    echo '<td>';
    echo '<select name="category">';
    $categories = ["Necklace", "Earring", "Ring", "Bracelet", "Passionoir"];
    
    foreach ($categories as $category) {
        $selected = ($row["category"] == $category) ? "selected" : "";
        echo '<option value="' . $category . '" ' . $selected . '>' . $category . '</option>';
    }
    echo '</select>';
    echo '</td>';
    echo '<td><input type="text" name="price" value="' . $row['price'] . '"></td>';
    echo '<td><input type="text" name="quantity" value="' . $row['quantity'] . '"></td>';
    echo '<td><input type="text" name="pearlType" value="' . $row['pearlType'] . '"></td>';
    echo '<td><input type="text" name="metalType" value="' . $row['metalType'] . '"></td>';
    echo '<td><input type="text" name="chainLength" value="' . $row['chainLength'] . '"></td>';
    echo '<td><input type="text" name="pearlSize" value="' . $row['pearlSize'] . '"></td>';
    echo '<td><img src="./images/' . $row['image'] . '" style="width:80px;"><br><input type="file" name="image"></td>';
    echo '<td><input type="submit" name="update" value="update"></td>';
    echo '</form>';
    echo '</tr>';
}

echo '</table>';
echo '</form>';
ob_end_flush();
mysqli_close($conn);
?>

    </body>
</html>