<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($restaurant['name']); ?> - Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f8f9fa;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }
    .restaurant-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .restaurant-header img {
      width: 100%;
      max-height: 400px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .restaurant-header h1 {
      margin-top: 20px;
      font-size: 32px;
    }
    .rating {
      font-size: 20px;
      color: #f39c12;
      margin-top: 5px;
    }
    .description {
      margin-top: 30px;
      font-size: 18px;
      line-height: 1.6;
      color: #555;
    }
    .back-link {
      margin-top: 30px;
      text-align: center;
    }
    .back-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    .back-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 600px) {
      .restaurant-header h1 {
        font-size: 24px;
      }
      .description {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="restaurant-header">
    <img src="<?php echo htmlspecialchars($restaurant['image']); ?>" alt="<?php echo htmlspecialchars($restaurant['name']); ?>">
    <h1><?php echo htmlspecialchars($restaurant['name']); ?></h1>
    <div class="rating">⭐ <?php echo number_format($restaurant['rating'], 1); ?>/5</div>
  </div>

  <div class="description">
    <?php
      echo nl2br(htmlspecialchars($restaurant['description'] ?? 'No description available.'));
    ?>
  </div>

  <div class="back-link">
    <a href="index.php">← Back to Restaurants</a>
  </div>
</div>

</body>
</html>
