<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid restaurant ID.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM restaurants WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Restaurant not found.");
}

$restaurant = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($restaurant['name']); ?> - Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Fonts, AOS, Icons -->
   <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d9d5a7f3.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background: #f2f2f2;
      color: #333;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      padding: 40px 20px;
    }
    .image-box {
      overflow: hidden;
      border-radius: 16px;
    }
    .image-box img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 16px;
      transition: transform 0.4s ease;
    }
    .image-box img:hover {
      transform: scale(1.02);
    }
    h1 {
      font-size: 36px;
      margin-top: 25px;
    }
    .rating {
      font-size: 20px;
      color: #f39c12;
      margin-bottom: 15px;
    }
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin: 30px 0;
    }
    .info-box {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }
    .about, .description {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      margin-top: 30px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }
    .about h3, .description h3 {
      margin-bottom: 12px;
      font-size: 24px;
    }
    .back-link {
      margin-top: 40px;
      text-align: center;
    }
    .back-link a {
      text-decoration: none;
      color: #007bff;
      font-weight: 500;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
   .icon {
  font-size: 20px;
  color: #007bff;
  margin-right: 8px;
  vertical-align: middle;
}


    .section-header {
      display: flex;
      align-items: center;
      margin-bottom: 12px;
    }
    .section-header h3 {
      margin: 0;
      font-size: 24px;
    }
    @media(max-width: 768px) {
      h1 {
        font-size: 26px;
      }
      .image-box img {
        height: 250px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="image-box" data-aos="fade-up">
    <img src="<?php echo htmlspecialchars($restaurant['image']); ?>" alt="Restaurant Image">
  </div>

  <h1 data-aos="fade-up" data-aos-delay="100"><?php echo htmlspecialchars($restaurant['name']); ?></h1>
  <div class="rating" data-aos="fade-up" data-aos-delay="150">
    ⭐ <?php echo number_format($restaurant['rating'], 1); ?>/5
  </div>

  <div class="info-grid" data-aos="fade-up" data-aos-delay="200">
  <div class="info-box">
    <i class="bi bi-geo-alt-fill icon"></i>
    <strong>Location</strong><br>
    <?php echo htmlspecialchars($restaurant['location']); ?>
  </div>
  <div class="info-box">
    <i class="bi bi-clock-fill icon"></i>
    <strong>Timing</strong><br>
    <?php echo htmlspecialchars($restaurant['timing']); ?>
  </div>
  <div class="info-box">
    <i class="bi bi-telephone-fill icon"></i>
    <strong>Contact</strong><br>
    <?php echo htmlspecialchars($restaurant['contact']); ?>
  </div>
  <div class="info-box">
    <i class="bi bi-cup-straw icon"></i>
    <strong>Type</strong><br>
    <?php echo htmlspecialchars($restaurant['type']); ?>
  </div>
</div>

<div class="about" data-aos="fade-up" data-aos-delay="250">
  <div class="section-header">
    <i class="bi bi-info-circle-fill icon"></i>
    <h3>About</h3>
  </div>
  <p><?php echo nl2br(htmlspecialchars($restaurant['about'])); ?></p>
</div>

<div class="description" data-aos="fade-up" data-aos-delay="300">
  <div class="section-header">
    <i class="bi bi-card-text icon"></i>
    <h3>Description</h3>
  </div>
  <p><?php echo nl2br(htmlspecialchars($restaurant['description'])); ?></p>
</div>

  <div class="back-link" data-aos="fade-up" data-aos-delay="350">
    <a href="index.php">← Back to Restaurants</a>
  </div>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>

</body>
</html>
