<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $orderID = $_POST['orderID'];
        $status = $_POST['status'];

        $updateQuery = $conn->prepare("UPDATE tblorder SET status=? WHERE orderID=?");

        if (!$updateQuery) {
            echo "Error in preparing statement: " . $conn->error;
            exit();
        }

        $updateQuery->bind_param("si", $status, $orderID);

        if ($updateQuery->execute()) {
            echo '<script>alert("Delivery status updated successfully");</script>';
        } else {
            echo '<script>alert("Error updating delivery status: ' . $updateQuery->error . '");</script>';
        }

        $updateQuery->close();
    } elseif (isset($_POST['delete'])) {
        $orderID = $_POST['orderID'];

        $deleteQuery = $conn->prepare("DELETE FROM tblorder WHERE orderID=?");

        if (!$deleteQuery) {
            echo "Error in preparing statement: " . $conn->error;
            exit();
        }

        $deleteQuery->bind_param("i", $orderID);

        if ($deleteQuery->execute()) {
            echo '<script>alert("Order deleted successfully");</script>';
        } else {
            echo '<script>alert("Error deleting order: ' . $deleteQuery->error . '");</script>';
        }

        $deleteQuery->close();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perla</title>
        <!--To add CSS file-->
        <link rel="stylesheet" href="css/admin.css">
        <style>
             body {background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);}
             h2 {
                text-align:center !important;
                margin:0 0 30px 0;
                padding-top:10px;
                font-size:29px;
            }
            table {
                font-family: arial, sans-serif;
                display: block;
                margin-left: 300px;
                width: 60%;
                border-radius:8px;
                border: 3px solid white;
                background-color: white;
            }
            .product-table th,td {
                text-align: center;
                padding: 10px;
            }
            input[type=text] {
                text-align:center !important;
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
    <h2>Update Delivery Status</h2>
    <?php
        $queryOrder = "SELECT * FROM tblorder";
        $resultOrder = mysqli_query($conn, $queryOrder);

        echo '<table class="product-table" id="admintables">';
        echo '<tr> 
                <th>Order ID</th>
                <th>Product ID</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>';

        while ($rowOrder = mysqli_fetch_assoc($resultOrder)) {
            echo "<form method='post' action=''>";
            echo "<tr>";
            echo "<td>{$rowOrder['orderID']}<input type='hidden' name='orderID' value='{$rowOrder['orderID']}'></td>";
            echo "<td>{$rowOrder['productID']}</td>";
            echo "<td>{$rowOrder['userID']}</td>";
            echo "<td>{$rowOrder['quantity']}</td>"; // Assuming you have a 'quantity' column
            echo "<td>{$rowOrder['total']}</td>";
            echo "<td><input type='text' name='status' value='{$rowOrder['status']}'></td>";
            echo "<td><input type='submit' name='update' value='Update'></td>";
            echo "<td><input type='submit' name='delete' value='Delete'></td>";
            echo "</tr>";
            echo "</form>";
        }
        echo '</table>';
    ?>
    </body>
</html>
