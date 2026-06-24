<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (isset($_POST['submit'])) {
    $name = $_POST['food_name'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_path = "uploads/" . time() . "_" . basename($image); // unique filename

    $desc = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer_price'];
    $category = 'chole';

    if (move_uploaded_file($tmp_name, $upload_path)) {
        $insert = "INSERT INTO biryanis (food_name, image, description, price, offer_price, category)
                   VALUES ('$name', '$upload_path', '$desc', '$price', '$offer', '$category')";

        if (mysqli_query($conn, $insert)) {
            $msg = "✅ Biryani dish inserted successfully!";
        } else {
            $msg = "❌ Database Error: " . mysqli_error($conn);
        }
    } else {
        $msg = "❌ Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Biryani Dish</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="text-center text-success mb-4">Add New Dish</h2>

  <?php if (isset($msg)): ?>
    <div class="alert alert-info"><?= $msg; ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">
    <div class="mb-3">
      <label>Food Name</label>
      <input type="text" name="food_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Upload Image</label>
      <input type="file" name="image" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control" >
    </div>
    <div class="mb-3">
      <label>Offer Price</label>
      <input type="number" name="offer_price" class="form-control" >
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Dish</button>
    <a href="biryani.php" class="btn btn-secondary">View Dishes</a>
  </form>
</div>
</body>
</html>
