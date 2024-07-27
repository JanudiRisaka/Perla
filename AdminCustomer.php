<?php
require 'config.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: LoginProcess.php");
    exit();
}

// Function to get customer details by userID
function getCustomerDetails($conn, $userID) {
    $query = "SELECT * FROM tbluser WHERE userID = '$userID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching customer details: " . mysqli_error($conn);
        return false;
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
            body {
                background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
                width:100%;
                min-height:529px;
            }
            .search, .outsideForm {
                height: 100%;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .searchInside {
                font-size:17px;
                background-color: white;
                text-align: center;
                padding: 20px;
                border-radius: 5px;
            }
            .searchInside form {
                display: inline-block;
                margin: 10px; /* Adjust the margin as needed for spacing */
            }
            .searchInside input {
                display: inline-block;
                margin-top: 5px; /* Add a top margin of 5px */
                margin-bottom: 10px; /* Adjust the margin as needed for spacing */
            }
            input[type=text], select {
                padding:5px;
                border: 1px solid #dddddd;
                border-radius: 5px;
                outline: none;
                font-size: 17px;
            }
            .outsideForm {
                background-color: white;
                margin:50px 450px 0 450px;
                font-size:17px;
                text-align: center;
                padding: 20px;
                border-radius: 5px;
                
            }
            .insideForm1 {
                background-color: white;
                font-size:17px;
                text-align: center;
                padding: 20px;
                border-radius: 5px;
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
        <div class="search">
            <div class="searchInside">
                <form method="post" action="">
                    <label for="userID">Enter User ID:</label>
                    <input type="text" name="userID" required>
                    <input type="submit" name="search" value="Search">
                </form><br>
            </div><br>
        </div>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
            $userID = $_POST['userID'];

            // Get customer details
            $customerDetails = getCustomerDetails($conn, $userID);

            if ($customerDetails) {
                echo "<div class='outsideForm'>";
                echo "<div class='insideForm1'>";
                echo "<div class='customer-details'>";
                echo "<h4 class='h4text'>Customer Details</h4>";
                echo "<p>User ID: " . $customerDetails['userID'] . "</p>";
                echo "<p>Full Name: " . $customerDetails['fullName'] . "</p>";
                echo "<p>Email: " . $customerDetails['email'] . "</p>";
                echo "<p>Phone Number: " . $customerDetails['phoneNumber'] . "</p>";
                echo "<p>Area: " . $customerDetails['area'] . "</p>";
                echo "<p>District: " . $customerDetails['district'] . "</p>";
                echo "<p>Province: " . $customerDetails['province'] . "</p>";
                echo "</div>";
                echo "<div class='status-update-form'>";
                echo "<form method='post' action=''>";

                echo "<label for='status'>Current Status:</label>";
                echo "<span>" . $customerDetails['status'] . "</span><br>";

                echo "<label for='newStatus'>Update Status:</label>";
                echo "<select name='newStatus' id='newStatus'>";
                echo "<option value='active'>Active</option>";
                echo "<option value='inactive'>Inactive</option>";
                echo "</select><br>";

                echo "<input type='hidden' name='userID' value='" . $userID . "'>";
                echo "<input type='submit' name='updateStatus' value='Update Status'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "No customer found with the provided User ID.";
            }
        }
        // Check if the update status form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateStatus'])) {
            $newStatus = isset($_POST['newStatus']) ? $_POST['newStatus'] : '';
            $userID = isset($_POST['userID']) ? $_POST['userID'] : '';

            // Update customer status using prepared statement
            $updateQuery = $conn->prepare("UPDATE tbluser SET status = ? WHERE userID = ?");
            $updateQuery->bind_param("si", $newStatus, $userID);

            // Execute the prepared statement
            if ($updateQuery->execute()) {
                echo '<script>alert("Customer status updated successfully!")</script>';
            } else {
                echo "Error updating customer status: " . $updateQuery->error;
            }

            // Close the prepared statement
            $updateQuery->close();
        }
        ?>
    </body>
</html>