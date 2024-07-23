<?php
// Database connection
include "db.php";

// Retrieve products from the database
$sql = "SELECT * FROM `menu`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Display products in a table
if ($result->num_rows > 0) {
    echo "<table class='table bootstrap' style='border-collapse: collapse; width: 100%;'>
            <tr>
                <th style='border: 1px solid black;'>ID</th>
                <th style='border: 1px solid black;'>Name</th>
                <th style='border: 1px solid black;'>Price</th>
                <th style='border: 1px solid black;'>Description</th>
                <th style='border: 1px solid black;'>Image</th>
                <th style='border: 1px solid black;'>Size</th>
                <th style='border: 1px solid black;'>Quantity</th>
                <th style='border: 1px solid black;'>Category</th>
                <th style='border: 1px solid black;'>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["mid"]) . "</td>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["mname"]) . "</td>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["mprice"]) . "</td>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["mdescription"]) . "</td>";
        // Display image in an <img> tag
        $image = basename($row["mimage"]);
        echo "<td style='border: 1px solid black;'><img src='images/$image' alt='$image'></td>";
        echo "<td style='border: 1px solid black;'>" . htmlspecialchars($row["msize"]) . "</td>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["mquantity"]) . "</td>
                <td style='border: 1px solid black;'>" . htmlspecialchars($row["cid"]) . "</td>
                <td style='border: 1px solid black;'><a href='updatemenu.php?id=" . htmlspecialchars($row["mid"]) . "' class='btn btn-primary' title='Edit'>
                    Edit</a>&nbsp;<a href='deleteproduct.php?id=" . htmlspecialchars($row["mid"]) . "' class='btn btn-danger' title='Delete'>
                    Delete</a></td> 
              </tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}

// Close the database connection
$conn->close();
?>
<a href="selectaction.php">
<button style="margin: 50px; padding: 10px; align-items: center; color: blue;">
        Go back 
</button>
</a>
