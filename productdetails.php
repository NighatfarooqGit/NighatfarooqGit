<?php
include "db.php";

// Retrieve product details based on product ID passed in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $sql = "SELECT * FROM `menu` WHERE `mid` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'];
    $userId = 1; // Example user ID, replace with actual logged-in user ID

    // Fetch the username from the users table based on the user ID
    $sql_user = "SELECT `uname` FROM `users` WHERE `uid` = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("i", $userId);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();
        $userName = $user['uname'];
    } else {
        echo "User not found.";
        exit;
    }

    if (empty($quantity)) {
        $error_message = "Please enter a quantity.";
    } elseif ($quantity <= 0 || $quantity >= 50) {
        $error_message = "Please enter a quantity between 1 and 49.";
    } else {
        // Insert into cart
$sql = "INSERT INTO `cart` (`uid`, `uname`, `mid`, `mname`, `mquantity`, `mprice`, `cid`, `mimage`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isisisss", $userId, $userName, $product['mid'], $product['mname'], $quantity, $product['mprice'], $product['cid'], $product['mimage']);

if ($stmt->execute()) {
    $success_message = "Added to cart successfully.";
} else {
    $error_message = "Failed to add to cart.";
}

    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($product['mname']); ?> - Product Details</title>
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
            height: 5p0x;
        }
        .cart-icon img {
            width: 25px;
            height: 25px;
        }
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 2px 4px;
            border-radius: 0%;
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
<li style="display: inline"><a href="newmenu.php" target="_blank">New Menu </a></li>
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
        <div class="table">
            <table>
                <tr>
                    <td>
                        <img src="images/<?php echo htmlspecialchars($product['mimage']); ?>" alt="<?php echo htmlspecialchars($product['mname']); ?>">
                    </td>
                    <td>
                        <p><b><?php echo htmlspecialchars($product['mname']); ?><br>From PKR <?php echo htmlspecialchars($product['mprice']); ?></b><br>
                            <br>Shipping 200 all over the City.<br><hr>
                            <br><br>
                            <form method="post" action="">
                                <label for="quantity">Customize Quantity:</label><br>
                                <input style="margin:20px" type="number" id="quantity" name="quantity" required><br>
                                <button style="color: white; background: black; padding: 10px; margin: 10px;">Add to Cart</button>
                            </form>
                            <?php if (isset($error_message)) : ?>
                            <p style="color: red;"><?php echo $error_message; ?></p>
                        <?php endif; ?>
                        <?php if (isset($success_message)) : ?>
                            <p style="color: green;"><?php echo $success_message; ?></p>
                        <?php endif; ?>
                        <br>Local delivery: <br>
                        34 to 45 minutes <br>
                    </p> 
                    <hr>
                </td>
                
            </tr>
        </table>
    </div>
</section>
<h4 style="text-align: center; color:grey">Product Details:</h4>
<p style="text-align: center; color:grey">
    <?php echo htmlspecialchars($product['mdescription']); ?><br>
    Quantity: <?php echo htmlspecialchars($product['mquantity']); ?><br>
</p>
</main>
<hr>
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
            Email: havelirestaurant@gmail.com
        </p>
    </div>
    <p style="text-align: center;">&copy;Haveli - Restaurant Copyright 2020 - Powered By Chikoo<br> Contact us on social media</p>
    <div style="display: flex; align-items: center; justify-content: center;">
        <a href="https://api.whatsapp.com/send?phone=+923481112234" target="_blank" style="display: inline-block; margin-right: 10px;">
            <img src="whatsapp.png" alt="WhatsApp" height="25" width="25" style="vertical-align: middle;"></a>
        <a href="https://web.facebook.com/RepublicWomenswear/?_rdc=1&_rdr" target="_blank" style="display: inline-block; margin-right: 10px;">
            <img src="facebook.png" alt="Facebook" height="25" width="25" style="vertical-align: middle;"></a>
        <a href="https://www.instagram.com/republicwomenswear/" target="_blank" style="display: inline-block;">
            <img src="instagram.png" alt="Instagram" height="25" width="25" style="vertical-align: middle;"></a>
    </div>
</footer>
</body>
</html>
