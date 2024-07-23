<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
        <label for="mname">Name:</label>
        <input type="text" name="mname" required><br>

        <label for="mprice">Price:</label>
        <input type="text" name="mprice" required><br>

        <label for="mdescription">Description:</label><br>
        <textarea name="mdescription" rows="3", cols="20" required></textarea><br>

        <label for="mimage">Image:</label>
        <input type="file" name="mimage" required><br>

        <label for="msize">Size:</label>
        <input type="text" name="msize" required><br>

        <label for="mquantity">Quantity:</label>
        <input type="text" name="mquantity" required><br>

        <label for="cid">Category:</label>
        <select name="cid" required>
            <?php
            include "db.php";
            
            // Fetch categories from the productcategory table
            $categoryQuery = "SELECT cid, cname FROM productcategory";
            $categoryResult = $conn->query($categoryQuery);
            
            // Check if query was successful
            if (!$categoryResult) {
                die("Error fetching categories: " . $conn->error);
            }
            if ($categoryResult->num_rows > 0) {
                while ($categoryRow = $categoryResult->fetch_assoc()) {
                    echo '<option value="' . $categoryRow['cid'] . '">' . $categoryRow['cname'] . ' </option>';
                }
            } else {
                echo '<option value="">No categories available</option>';
            }
            ?>
        </select><br>

        <input type="submit" name="submit" value="Add Product">
    </form>
</body>
<a href="selectaction.php">
<button style="margin: 50px; padding: 10px; align-items: center; color: blue;">
        Go back 
</button>
</a>
</html>
