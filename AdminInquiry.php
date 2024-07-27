<?php
require 'config.php';
session_start();
ob_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
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
            h2 {text-align:center;margin:0 0 30px 0;padding-top:10px;font-size:29px;}
            .product-table {
                font-family: arial, sans-serif;
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 90%;
                border-radius:8px;
                background-color: white;
            }
            .product-table th {
                text-align: center;
                padding: 10px;
                background-color: white;
            }
            button[type=text], select {
            }
            button[type=submit], input[type=submit]{
                text-decoration: none;
                color: #ffffff;
                font-size: 15px;
                border: 1px solid #cc5500;
                background-color: #cc5500;
                padding: 5px;
                border-radius: 5px;
                float:right;
                margin:20px;
            }
            button[type=submit]:hover, input[type=submit]:hover{
                opacity: 0.8;
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
        <h2>Inquiry Details</h2>
        <?php
            $query = "SELECT * FROM tblfaq";
            $result = mysqli_query($conn, $query);

            // Delete product
            if (isset($_POST['delete'])) {
                $faqID = $_POST['deleteid']; // Corrected variable name
                $deleteQuery = "DELETE FROM tblfaq WHERE faqID = '$faqID'";
                mysqli_query($conn, $deleteQuery);
            }

            // Handle the form submission to update replied status
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateReplied'])) {
                if (isset($_POST['replied']) && is_array($_POST['replied'])) {
                    foreach ($_POST['replied'] as $faqID) {
                        $updateQuery = "UPDATE tblfaq SET replied = 1 WHERE faqID = " . intval($faqID);
                        mysqli_query($conn, $updateQuery);
                    }
                } else {
                    echo "<script>alert('No inquiries selected');</script>";
                }
            }

            // Display inquiries in a table
            echo '<form action="" method="post">';
            echo '<table class="product-table" id="admintables">';
            echo '<tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Comment</th>
                    <th>Replied</th>
                    <th>Actions</th>
                </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['telephone'] . '</td>';
                echo '<td>' . $row['comment'] . '</td>';
                echo '<td><input type="checkbox" name="replied[]" value="' . $row['faqID'] . '" ' . ($row['replied'] ? 'checked' : '') . '></td>';
                echo '<td><input type="hidden" name="deleteid" value="' . $row['faqID'] . '"><button type="submit" name="delete">Delete</button></td>'; // Corrected variable name
                echo '</tr>';
            }

            echo '</table>';
            echo '<input type="submit" name="updateReplied" value="Update Replied Status">';
            echo '</form>';
            ob_end_flush();
        ?>
    </body>
</html>