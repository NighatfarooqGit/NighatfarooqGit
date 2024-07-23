<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout '])) {
    $userId = 1; // Example user ID, replace with actual logged-in user ID

    // Clear the cart for the current user (assuming the order is processed)
    $sql_clear_cart = "DELETE FROM `cart` WHERE `uid` = ?";
    $stmt_clear_cart = $conn->prepare($sql_clear_cart);
    $stmt_clear_cart->bind_param("i", $userId);
    $stmt_clear_cart->execute();
    $stmt_clear_cart->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Order Placed Successfully!</h1>
    <p>Thank you for your order.</p>
    <a href="havelihome.php">Go to Home</a>
</body>
</html>
