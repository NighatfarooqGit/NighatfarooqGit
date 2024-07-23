<!DOCTYPE html>
<html>
<head>
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
  padding-left : 450px;
  display: inline-block;
  margin-left: auto;
  margin-right: 20px;
  width: 50px;
  height: 5p0x;
}

.cart-icon img{

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

    /* Styles for the slides */
    body {
      position: relative; 
      overflow-y: scroll; /* Remove vertical scrollbar */
    }
    img {
    border-radius: 3px;
    border-radius: 50%;
    margin-right: 10px;
}
    
.foot {
      background-color:orange;
      text-align: left;
    }
    .dresses {
    display: flex; /* Use flexbox for layout */
    flex-wrap: wrap; /* Allow items to wrap to the next line */
   position: relative;
}

.dresses .row {
    display: flex; /* Use flexbox for layout within each row */
    width: 100%; 
    justify-content: center;
}

.dresses img {
    flex: 1; 
    margin-left:5px;
    margin-right:5px;
    width: 100%; 
    max-width: 200px; 
    border-radius: 5px;
    padding: 5px; 
}
.dresses figcaption {
    text-align: center; /* Align the text (caption links) in the center */
    margin-top: 5px; /* Add some space between the image and the caption */
}
.dresses a{
  color:palevioletred;
}
h3{
    text-align: center;
    color: orange;
}
</style>
  <title>Haveli|starters</title>
</head>
<body>
<header>
  <div class="logo">
    <img src="logo.png" width="70" height="70" />
  </div>
  <h1>Haveli Resturant</h1>
  <div class="social-links">
    <a href="https://www.amazon.in/Clothing-Accessories-Borcelle/s?rh=n%3A1571271031%2Cp_4%3ABorcelle" 
    target="_blank">Instagram<img src="instagram-logo.jpg" alt="Instagram" /></a>
    <a href="https://www.facebook.com/p/Borcelle-Fashion-100083220967504/" 
    target="_blank">Facebook<img src="facebook-logo.png" alt="Facebook" /></a>
    <a href="https://www.instagram.com/borcelle_.fashion/" 
    target="_blank">Whatsapp<img src="Whatsapp-logo.jpg" alt="Whatsapp" /></a>
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
      <span class="cart-count">0</span>
    </li>
  </ul>
</nav>
<main>
    <h3>
        Happy Meal
    </h3>
<hr>
  <section style="background-color: aliceblue;">
    <div class="dresses">
        <div class="row">
            <figure>
                <a href="flamingwings.php"><img src="flamingwings.png" alt="Flaming Wings"></a>
                <figcaption>
                    <a href="flamingwings.php">Flaming Wings<br> PKR 800</a>
                </figcaption>
            </figure>
            <figure>
                <a href="beharirolls.php"><img src="behariroll.png" alt="Behari Roll"></a>
                <figcaption>
                    <a href="beharirolls.php">Behari Roll<br> PKR 1200 </a>
                </figcaption>
            </figure>
            <figure>
                <a href="arabicrolls.php"><img src="arabic roll.png" alt="Arabic Roll"></a>
                <figcaption>
                    <a href="arabicrolls.php">Arabic Roll <br>  PKR 1800 </a>
                </figcaption>
            </figure>
           
        </div>
        
        



        
    </div>
</section>
</main>
<hr>
<footer class="foot">
  <div style="display: flex; align-items: center; justify-content: space-between;">
    <img src="delivery.png" alt="Delivery" style=" margin-left: 50px;"/>
    
    <p style="margin: 150px;"><strong> We Guarantee Fast Delivery </strong><br>
      <br><strong>Karachi Location:</strong><br>
      <br>Plot no 34c, Muslim commercial, street no 1, phase 6 DHA<br>
      <br><strong>Islamabad Location:</strong><br>
      <br>Beverly Center Islamabad,Pakistan Islamabad Punjab 44000<br>
      <br><strong>Rawalpindi Location:</strong><br>
      <br>Intellextual village spring north, bahria town phase vii<br>
      <br><b>FOR CUSTOMER SERVICES:</b><br> 
      <br>11:00 AM TO 11:00 PM<br>
      (MONDAY TO SATURDAY)<br>

      <br><b>Contact Us From anywhere in Pakistan:</b><br>
      <br>Call/WhatsApp: (+92) 348 1112234<br>
      Email: haveliresturant@gmail.com</p>
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
