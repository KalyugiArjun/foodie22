<?php 
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$sql = "SELECT * FROM fooditems";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Food - Dynamic Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .card:hover {
      transform: scale(1.02);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .image-container {
      overflow: hidden;
      border-radius: 15px 15px 0 0;
    }

    .food-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
      transition: transform 0.5s ease-in-out;
    }

    .image-container:hover .food-img {
      transform: scale(1.15);
    }

    .price {
      font-weight: bold;
      color: #dc3545;
    }

    .original-price {
      text-decoration: line-through;
      color: grey;
    }

    .card-body {
      padding: 15px;
    }

    .btns {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 5px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="text-center text-danger mb-4"><i class="fas fa-hamburger"></i> Our Delicious Dishes <br>ek baar khaoge baar baar mangaoge</h2>
  <div class="row g-4">

    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="col-md-4 col-sm-6">
        <div class="card h-100">
          <div class="image-container">
            <img src="<?= htmlspecialchars($row['image']); ?>" class="card-img-top food-img" alt="<?= htmlspecialchars($row['food_name']); ?>">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['food_name']); ?></h5>
            <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
            <p class="mb-1">
              <span class="price">₹<?= $row['offer_price']; ?></span>
              <span class="original-price">₹<?= $row['price']; ?></span>
            </p>
            <div class="btns">
              <a href="addtocart.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                <i class="fas fa-cart-plus"></i> Add to Cart
              </a>
              <a href="orderform.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">
                <i class="fas fa-check"></i> Order Now
              </a>
              <a href="add_to_fav.php?id=<?= $row['id']; ?>" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-heart"></i> Favorite
              </a>
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
