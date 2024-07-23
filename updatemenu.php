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

// Update product
if (isset($_POST['update'])) {
    $mid = $_POST['mid']; // Product ID
    $mname = $_POST['mname'];
    $mprice = $_POST['mprice'];
    $mdescription = $_POST['mdescription'];
    $msize = $_POST['msize'];
    $mquantity = $_POST['mquantity'];
    $cid = $_POST['cid']; // Category ID from the dropdown

    // Check if a new image was uploaded
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
    $stmt->bind_param("ssssssii", $mname, $mprice, $mdescription, $mimage, $msize, $mquantity, $cid, $mid);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header("Location: viewproducts.php");
        exit; // Make sure to exit after redirection
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mid" value="<?php echo $_GET['id']; ?>">

        <label for="mname">Name:</label><br>
        <input type="text" id="mname" name="mname"><br><br>

        <label for="mprice">Price:</label><br>
        <input type="text" id="mprice" name="mprice"><br><br>

        <label for="mdescription">Description:</label><br>
        <textarea id="mdescription" name="mdescription"></textarea><br><br>

        <label for="mimage">Image:</label><br>
        <input type="file" id="mimage" name="mimage"><br><br>

        <label for="msize">Size:</label><br>
        <input type="text" id="msize" name="msize"><br><br>

        <label for="mquantity">Quantity:</label><br>
        <input type="text" id="mquantity" name="mquantity"><br><br>

        <label for="cid">Category:</label><br>
        <select id="cid" name="cid">
            <?php
            // Populate the dropdown with categories fetched from the database
            while ($row = $categoryResult->fetch_assoc()) {
                echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="update" value="Update Product">
    </form>
    
</body>
</html>
