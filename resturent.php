

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie Duniya</title>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QmLJRxE40QQBlDg9gO54o6d+lBQWZCRb0DcmPjOe0jV1cZCkQ6iC7YpqOczv8I6A" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f0f0;
    }

    header {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      padding: 15px 40px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 45px;
      width: 45px;
      margin-right: 12px;
    }

    .logo span {
      font-size: 26px;
      font-weight: 600;
      color: #ffb347;
      letter-spacing: 1px;
    }

    .nav-links {
      display: flex;
      list-style: none;
    }

    .nav-links li {
      margin-left: 30px;
      position: relative;
    }

    .nav-links a {
      text-decoration: none;
      font-size: 18px;
      color: #ffffff;
      font-weight: 500;
      transition: all 0.3s ease-in-out;
      padding: 8px 0;
    }

    .nav-links a:hover {
      color: #ffb347;
    }

    /* Underline hover effect */
    .nav-links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -2px;
      background: #ffb347;
      transition: width 0.3s;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }
    }


    /* ---------------------------video section   ---------------------- */

    .video-section {
  position: relative;
  height: 100vh;
  width: 100%;
  overflow: hidden;
}

.video-section video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -1;
  transform: translate(-50%, -50%);
  object-fit: cover;
  filter: brightness(0.5);
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 0 20px;
}

.overlay h1 {
  color: #fff;
  font-size: 40px;
  font-weight: 700;
  margin-bottom: 25px;
  animation: fadeInDown 1.5s ease-in-out;
}

.search-box {
  width: 100%;
  max-width: 500px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #fff;
  border-radius: 50px;
  padding: 10px 20px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  animation: fadeInUp 1.5s ease-in-out;
}

.search-box input {
  flex: 1;
  border: none;
  outline: none;
  font-size: 16px;
  padding: 10px;
  border-radius: 50px;
}

.search-box button {
  padding: 10px 20px;
  border: none;
  border-radius: 50px;
  background-color: #ff6347;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s;
}

.search-box button:hover {
  background-color: #ff4500;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}











 .favourite-heading {
    text-align: center;
    padding: 60px 20px 20px;
    background: linear-gradient(to right, #e0f7fa, #ffffff);
  }

  .favourite-heading h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
  }

  .favourite-heading h2 span {
    color: #00bfa6;
    font-weight: 800;
  }

  @media (max-width: 600px) {
    .favourite-heading h2 {
      font-size: 1.8rem;
    }
  }

/* -----------------------------------------restro---------------------------------
 */
 .restaurant-section {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  padding: 60px 20px;
}

.restaurant-link {
  text-decoration: none;
}

.restaurant-card {
  width: 280px;
  aspect-ratio: 1/1;
  border-radius: 50%;
  overflow: hidden;
  position: relative;
  background: #ffffffcc;
  backdrop-filter: blur(12px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: pointer;
  transform: scale(0.95);
}

.restaurant-card:hover {
  transform: scale(1.05);
  box-shadow: 0 14px 30px rgba(0,0,0,0.2);
}


.restaurant-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.8);
}

.restaurant-content {
  position: absolute;
  bottom: 0;
  background: rgba(0,0,0,0.5);
  width: 100%;
  color: white;
  text-align: center;
  padding: 15px 10px;
  backdrop-filter: blur(5px);
}

.restaurant-content h3 {
  margin: 0;
  font-size: 20px;
}

.rating {
  font-size: 14px;
  margin: 5px 0;
  color: #ffeb3b;
}

.see-more {
  display: inline-block;
  margin-top: 5px;
  padding: 6px 12px;
  font-size: 13px;
  background: #00c9a7;
  color: white;
  border-radius: 20px;
  transition: background 0.3s;
}

.see-more:hover {
  background: #00997a;
}

@media(max-width: 500px){
  .restaurant-card {
    width: 180px;
  }
}

/* ------------------------dishes-------------------------- */
.popular-dishes-section {
  padding: 60px 20px 40px;
  background: linear-gradient(to right, #fffde7, #f1f8e9);
  text-align: center;
}

.popular-dishes-section h2 {
  font-size: 2.5rem;
  color: #2c3e50;
  margin-bottom: 30px;
}

.popular-dishes-section h2 span {
  color: #43a047;
}

.marquee-container {
  overflow: hidden;
  width: 100%;
}

.dish-marquee {
  display: flex;
  gap: 30px;
  align-items: center;
  padding: 10px;
}

.dish-card {
  min-width: 180px;
  background: #ffffff;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.3s;
}

.dish-card:hover {
  transform: scale(1.05);
}

.dish-card img {
  width: 100%;
  height: 140px;
  object-fit: cover;
  border-bottom: 1px solid #ddd;
}

.dish-details {
  padding: 10px;
}

.dish-details h4 {
  font-size: 1rem;
  margin: 5px 0;
  color: #2d3436;
}

.price {
  font-weight: bold;
  color: #00c853;
}

.price .original {
  text-decoration: line-through;
  color: #999;
  margin-left: 8px;
  font-size: 0.9rem;
}
.restaurant-slider-container {
  position: relative;
  overflow: hidden;
  padding: 60px 20px;
}

.restaurant-slider {
  display: flex;
  gap: 20px;
  transition: transform 0.5s ease;
  overflow-x: auto;
  scroll-behavior: smooth;
  scrollbar-width: none;
}
.restaurant-slider::-webkit-scrollbar {
  display: none;
}

.slider-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #ff6347;
  border: none;
  color: white;
  font-size: 20px;
  padding: 12px 16px;
  border-radius: 50%;
  cursor: pointer;
  z-index: 10;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.slider-button:hover {
  background: #ff4500;
}

.slider-button.left {
  left: 10px;
}

.slider-button.right {
  right: 10px;
}

@media (max-width: 600px) {
  .dish-card {
    min-width: 140px;
  }

  .popular-dishes-section h2 {
    font-size: 1.8rem;
  }

  .dish-details h4 {
    font-size: 0.9rem;
  }
}
/* footer
 */
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

  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="foodd-removebg-preview.png" alt="Logo">
        <span>Foodie Duniya</span>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="userdashboard.php">Dashboard</a></li>
        <li><a href="dishes.php">Dishes</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

  </header>

  <div class="video-section">
  <video autoplay muted loop>
  <source src="resturent.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

  <div class="overlay">
    <h1>Search Best Restro in Bansi</h1>
    <div class="search-box">
  <input type="text" id="searchInput" placeholder="Search for restaurants, dishes...">
  <button onclick="searchRestaurant()">Search</button>
</div>

  </div>
</div>




<div class="favourite-heading" data-aos="fade-up">
  <h2>Discover<span>Favourite</span> Restaurant</h2>
</div>
<!-- ------------------------------------------resturent--------------------------- -->
  


<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$sql = "SELECT * FROM restaurants ORDER BY rating DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="restaurant-slider-container" data-aos="fade-up">
  <button class="slider-button left" onclick="slideRestaurants(-1)">&#8249;</button>
  <button class="slider-button right" onclick="slideRestaurants(1)">&#8250;</button>

 <div class="restaurant-slider" id="restaurantSlider">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <a href="restaurant_details.php?id=<?php echo $row['id']; ?>" class="restaurant-link">
      <div class="restaurant-card" data-name="<?php echo strtolower($row['name']); ?>">
        <img src="<?php echo $row['image']; ?>" alt="Restaurant Image">
        <div class="restaurant-content">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <div class="rating">⭐ <?php echo number_format($row['rating'], 1); ?>/5</div>
          <div class="see-more">See More</div>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>

</div>

<!-- -----------------show dishes--------------------- -->
 <?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM biryanis ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
?>

<!-- 🍽️ Popular Dishes Section Start -->
<div class="popular-dishes-section" data-aos="fade-up">
  <h2>Our <span>Popular Dishes</span> in this Month</h2>

  <div class="marquee-container">
    <marquee behavior="scroll" direction="left" scrollamount="6">
      <div class="dish-marquee">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="dish-card">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['food_name']; ?>">
            <div class="dish-details">
              <h4><?php echo $row['food_name']; ?></h4>
              <p class="price">
                ₹<?php echo $row['offer_price'] > 0 ? $row['offer_price'] : $row['price']; ?>
                <?php if ($row['offer_price'] > 0) { ?>
                  <span class="original">₹<?php echo $row['price']; ?></span>
                <?php } ?>
              </p>
            </div>
          </div>
        <?php } ?>
      </div>
    </marquee>
  </div>
</div>



<!-- footer  -->
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


<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,     // 1 second animation
    once: false,         // repeat only once
    offset: 120         // scroll offset
  });
</script>
<script>
  function slideRestaurants(direction) {
    const slider = document.getElementById("restaurantSlider");
    const scrollAmount = slider.clientWidth / 1.2; // scroll by 80% of visible area
    slider.scrollLeft += direction * scrollAmount;
  }
</script>
<script>
  function searchRestaurant() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.restaurant-card');

    cards.forEach(card => {
      const name = card.getAttribute('data-name');
      if (name.includes(input)) {
        card.parentElement.style.display = 'block';
      } else {
        card.parentElement.style.display = 'none';
      }
    });
  }

  // Also filter on typing:
  document.getElementById('searchInput').addEventListener('input', searchRestaurant);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0GUb0RlU/OPP4OYGcTPyJ2xr5Hn3jMH+OVv8FCzVW8OqK+ZGeSPk7Zs9JUl+St4Q" crossorigin="anonymous"></script>


</body>



</html>
