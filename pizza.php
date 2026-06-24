<?php 
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$sql = "SELECT * FROM biryanis WHERE category='pizza'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Biryani Specials</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #fff8f0;
      font-family: 'Segoe UI', sans-serif;
    }

    h2.heading {
      text-align: center;
      margin: 30px 0;
      font-size: 2.2rem;
      color: #d2691e;
      position: relative;
      animation: slideUp 1s ease-out;
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
      overflow: hidden;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .food-img {
      height: 220px;
      width: 100%;
      object-fit: cover;
    }

    .price {
      color: #e74c3c;
      font-weight: bold;
    }

    .original-price {
      text-decoration: line-through;
      color: grey;
      font-size: 0.9rem;
    }

    .btns a {
      margin: 5px 5px 0 0;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="heading">Pizza Specials - Taste the Royalty!</h2>
  <div class="row g-4">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="col-md-4 col-sm-6">
        <div class="card">
          <img src="<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['food_name']); ?>" class="food-img">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['food_name']); ?></h5>
            <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
            <p>
              <span class="price">₹<?= $row['offer_price']; ?></span>
              <span class="original-price">₹<?= $row['price']; ?></span>
            </p>
            <div class="btns">
              
              <a href="order.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Order</a>
              
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
