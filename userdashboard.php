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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | Online Food Delivery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(to right, #f8f9fa, #e8f0ff);
      font-family: 'Segoe UI', sans-serif;
    }
    .welcome {
      font-size: 2rem;
      margin-top: 40px;
      margin-bottom: 25px;
      font-weight: bold;
      color: #2c3e50;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: linear-gradient(145deg, #ffffff, #f0f4ff);
    }
    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
      background: linear-gradient(to right, #e0ecff, #d8f3ff);
    }
    .icon {
      font-size: 3rem;
      color: #1e90ff;
      transition: transform 0.3s ease;
    }
    .card:hover .icon {
      transform: scale(1.2);
    }
    .btn-custom {
      background: #1e90ff;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background: #005ecb;
    }
    .btn-outline-secondary:hover {
      background-color: #dee2e6;
    }
    @media (max-width: 767px) {
      .icon {
        font-size: 2.5rem;
      }
    }
  </style>
</head>
<body>

<div class="container text-center">
  <h2 class="welcome">👋 Welcome, <?php echo htmlspecialchars($user); ?>!</h2>
  <p class="text-muted">Explore your dashboard and manage your orders, cart, and settings.</p>

  <div class="row mt-4 g-4">

    <!-- Home -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-home"></i></div>
        <h5 class="mt-3">Home</h5>
        <p class="text-muted">Back to homepage.</p>
        <a href="index.php" class="btn btn-custom w-100">Go Home</a>
      </div>
    </div>

    <!-- Browse Food -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-utensils"></i></div>
        <h5 class="mt-3">Browse Food</h5>
        <p class="text-muted">Order favorite dishes easily.</p>
        <a href="dishes.php" class="btn btn-custom w-100">Explore</a>
      </div>
    </div>

    <!-- My Orders -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-receipt"></i></div>
        <h5 class="mt-3">My Orders</h5>
        <p class="text-muted">Track or view previous orders.</p>
        <a href="my-orders.php" class="btn btn-custom w-100">View Orders</a>
      </div>
    </div>

    <!-- My Cart -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        <h5 class="mt-3">My Cart</h5>
        <p class="text-muted">Items added to your cart.</p>
        <a href="cart.php" class="btn btn-custom w-100">View Cart</a>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-user-cog"></i></div>
        <h5 class="mt-3">Account Settings</h5>
        <p class="text-muted">Update your personal info.</p>
        <a href="signupshow.php" class="btn btn-custom w-100">Manage</a>
      </div>
    </div>

    <!-- Logout -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-4">
        <div class="icon"><i class="fas fa-sign-out-alt"></i></div>
        <h5 class="mt-3">Logout</h5>
        <p class="text-muted">Log out of your account.</p>
        <a href="logout.php" class="btn btn-outline-secondary w-100">Logout</a>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
