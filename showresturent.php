<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM restaurants ORDER BY rating rand()";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Restaurants</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 20px;
      background: #f3f4f6;
      font-family: 'Segoe UI', sans-serif;
    }

    h1 {
      text-align: center;
      color: #222;
      margin-bottom: 30px;
    }

    .restaurant-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 20px;
    }

    .restaurant-card {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }

    .restaurant-card:hover {
      transform: scale(1.02);
    }

    .restaurant-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .restaurant-content {
      padding: 15px;
    }

    .restaurant-content h3 {
      margin: 0;
      font-size: 1.5rem;
      color: #333;
    }

    .rating {
      margin: 8px 0;
      color: #f8b400;
    }

    .description {
      font-size: 0.95rem;
      color: #555;
      margin-bottom: 10px;
    }

    .details {
      font-size: 0.9rem;
      color: #444;
      margin-bottom: 5px;
    }

    .btn-order {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 16px;
      background: #ff5722;
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn-order:hover {
      background: #e64a19;
    }
  </style>
</head>
<body>

<h1>🍴 All Restaurants</h1>

<div class="restaurant-grid">
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <div class="restaurant-card">
    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Restaurant Image">
    <div class="restaurant-content">
      <h3><?php echo htmlspecialchars($row['name']); ?></h3>
      <div class="rating">
        <?php
          $fullStars = floor($row['rating']);
          $halfStar = ($row['rating'] - $fullStars) >= 0.5;
          for ($i = 0; $i < $fullStars; $i++) echo '<i class="fas fa-star"></i>';
          if ($halfStar) echo '<i class="fas fa-star-half-alt"></i>';
          for ($i = $fullStars + $halfStar; $i < 5; $i++) echo '<i class="far fa-star"></i>';
        ?>
        (<?php echo number_format($row['rating'], 1); ?>)
      </div>
      <p class="description"><?php echo htmlspecialchars($row['description']); ?></p>
      <p class="details"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['address']); ?></p>
      <p class="details"><i class="fas fa-phone-alt"></i> <?php echo htmlspecialchars($row['phone']); ?></p>
      <a href="#" class="btn-order">Order Now</a>
    </div>
  </div>
<?php } ?>
</div>

</body>
</html>
