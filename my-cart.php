<?php
session_start();
$user = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Online Food Delivery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: scale(1.03);
    }
    .welcome {
      font-size: 1.6rem;
      margin-top: 30px;
      margin-bottom: 20px;
    }
    .icon {
      font-size: 3rem;
      color: #ff5722;
    }
  </style>
</head>
<body>
  <div class="container text-center">
    <h2 class="welcome">🍽 Welcome, <?php echo htmlspecialchars($user); ?>!</h2>
    <p class="text-muted">Explore your dashboard and manage your orders, favorites, and profile.</p>
    
    <div class="row mt-4 g-4">

      <!-- Browse Food -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-utensils"></i></div>
          <h5 class="mt-3">Browse Food</h5>
          <p class="text-muted">Order your favorite dishes from top restaurants.</p>
          <a href="dishes.php" class="btn btn-outline-danger">Explore</a>
        </div>
      </div>

      <!-- My Orders -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-receipt"></i></div>
          <h5 class="mt-3">My Orders</h5>
          <p class="text-muted">Track your orders in real-time and see history.</p>
          <a href="my-orders.php" class="btn btn-outline-danger">View Orders</a>
        </div>
      </div>

      <!-- My Cart -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-shopping-cart"></i></div>
          <h5 class="mt-3">My Cart</h5>
          <p class="text-muted">Check items you've added to your cart.</p>
          <a href="cart.php" class="btn btn-outline-danger">View Cart</a>
        </div>
      </div>

      <!-- Favorites -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-heart"></i></div>
          <h5 class="mt-3">Favorites</h5>
          <p class="text-muted">Save your favorite dishes for quick ordering.</p>
          <a href="favourite.php" class="btn btn-outline-danger">Check</a>
        </div>
      </div>

      <!-- Account Settings -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-user-cog"></i></div>
          <h5 class="mt-3">Account Settings</h5>
          <p class="text-muted">Edit your profile, address, and preferences.</p>
          <a href="signupshow.php" class="btn btn-outline-danger">Manage</a>
        </div>
      </div>

      <!-- Logout -->
      <div class="col-md-4">
        <div class="card p-4">
          <div class="icon"><i class="fas fa-sign-out-alt"></i></div>
          <h5 class="mt-3">Logout</h5>
          <p class="text-muted">End your session securely.</p>
          <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
