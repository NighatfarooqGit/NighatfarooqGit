<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
include "db.php";

// Debug: Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the productcategory table
$categoryQuery = "SELECT cid, cname FROM productcategory";
$categoryResult = $conn->query($categoryQuery);

// Debug: Check if query was successful
if (!$categoryResult) {
    die("Error fetching categories: " . $conn->error);
}

// Update product
if (isset($_POST['submit'])) {
    $mid = $_POST['mid']; // Product ID
    $mname = $_POST['mname'];
    $mprice = $_POST['mprice'];
    $mdescription = $_POST['mdescription'];
    $msize = $_POST['msize'];
    $mquantity = $_POST['mquantity'];
    $cid = $_POST['cid']; // Category ID from the dropdown

    // Check if a new image was uploaded
    $mimage = $_POST['mimage'];
    if ($_FILES['mimage']['error'] == UPLOAD_ERR_OK) {
        // Check if the file is a valid image file
        $fileType = strtolower(pathinfo($_FILES["mimage"]["name"], PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (!in_array($fileType, $allowedTypes)) {
            echo "Error: Invalid file type.";
            exit;
        }

        // Check if the file does not exceed the maximum file size limit
        $maxFileSize = 5 * 1024 * 1024; // 5 MB
        if ($_FILES["mimage"]["size"] > $maxFileSize) {
            echo "Error: File size exceeds the maximum limit.";
            exit;
        }

        // Define the target folder where the uploaded files will be saved
        $target_folder = "images/";

        // Extract only the file name and extension from the uploaded file's temporary name
        $target_file = $target_folder . basename($_FILES["mimage"]["name"]);

        // Move the uploaded file to the target folder
        if (!move_uploaded_file($_FILES["mimage"]["tmp_name"], $target_file)) {
            echo "Error: Failed to move uploaded file.";
            exit;
        }

        // Store only the file name in the database
        $mimage = basename($_FILES["mimage"]["name"]);
    }

    // Update the product in the database
    $stmt = $conn->prepare("UPDATE `menu` SET mname=?, mprice=?, mdescription=?, mimage=?, msize=?, mquantity=?, cid=? WHERE mid=?");
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    $stmt->bind_param("sdssssii", $mname, $mprice, $mdescription, $mimage, $msize, $mquantity, $cid, $mid);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header("Location: viewproducts.php");
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>