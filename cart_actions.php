<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartid = $_POST['cartid']; // Use 'cartid' to match the column name in your table
    $action = $_POST['action'];

    if ($action === 'remove') {
        $sql_remove = "DELETE FROM `cart` WHERE `cartid` = ?";
        $stmt_remove = $conn->prepare($sql_remove);
        $stmt_remove->bind_param("i", $cartid); // Use 'cartid' for binding
        $stmt_remove->execute();
        $stmt_remove->close();
    }
}

header("Location: cart.php");
exit;
?>
