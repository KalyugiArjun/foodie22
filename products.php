<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$query = "SELECT * FROM biryanis";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu - Add to Cart</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .card:hover { transform: scale(1.05); transition: 0.3s; }
  </style>
</head>
<body class="bg-light">
<div class="container py-4">
  <h2 class="text-center mb-4">Our Delicious Dishes</h2>
  <div class="row">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <form method="post" action="cart.php">
          <div class="card h-100 shadow-sm">
            <img src="<?= $row['image'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['food_name'] ?></h5>
              <p class="card-text"><?= $row['description'] ?></p>
              <p><strong>₹<?= $row['offer_price'] ?></strong> <del>₹<?= $row['price'] ?></del></p>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="name" value="<?= $row['food_name'] ?>">
              <input type="hidden" name="price" value="<?= $row['offer_price'] ?>">
              <input type="number" name="qty" value="1" class="form-control mb-2" min="1">
              <button type="submit" name="add" class="btn btn-success w-100">Add to Cart</button>
            </div>
          </div>
        </form>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
