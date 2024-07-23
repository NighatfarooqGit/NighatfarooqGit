<?php
include "db.php";

// Fetch categories from the productcategory table
$categoryQuery = "SELECT cid, cname FROM productcategory";
$categoryResult = $conn->query($categoryQuery);

// Check if query was successful
if (!$categoryResult) {
    die("Error fetching categories: " . $conn->error);
}
?>
