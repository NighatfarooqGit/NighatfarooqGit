<?php
include "db.php";

$userId = 1; // Use the actual logged-in user ID

// Fetch cart items
$cartQuery = "SELECT mname, mprice, mquantity, msize, mimage FROM cart WHERE uid = ?";
$cartStmt = $conn->prepare($cartQuery);
$cartStmt->bind_param("i", $userId);
$cartStmt->execute();
$cartResult = $cartStmt->get_result();
$cartItems = $cartResult->fetch_all(MYSQLI_ASSOC);

// Calculate total bill
$totalBill = 0;
foreach ($cartItems as $item) {
    $totalBill += $item['mprice'] * $item['mquantity'];
}

// Handle checkout form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $contactNo = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';

    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Validate the form data
    if (!empty($fullName) && !empty($contactNo) && !empty($address) && !empty($email)) {
        // Save order to the database
        $sql = "INSERT INTO `orders` (full_name, contact_no, address, email, uid, total_bill) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $fullName, $contactNo, $address, $email, $userId, $totalBill);

        if ($stmt->execute()) {
            // Clear the cart after successful order
            $clearCartQuery = "DELETE FROM cart WHERE uid = ?";
            $clearCartStmt = $conn->prepare($clearCartQuery);
            $clearCartStmt->bind_param("i", $userId);
            $clearCartStmt->execute();

            // Redirect to the success page
            header("Location: checkout_complete.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="webstyle.css">
    <style>
        /* Add your CSS styles here */
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #ff4500;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        nav {
            background-color: #ff4500;
            padding: 5px;
            margin: 7px;
            text-align: center;
        }
        nav ul {
            display: inline;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        .logo img {
            width: 70px;
            height: 70px;
        }
        .social-links {
            display: flex;
            margin: 20px;
        }
        .social-links a {
            margin-left: 10px;
            text-decoration: none;
            color: black;
        }
        .social-links img {
            width: 25px;
            height: 25px;
        }
        .cart-icon {
            position: relative;
            display: inline-block;
            margin-left: auto;
            margin-right: 20px;
            width: 50px;
            height: 50px;
        }
        .cart-icon img {
            width: 25px;
            height: 25px;
        }
        .cart-items {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
        }
        .cart-items h3 {
            text-align: center;
            color: orange;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f8f8f8;
        }
        td img {
            width: 50px;
            height: 50px;
            border-radius: 3px;
        }
        form {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: orangered;
        }
        footer {
            background-color: #ff4500;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <h1>Haveli Restaurant</h1>
        <div class="social-links">
            <a href="https://www.instagram.com/borcelle_.fashion/" target="_blank">
                <img src="instagram-logo.jpg" alt="Instagram">
                Instagram
            </a>
            <a href="https://www.facebook.com/p/Borcelle-Fashion-100083220967504/" target="_blank">
                <img src="facebook-logo.png" alt="Facebook">
                Facebook
            </a>
            <a href="https://www.amazon.in/Clothing-Accessories-Borcelle/s?rh=n%3A1571271031%2Cp_4%3ABorcelle" target="_blank">
                <img src="Whatsapp-logo.jpg" alt="Whatsapp">
                Whatsapp
            </a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="starters.php" target="_blank">Starters</a></li>
            <li><a href="burgers.php" target="_blank">Burgers</a></li>
            <li><a href="pizzas.php">Pizzas</a></li>
            <li><a href="pastas.php">Pasta</a></li>
            <li><a href="newmenu.php" target="_blank">New Menu</a></li>
            <li><a href="havelihome.php">Home</a></li>
            <li><a href="contactus.php" target="_blank">Contact Us</a></li>
            <li class="cart-icon">
                <a href="cart.php" target="_blank">
                    <img src="cart-icon.png" alt="Cart Icon">
                </a>
            </li>
        </ul>
    </nav>
    <div class="cart-items">
        <h3>Your Cart</h3>
        <table>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['mname']); ?></td>
                <td><?php echo htmlspecialchars($item['mquantity']); ?></td>
                <td><?php echo htmlspecialchars($item['msize']); ?></td>
                <td><?php echo htmlspecialchars($item['mprice']); ?></td>
                <td><img src="<?php echo htmlspecialchars($item['mimage']); ?>" alt="<?php echo htmlspecialchars($item['mname']); ?>"></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td>Total:</td>
                <td><?php echo $totalBill; ?></td>
            </tr>
        </table>
    </div>
    <form method="post" action="checkout.php">
        <h2>Checkout Information</h2>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <label for="contact_no">Contact No:</label>
<input type="text" id="contact_no" name="contact_no" required>

        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit" name="checkout">Complete Checkout</button>
    </form>
    <footer class="foot">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <img src="delivery.png" alt="Delivery" style="margin-left: 50px;" />
        <p style="margin: 150px;">
            <strong>We Guarantee Fast Delivery</strong><br>
            <br><strong>Karachi Location:</strong><br>
            Plot no 34c, Muslim commercial, street no 1, phase 6 DHA<br>
            <br><strong>Islamabad Location:</strong><br>
            Beverly Center Islamabad, Pakistan Islamabad Punjab 44000<br>
            <br><strong>Rawalpindi Location:</strong><br>
            Intellextual village spring north, bahria town phase vii<br>
            <br><b>FOR CUSTOMER SERVICES:</b><br>
            11:00 AM TO 11:00 PM<br>
            (MONDAY TO SATURDAY)<br>
            <br><b>Contact Us From anywhere in Pakistan:</b><br>
            Call/WhatsApp: (+92) 348 1112234<br>
            Email: haveliresturant@gmail.com
        </p>
    </div>
    <p style="text-align: center;">&copy; Haveli - Restaurant Copyright 2020 - Powered By Chikoo<br>Contact us on social media</p>
    <div style="display: flex; align-items: center; justify-content: center;">
        <a href="https://api.whatsapp.com/send?phone=+923481112234" target="_blank" style="display: inline-block; margin-right: 10px;">
            <img src="whatsapp.png" alt="WhatsApp" height="25" width="25" style="vertical-align: middle;" />
        </a>
        <a href="https://web.facebook.com/RepublicWomenswear/?_rdc=1&_rdr" target="_blank" style="display: inline-block; margin-right: 10px;">
            <img src="facebook.png" alt="Facebook" height="25" width="25" style="vertical-align: middle;" />
        </a>
        <a href="https://www.instagram.com/republicwomenswear/" target="_blank" style="display: inline-block;">
            <img src="instagram.png" alt="Instagram" height="25" width="25" style="vertical-align: middle;" />
        </a>
    </div>
</footer>
</body>
</html>
