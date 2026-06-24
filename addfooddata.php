<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Food</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f1f1;
    }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2><i class="fas fa-utensils"></i> Add New Food Item</h2>
  <form action="insertfood.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="food_name" class="form-label">Food Name</label>
      <input type="text" name="food_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Food Image</label>
      <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="offer_price" class="form-label">Offer Price</label>
      <input type="number" name="offer_price" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-danger w-100">Add Food</button>
  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
