<?php
include "db.php";

// Fetch all items from the cart for the current user
$userId = 1; // Example user ID, replace with actual logged-in user ID
$sql_cart = "SELECT * FROM `cart` WHERE `uid` = ?";
$stmt_cart = $conn->prepare($sql_cart);
$stmt_cart->bind_param("i", $userId);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

$cart_items = [];
$totalPrice = 0; // Initialize total price variable

while ($row = $result_cart->fetch_assoc()) {
    $cart_items[] = $row;
    $totalPrice += $row['mprice'] * $row['mquantity']; // Calculate the total price for this item
}

// Update the total bill in the cart table
$sql_update_total = "UPDATE `cart` SET `totalbill` = ? WHERE `uid` = ?";
$stmt_update_total = $conn->prepare($sql_update_total);
$stmt_update_total->bind_param("di", $totalPrice, $userId);
$stmt_update_total->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="webstyle.css" />
    <style>
        header {
            display: flex;
            align-items: center;
        }
        nav {
            background-color: orange;
            padding: 4px;
            margin: 7px;
        }
        .cart-icon {
            position: relative;
            padding-left: 450px;
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
        
        .table {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
        }
        td img {
            flex: 1;
            margin-right: 50px;
            margin-left: 5px;
            width: 100%;
            max-width: 350px;
            border-radius: 5px;
            padding: 5px;
            height: auto;
        }
        td {
            text-align: center;
        }
        .table button {
            padding: 6px;
            margin: 5px;
            background-color: grey;
            color: black;
        }
        .table button:hover {
            background-color: black;
            color: white;
        }
        h1 {
            background-color: orangered;
            font-size: medium;
            font-family: "Courier New", Courier, monospace;
            margin: 20px;
        }
        .logo {
            display: inline-block;
            margin: 10px;
        }
        .social-links {
            display: flex;
            margin: 20px;
        }
        .social-links a {
            margin: 0 5px;
            text-decoration: none;
            color: black;
        }
        .social-links img {
            width: 30px;
            height: 30px;
        }
        .social-links a {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }
        .social-links img {
            width: 25px;
            height: 25px;
        }
        body {
            position: relative;
            overflow-y: scroll;
        }
        img {
            border-radius: 3px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .foot {
            background-color: orange;
            text-align: left;
        }
        img {
            border-radius: 3px;
            border-radius: 50%;
            margin-right: 10px;
        }
        h3 {
            text-align: center;
            color: orange;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="logo.png" width="70" height="70" />
    </div>
    <h1>Haveli Restaurant</h1>
    <div class="social-links">
        <a href="https://www.amazon.in/Clothing-Accessories-Borcelle/s?rh=n%3A1571271031%2Cp_4%3ABorcelle" target="_blank">
            Instagram<img src="instagram-logo.jpg" alt="Instagram" />
        </a>
        <a href="https://www.facebook.com/p/Borcelle-Fashion-100083220967504/" target="_blank">
            Facebook<img src="facebook-logo.png" alt="Facebook" />
        </a>
        <a href="https://www.instagram.com/borcelle_.fashion/" target="_blank">
            Whatsapp<img src="Whatsapp-logo.jpg" alt="Whatsapp" />
        </a>
    </div>
</header>
<nav>
    <ul style="display: inline; text-decoration-style: none; margin: 30px">
        <li style="display: inline"><a href="starters.php" target="_blank">Starters </a></li>
        <li style="display: inline"><a href="burgers.php" target="_blank">Burgers</a></li>
        <li style="display: inline"><a href="pizzas.php">Pizzas</a></li>
        <li style="display: inline"><a href="pastas.php">Pasta</a></li>
        <li style="display: inline"><a href="menu.php" target="_blank">New Menu </a></li>
        <li style="display: inline"><a href="havelihome.php">Home</a></li>
        <li style="display: inline"><a href="contactus.php" target="_blank">Contact Us </a></li>
        <li class="cart-icon">
            <a href="cart.php" target="_blank">
                <img src="cart-icon.png" alt="Cart Icon" />
            </a>
        </li>
    </ul>
</nav>
<main>
    <section>
        <h1>Cart</h1>
        <div class="cart-items">
            <?php if (empty($cart_items)) : ?>
                <p>Your cart is empty.</p>
            <?php else : ?>
                <table>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($cart_items as $item) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['mname']); ?></td>
                            <td><?php echo $item['mquantity']; ?></td>
                            <td>PKR <?php echo $item['mprice'] * $item['mquantity']; ?></td>
                            <td><img src="images/<?php echo htmlspecialchars($item['mimage']); ?>" alt="<?php echo htmlspecialchars($item['mname']); ?>" style="width: 100px; height: 100px;"></td>
                            <td>
                                <form method="post" action="cart_actions.php">
                                    <input type="hidden" name="cartid" value="<?php echo $item['cartid']; ?>">
                                    <button type="submit" name="action" value="remove">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total: PKR <?php echo $totalPrice; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div>
                    <form method="post" action="checkout.php">
                        <button style="margin:5px" type="submit" name="checkout">Checkout</button>
                    </form>
                    <form method="get" action="newmenu.php">
                        <button style="margin:5px" type="submit">Add More Items</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
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
