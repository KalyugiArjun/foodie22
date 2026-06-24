<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>foodie duniya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />



  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: #fff;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 2.5rem;
      background: linear-gradient(to right, #ff7e5f, #feb47b);
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(8px);
      transition: 0.4s ease-in-out;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 1.8rem;
      color: white;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      animation: zoomIn 1s ease-in-out;
    }

    .logo img {
      height: 50px;
      border-radius: 12px;
      transition: transform 0.3s ease;
    }

    .logo img:hover {
      transform: scale(1.1);
    }

    .nav-links {
      display: flex;
      gap: 2.5rem;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 1.2rem;
      font-weight: 600;
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-links a:hover {
      transform: scale(1.08);
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 3px;
      left: 0;
      bottom: -6px;
      background: white;
      transition: 0.3s;
      border-radius: 5px;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .menu-toggle {
      display: none;
      font-size: 1.8rem;
      color: white;
      cursor: pointer;
    }

    @keyframes zoomIn {
      0% {
        transform: scale(0.8);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        flex-direction: column;
        position: absolute;
        top: 100%;
        right: 0;
        width: 100%;
        background: rgba(255, 126, 95, 0.9);
        display: none;
        text-align: center;
        padding: 1rem 0;
        backdrop-filter: blur(8px);
      }

      .nav-links.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }

      .nav-links a {
        padding: 0.8rem 0;
      }
    }
/* -----------------------------------text style------------------------------------ */
.hero-banner {
    font-family: cursive;
  /* background: linear-gradient(135deg, #ff9a44, #ff3e55); */
  color:rgba(255, 126, 95, 0.9);
  text-align: center;
  padding: 10px 20px;
  position: relative;
  overflow: hidden;
}

.hero-banner h1 {
  font-size: 4rem;
  font-weight: bold;
  animation: slideUp 1.5s ease-out forwards ;
  opacity: 0;
  transform: translateY(50px);
  text-shadow: 0px 4px 18px rgba(0,0,0,0.15);
}

@keyframes slideUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  .hero-banner h1 {
    font-size: 2rem;
    padding: 0 1rem;
  }
}



/* - ------------------------------------ye corousal ke liye -------------------------------  */

.carousel-container {

  width: 100%;
  max-width: 100%;
  overflow: hidden;
  margin: 0 auto;
  /* background: linear-gradient(to right, #ffe1c4, #ffd1c4); */
  padding: 2rem 0;
  box-shadow: inset 0 2px 10px rgba(255, 102, 0, 0.1);
  /* height: 100vh; */
}

.carousel {
   
  display: flex;
  animation: slideCarousel 16s infinite;
  gap: 2rem;
  transition: transform 0.5s ease;
}

.carousel img {
    
  min-width: 100%;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  transition: transform 0.5s ease;
  object-fit: cover;
  height: 700px;
  
}

.carousel img:hover {
  transform: scale(1.03);
}

@keyframes slideCarousel {
  0% { transform: translateX(0); }
  20% { transform: translateX(0); }

  25% { transform: translateX(-100%); }
  45% { transform: translateX(-100%); }

  50% { transform: translateX(-200%); }
  70% { transform: translateX(-200%); }

  75% { transform: translateX(-300%); }
  95% { transform: translateX(-300%); }

  100% { transform: translateX(0); }
}

/* Mobile adjustment */
@media (max-width: 768px) {
  .carousel img {
    height: 220px;
  }
}
/* ------------------------------once again text ------------------- */
.hero-banner1 {
    font-family: cursive;
  /* background: linear-gradient(135deg, #ff9a44, #ff3e55); */
  color:rgba(227, 122, 16, 0.9);
  text-align: center;
  padding: 10px 20px;
  position: relative;
  overflow: hidden;
}

.hero-banner1 h1 {
  font-size: 4rem;
  font-weight: bold;
  animation: slideUp 1.8s ease-out forwards infinite ;
  opacity: 0;
  transform: translateY(50px);
  text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
}

@keyframes slideUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  .hero-banner h1 {
    font-size: 2rem;
    padding: 0 1rem;
  }
}
 /* ------------------------box----------------------- */
 .circle-box-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 4rem;
  padding: 3rem 2rem;
  background: #ffff;
}

.circle-box {
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  cursor: pointer;
}

.circle-box img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid #ff6600;
  transition: transform 0.3s ease;
  box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
}

.circle-box p {
  margin-top: 10px;
  font-weight: bold;
  font-size: 1.1rem;
  color: #333;
  transition: color 0.3s ease;
}

.circle-box:hover img {
  transform: scale(1.1);
  box-shadow: 0 6px 18px rgba(255, 102, 0, 0.5);
}

.circle-box:hover p {
  color: #ff6600;
  text-decoration: underline;
}

@media (max-width: 768px) {
  .circle-box img {
    width: 90px;
    height: 90px;
  }
  .circle-box p {
    font-size: 0.9rem;
  }
}

/* ----------------------marueee------------------------ */
.order-marquee {
  background: linear-gradient(to right, #ff9966, #ff5e62);
  padding: 15px 0;
  border-top: 3px solid #fff;
  border-bottom: 3px solid #fff;
  font-family: 'Segoe UI', sans-serif;
  font-size: 1.2rem;
  font-weight: bold;
  color: #fff;
  text-shadow: 1px 1px 2px #00000077;
  box-shadow: 0 0 15px rgba(255, 94, 98, 0.5);
}


/* ----------------------about section---------------------- */
.about-wrapper {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 80px 10%;
  /* background: linear-gradient(135deg, #fff0e6, #ffdfcc); */
  gap: 50px;
}

.about-left {
  flex: 1 1 400px;
  animation-duration: 1.5s;
}

.about-left h2 {
  font-size: 2.5rem;
  color: #ff6600;
  margin-bottom: 20px;
  font-family: 'Segoe UI', sans-serif;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}

.about-left p {
  font-size: 1.2rem;
  color: #333;
  line-height: 1.7;
  font-family: 'Segoe UI', sans-serif;
}

.about-right {
  flex: 1 1 400px;
  text-align: center;
}

.about-right img {
  width: 100%;
  max-width: 650px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  transition: transform 0.4s ease;
}

.about-right img:hover {
  transform: scale(1.05);
}

/* Responsive */
@media (max-width: 768px) {
  .about-wrapper {
    flex-direction: column;
    text-align: center;
  }

  .about-left h2 {
    font-size: 2rem;
  }

  .about-left p {
    font-size: 1rem;
  }
}






/* -----------------------------text----------------------- */

.impact-section {
  background: #fff9f5;
  padding: 80px 20px;
  text-align: center;
  font-family: 'Segoe UI', sans-serif;
}

.impact-heading {
  font-size: 2.5em;
  font-weight: bold;
  color: #ff5e62;
  margin-bottom: 10px;
}

.impact-subtext {
  color: #555;
  font-size: 1.1em;
  max-width: 1000px;
  margin: 0 auto 40px;
}

.impact-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
}

.impact-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
  padding: 30px 20px;
  width: 350px;
  transition: transform 0.3s ease;
}

.impact-card:hover {
  transform: translateY(-10px);
}

.impact-card img {
  width: 60px;
  margin-bottom: 15px;
}

.impact-card h3 {
  color: #e63946;
  font-size: 1.3em;
  margin-bottom: 10px;
}

.impact-card p {
  color: #444;
  font-size: 0.95em;
}

/* Responsive */
@media (max-width: 768px) {
  .impact-heading {
    font-size: 2em;
  }

  .impact-card {
    width: 100%;
    max-width: 320px;
  }
}
/* ------------------------footer------------------ */

.footer {
  background-color: #1e1e1e;
  color: #f5f5f5;
  padding: 50px;
  font-family: 'Segoe UI', sans-serif;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;
  max-width: 1500px;
  margin: auto;
}

.footer-left {
  flex: 1;
  min-width: 350px;
}

.footer-left h2 {
  color: #ff6347;
  font-size: 24px;
  margin-bottom: 15px;
}

.footer-left p {
  font-size: 14px;
  line-height: 1.6;
}

.social-icons a {
  color: #f5f5f5;
  margin-right: 10px;
  font-size: 18px;
  transition: color 0.3s;
}

.social-icons a:hover {
  color: #ff6347;
}

.footer-center {
  flex: 1;
  min-width: 200px;
  text-align: center;
}

.footer-center .mobile-img {
  width: 70px;
  margin-bottom: 10px;
}

.footer-center .qr-img {
  width: 100px;
  margin-top: 10px;
}

.footer-center p {
  font-size: 14px;
  margin-top: 5px;
  color: #ddd;
}

.footer-right {
  flex: 1;
  min-width: 200px;
}

.footer-right h3 {
  font-size: 18px;
  color: #ff6347;
  margin-bottom: 10px;
}

.footer-right ul {
  list-style: none;
  padding: 0;
}

.footer-right ul li {
  margin-bottom: 8px;
}

.footer-right ul li a {
  text-decoration: none;
  color: #f5f5f5;
  font-size: 14px;
  transition: color 0.3s;
}

.footer-right ul li a:hover {
  color: #ff6347;
}

.footer-bottom {
  text-align: center;
  padding-top: 20px;
  font-size: 13px;
  color: #aaa;
  border-top: 1px solid #444;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .footer-left, .footer-right, .footer-center {
    margin-bottom: 30px;
  }
}

  </style>
</head>
<body>

  <nav>
    <div class="logo">
      <img src="foodd-removebg-preview.png" alt="Logo" />
      Foodie Duniya
    </div>
    <div class="menu-toggle" id="menu-icon">
      <i class="fas fa-bars"></i>
    </div>
    <div class="nav-links" id="nav-links">
      <a href="">Home</a>
      <a href="resturent.php" target="_blank">Restaurants</a>
      <a href="dishes.php" target="_blank">Dishes</a>
      <a href="login.php" target="_blank">Login</a>
      <a href="signup.php">Sign Up</a>
      <a href="userdashboard.php" >Dashboard</a>
      <a href="contact.php">Contact</a>
    </div>
  </nav>

<!-- -----------------------------ye text ke liye tha----------------------------- -->

<div class="hero-banner">
  <h1>Order, Delivery & Take Out</h1>

</div>

<!-- ------------------------------------ye corousal ke liye ------------------------------- -->
<div class="carousel-container">
  <div class="carousel" id="carousel">
    <img src="https://png.pngtree.com/thumb_back/fw800/background/20240926/pngtree-shahi-paneer-artistic-serving-image_16255694.jpg" alt="Slide 1">
    <img src="pre-prepared-food-showcasing-ready-eat-delicious-meals-go.jpg" alt="Slide 3">
    <img src="https://images.getrecipekit.com/20221130023757-untitled-design-12-3.png?aspect_ratio=16:9&quality=90&" alt="Slide 4">
    <img src="https://www.apnachef.com/wp-content/uploads/2023/12/chicken-biryani-50-people-wide.jpg" alt="Slide 2">
  </div>
</div>


<!-- ----------------once again text ------------------------ -->

<div class="hero-banner1">
  <h1>Now You Can Find Your Favourite Dishes</h1>

</div>



<!-- ---------------------------------here we create a container in which we take foods ------------------------------- -->
 <br><br>

<div class="circle-box-container">
  <a href="pizza.php"><div class="circle-box">
    <img src="img/pizza1.jpg" alt="Pizza">
    <p>Pizza</p></a>
  </div>
<a href="burger.php">  <div class="circle-box">
    <img  src="https://media.istockphoto.com/id/520410807/photo/cheeseburger.jpg?s=612x612&w=0&k=20&c=fG_OrCzR5HkJGI8RXBk76NwxxTasMb1qpTVlEM0oyg4=" alt="Burger">
    <p>Burger</p>
  </div></a>


  <a href="panner.php"><div class="circle-box">
    <img src="https://png.pngtree.com/thumb_back/fw800/background/20240926/pngtree-shahi-paneer-artistic-serving-image_16255694.jpg" alt="Paneer Roll">
    <p>Paneer</p>
  </div></a>
  <a href="noodles.php"><div class="circle-box">
    <img src="https://www.ohmyveg.co.uk/wp-content/uploads/2024/10/paneer-hakka-noodles.jpg" alt="Noodles">
    <p>Noodles</p>
  </div></a>
  
  <a href="ice.php"><div class="circle-box">
    <img src="https://www.keep-calm-and-eat-ice-cream.com/wp-content/uploads/2022/08/Ice-cream-sundae-hero-11-500x500.jpg" alt="Ice Cream">
    <p>Ice Cream</p>
  </div></a>
  
  <a href="momos.php"><div class="circle-box">
    <img src="https://static.india.com/wp-content/uploads/2024/12/FEATURE-2024-12-15T174448.090.jpg?impolicy=Medium_Widthonly&w=350&h=263" alt="Momos">
    <p>Momos</p>
  </div></a>
  
  <a href="thali.php"><div class="circle-box">
    <img src="https://i.ndtvimg.com/i/2017-10/thali_620x350_71507031336.jpg" alt="Indian Thali">
    <p>Our Special Thali</p>
  </div></a>
  
  <a href="biryani.php"><div class="circle-box">
    <img src="https://www.apnachef.com/wp-content/uploads/2023/12/chicken-biryani-50-people-wide.jpg" alt="Non Veg ">
  <p>Non Veg</p>
  </div></a>
  

  <a href="dosa.php"> <div class="circle-box">
    <img src="https://img.freepik.com/free-photo/delicious-indian-dosa-composition_23-2149086051.jpg" alt="Dosa">
    <p>Dosa</p>
  </div></a>
 
  <a href="chole.php"><div class="circle-box">
    <img src="https://img.freepik.com/free-photo/chole-bhature-delicious-indian-street-food_23-2151998582.jpg?semt=ais_hybrid&w=740&q=80" alt="North Indian Dishes">
    <p>Chole Bhature</p>
  </div></a>
  
</div>

<!-- ---------------------marquee text---------------------------- -->
 <div class="order-marquee">
  <marquee behavior="scroll" direction="left" scrollamount="8" ;">
  🍕 Har bite mein pyaar, har order mein bharosa! 🛵 Ghar ho ya office, picnic ho ya party — bas ek click aur swad aapke paas! ❤️ Order now from Arjun Food Express – Jahaan Bhookh Ka Ilaaj Hai!
</marquee>

</div>


<!-- ---------------------------------about content--------------------------- -->

<div class="about-wrapper">
  <div class="about-left" data-aos="fade-right">
    
    <p>
            Founded with a vision to revolutionize food delivery, <strong>Foodie Duniya</strong> is not just a service — it's a food movement. Since our inception, we’ve been committed to connecting people with the food they love, from local favorites to global cuisines.

    </p>
    <p>        At the heart of everything we do lies a simple belief: <em>“Great food should be accessible, enjoyable, and just a click away.”</em>
</p>
  </div>
  <div class="about-right" data-aos="fade-up">
    <img src="https://t3.ftcdn.net/jpg/03/51/02/46/360_F_351024684_qRJBZa0XlvKs5bKDHVqlcbVF2ux4tDga.jpg" alt="Food Delivery">
  </div>
</div>

<!-- ----------------------------text--------------------------- -->
 <section class="impact-section">
  <div class="impact-container" data-aos="fade-up">
    <h2 class="impact-heading">Empowering India's Food Revolution</h2>
    <p class="impact-subtext">
      Through innovation and dedication, we connect millions of users with restaurants and delivery heroes across India — all at the tap of a button.
    </p>
    <div class="impact-cards">
      <div class="impact-card" data-aos="zoom-in">
        <img src="https://cdn-icons-png.flaticon.com/128/891/891462.png" alt="Customers" />
        <h3>22M+ Monthly Users</h3>
        <p>Discover and enjoy food every single day.</p>
      </div>
      <div class="impact-card" data-aos="zoom-in" data-aos-delay="100">
        <img src="https://cdn-icons-png.flaticon.com/128/1046/1046784.png" alt="Restaurants" />
        <h3>300K+ Restaurants</h3>
        <p>Partnered to serve across every corner of India.</p>
      </div>
      <div class="impact-card" data-aos="zoom-in" data-aos-delay="200">
        <img src="https://cdn-icons-png.flaticon.com/128/3064/3064197.png" alt="Delivery Partners" />
        <h3>500K+ Delivery Heroes</h3>
        <p>Empowered with opportunities & growth.</p>
      </div>
    </div>
  </div>
</section>


<!-- ----------------------------------------footer---------------------------------------- -->


<footer class="footer">
  <div class="footer-container">
    <!-- Left: Logo and Text -->
    <div class="footer-left">
      <h2>Creater </h2>
      <p>Crete any Responsive and dynamic website in few hours with Arjun Vishwkarma</p>
      <div class="social-icons">
        <a href="https://www.facebook.com/profile.php?id=100042461165488"><i class="fab fa-facebook-f"></i></a>
        <a href="http://instagram.com/kalyug_ke_arjun_/?hl=en"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/arjun-vishwakarma45/"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>

    <!-- Center: Mobile Image and QR -->
    <div class="footer-center">
      <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png" alt="Mobile App" class="mobile-img">
      <p>Scan to Download App</p>
      <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://yourwebsite.com&size=100x100" alt="QR Code" class="qr-img">
    </div>

    <!-- Right: Quick Links -->
    <div class="footer-right">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="about.php">About Us</a></li>
        <li><a href="help.php">Help Center</a></li>
        <li><a href="privacy.php">Privacy Policy</a></li>
        <li><a href="terms.php">Terms & Conditions</a></li>
        <li><a href="">Contact Support</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    &copy; Foodie Duniya | Made with ❤️ by Arjun
    


  </div>
</footer>






  <script>
    const menuIcon = document.getElementById("menu-icon");
    const navLinks = document.getElementById("nav-links");

    menuIcon.onclick = () => {
      navLinks.classList.toggle("active");
    };
  </script>
  <script>
  document.querySelectorAll('.circle-box').forEach(box => {
    box.addEventListener('click', () => {
      // alert("You clicked on: " + box.querySelector('p').textContent);
      // Later redirect to dish detail: window.location.href = 'biryani.php?name=' + dishName;
    });
  });
</script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // animation duration
    offset: 150,    // trigger animation when 150px away
    onafterprint: true      // only animate once
  });
</script>
</body>
</html>
