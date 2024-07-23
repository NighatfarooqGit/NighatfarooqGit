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
    .login{
      float: right;
      margin-right: 10px
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
  </style>
  <title>Haveli|home</title>
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
    <li style="display: inline"><a href="havelihome.php">Home</a></li>
    <li style="display: inline"><a href="Menu.php" target="_blank">Menu</a></li>
    <li style="display: inline"><a href="newmenu.php" target="_blank">New Menu</a></li>
    <li style="display: inline"><a href="aboutus.php" target="_blank">About Us</a></li>
    <li style="display: inline"><a href="contactus.php" target="_blank">Contact Us</a></li>
    <div class="login">
    <li style="display: inline"><a href="adminlogin.php" target="_blank">Admin Login</a></li>
    <li style="display: inline"><a href="login.php" target="_blank">User Login </a></li>
    </div>

  </ul>
</nav>
<main>
<section>
<div style="padding: 8px;">
  <div class="slideshow">
    <img class="slide show" src="b1.png" style="border-radius: 0px" />
    <img class="slide" src="b2.png" style="border-radius: 0px" />
    <img class="slide" src="b3.png" style="border-radius: 0px" />
    <img class="slide" src="b4.png" style="border-radius: 0px" />
  </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      let currentIndex = 0;
      const slides = document.querySelectorAll(".slideshow .slide");
      const totalSlides = slides.length;

      slides[currentIndex].classList.add("show"); // Show the first slide

      function cycleSlides() {
        slides[currentIndex].classList.remove("show"); // Hide current slide
        currentIndex = (currentIndex + 1) % totalSlides; // Move to the next slide, loop back to 0 if at the end
        slides[currentIndex].classList.add("show"); // Show next slide
      }

      setInterval(cycleSlides, 2000); // Change slide every 2 seconds
    });
  </script>
  </section>
  <section style="background-color: black;">
    <h1>
        SPECIALS
    </h1>
    <div class="SPECIALS">
        <div class="row">
            <figure>
              <a href="d1.html"><img src="bbq-platter.jpg" alt="bbq platter">
                <figcaption>
                    <a href="d1.html">BBQ Platter<br> PKR 8,000 </a>
                </figcaption>
            </figure>
            <figure>
              <a href="d2.html"><img src="chicken-makhni.jpg" alt="chicken makhni">
                <figcaption>
                    <a href="d2.html">Chicken Makhni<br> PKR 5,000 </a>
                </figcaption>
            </figure>
        </div>
        <div class="row">
            <figure>
              <a href="d3.html"><img src="palak-paneer.jpg" alt="palak panner">
                <figcaption >
                    <a href="d3.html">Palak Paneer<br> PKR 3,000 </a>
                </figcaption>
            </figure>
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
    <img src="instagram-logo.jpg" alt="Instagram" height="25" width="25" style="vertical-align: middle;"></a>
</div>
</footer>
</body>
</html>
 