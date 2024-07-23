<!DOCTYPE html>
<html>
<head>
  <style>
    header {
    display: flex;
    align-items: center;
}

h1 {
    background-color: orangered;
    font-size: medium;
    font-family:'Montserrat', sans-serif;
    text-align: center;
    flex-grow: 1;
    margin: 0; 
    padding: 20px; 
}


nav{
    background-color: orange;
    padding: 4px;
    margin: 7px;
}
a{
    color:white;
    padding:3px;
    margin:10px;
    text-decoration:none;
    text-align: right;
}
    header {
      display: flex;
      align-items: center;
    }

    h1 {
      text-align: center;
    }
    h2{
      text-align: left;
    }

    .logo {
      margin-left: 20px;
    }

    .social-links {
      display: flex;
      align-items: center;
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
      overflow-y: scroll; /* Remove vertical scrollbar */
    }
    img {
    border-radius: 3px;
    border-radius: 0%;
    margin-right: 10px;
}

.slideshow {
      position: relative;
      height: 100vh; /* Set height of slideshow container to 95% of viewport height */
      width:vw;
      overflow: hidden; /* Hide overflow to prevent scrollbars */
    }

    .slide {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Ensure images cover the entire slide */
      position: absolute;
      opacity: 0;
      transition: opacity 1s;
    }

    /* Show class makes a slide visible */
    .show {
      opacity: 1;
    }

    /* Keyframes for fade-in only, as fade-out is handled by removing .show */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    

    .foot {
      background-color:orange;
      text-align: left;
    }
    
    .SPECIALS {
    display: flex; /* Use flexbox for layout */
    flex-wrap: wrap; /* Allow items to wrap to the next line */
   position: relative;
}

.SPECIALS .row {
    display: flex; /* Use flexbox for layout within each row */
    width: 100%; 
    justify-content: center;
}

.SPECIALS img {
  flex: 1;
  margin-right: 50px;
  margin-left: 50px;
  width: 100%;
  max-width: 400px; /* Change this value to your desired size */
  border-radius: 5px;
  padding: 5px;
  height: auto;
}
.SPECIALS figcaption {
    text-align: center; /* Align the text (caption links) in the center */
    margin-top: 5px; /* Add some space between the image and the caption */
}
.dresses a{
  color:palevioletred;
}
.poc a{
        border: #333;
        border-radius: 3px;
        padding-right: 50px;
        padding-left: 50px;
        padding-top: 10px;
        padding-bottom: 30px;
        margin:5px;
        background-color: rgb(128, 128, 231);
        color: white;

    }
    .poc a:hover{
        color: red;
    }
    .boc {
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      justify-content: center;
    color:white
}
    .poc {
      display: flex;
      flex-direction: column;
    }
    .contact-info {
      margin: 20px;
    }
    .contact-info p {
      margin: 0;
    }
    .contact-info b {
      font-weight: bold;
    }
    button{
        padding-bottom:12px;
        padding-right:10px;
        padding-left:10px;
    }
  </style>
  <title>contact us</title>
</head>

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
<body>

<nav>
   <ul style="display: inline; text-decoration-style: none; margin: 30px">
    <li style="display: inline"><a href="havelihome.php">Home</a></li>
    <li style="display: inline"><a href="Menu.php" target="_blank">Menu</a></li>
    <li style="display: inline"><a href="aboutus.php" target="_blank">About Us</a></li>
    <li style="display: inline"><a href="contactus.php" target="_blank">Contact Us</a></li>
  </ul>
</nav>
  <div class="boc">
 
    <div class="poc">
        
      <div class="contact-info">
        <form action="contactus_action.php" method="POST" style="text-align: left;">
          <label for="name">Full Name:</label><br>
          <input type="text" id="name" name="name" required><br>
          <br><label for="age">Age:</label><br>
          <input type="text" id="age" name="age" required><br>
          <br><label for="phone">Phone:</label><br>
          <input type="tel" id="phone" name="phone"  required>
          <br><p>Choose your Gender:</p>
          
          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label><br>
          <input type="radio" id="male" name="gender" value="male">
          <label for="male">Male</label><br>
          <br><label for="date">Date:</label><br>
          <input type="date" id="date" name="date" placeholder="22-April-2024" ><br>
          <br><label for="city">Your City:</label><br>
          <select name="city" id="city"><br>
            <option value="Select">Select</option><br>
            <option value="isb">Islamabad</option><br>
            <option value="lhr">Lahore</option><br>
            <option value="khi">Karachi</option><br>
          </select><br>
          <br><p> Your Query:</p>
          <textarea name="message" rows="6" cols="50" style="height:50%; width:50%" required></textarea><br>
          <button>
            <br> Submit
          </button>
        </form>
      </div>
    </div>
    <div class="poc">
      <div class="contact-info">
        <p><b>Address of Your Business:</b><br>
        B/C, 1 Mian Mehmood Ali Kasoori Rd, Block B 3 Gulberg III, Lahore</p>
      </div>
      <div class="contact-info">
        <p><b>Google Sitemap:</b><br>
        <br><a href
="https://www.google.com/maps/place/Republic+Womenswear/@31.5072345,74.3525094,17z/data=!3m1!4b1!4m6!3m5!1s0x3919044e18182d97:0x25b529f7e90282c3!8m2!3d31.5072345!4d74.3525094!16s%2Fg%2F11dzdw6904?entry=ttu"> View Google Sitemap</a>
    </p>
</div>
    </div>
    <img src="pizzamaking.jpg" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height-top: 150px; padding-top: 120px;">
   
  </div>
  
  </body>
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

</html>
