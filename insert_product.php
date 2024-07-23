<?php


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

// Insert product
if (isset($_POST['submit'])) {
    $mname = $_POST['mname'];
    $mprice = $_POST['mprice'];
    $mdescription = $_POST['mdescription'];
    $msize = $_POST['msize'];
    $mquantity = $_POST['mquantity'];
    $cid = $_POST['cid']; // Category ID from the dropdown

    // Check if the file upload was successful
    if (isset($_FILES['mimage']) && $_FILES['mimage']['error'] == UPLOAD_ERR_OK) {
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

        // Debug: Check image upload
        echo "Image uploaded successfully: " . $mimage . "<br>";

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO `menu` (mname, mprice, mdescription, mimage, msize, mquantity, cid) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }
        $stmt->bind_param("sdssssi", $mname, $mprice, $mdescription, $mimage, $msize, $mquantity, $cid);

        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "New product added successfully.";
            header("Location: viewproducts.php");
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: No image uploaded or upload error.";
    }
}
?>
