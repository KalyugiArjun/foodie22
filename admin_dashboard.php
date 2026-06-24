<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      font-family: 'Segoe UI', sans-serif;
      overflow-x: hidden;
    }

    .dashboard-container {
      padding: 60px 20px;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .dashboard-title {
      text-align: center;
      font-size: 2.5rem;
      font-weight: bold;
      color: #2c3e50;
      margin-bottom: 50px;
      position: relative;
    }

    .dashboard-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background-color: #3498db;
      border-radius: 2px;
    }

    .card-box {
      background: #ffffff;
      border: 1px solid #ddd;
      border-radius: 25px;
      padding: 40px 25px;
      text-align: center;
      transition: all 0.4s ease-in-out;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      position: relative;
    }

    .card-box::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
      border-radius: 25px;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
    }

    .card-box:hover::before {
      opacity: 1;
    }

    .card-box:hover {
      transform: translateY(-10px);
      color: #ffffff;
    }

    .card-box i {
      font-size: 40px;
      color: #2980b9;
      margin-bottom: 20px;
      transition: transform 0.4s;
    }

    .card-box:hover i {
      transform: scale(1.2);
    }

    .card-box a {
      text-decoration: none;
      color: #34495e;
      font-size: 1.25rem;
      font-weight: 600;
      display: block;
      margin-top: 10px;
    }

    .card-box:hover a {
      color: #ffffff;
    }

    .logout-card i {
      color: #e74c3c !important;
    }

    .logout-card a {
      color: #e74c3c !important;
    }

    .logout-card:hover a {
      color: #ffffff !important;
    }

    .card-box span {
      font-size: 0.9rem;
      color: #7f8c8d;
      display: block;
      margin-top: 5px;
    }

    @media (max-width: 576px) {
      .dashboard-title {
        font-size: 1.8rem;
      }

      .card-box {
        padding: 30px 15px;
      }

      .card-box i {
        font-size: 30px;
      }
    }
  </style>
</head>
<body>

<div class="container-fluid dashboard-container">
  <h2 class="dashboard-title">Welcome Mr,<?= $_SESSION['admin'] ?> 👨‍💻</h2>

  <div class="row g-4 justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card-box">
        <i class="fas fa-users"></i>
        <a href="view_users.php">View Users</a>
        <span>Manage all registered users</span>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card-box">
        <i class="fas fa-hamburger"></i>
        <a href="view_foods.php">View Food Items</a>
        <span>Check and update menu items</span>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card-box">
        <i class="fas fa-box-open"></i>
        <a href="view_orders.php">View Orders</a>
        <span>Track and manage orders</span>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
  <div class="card-box">
    <i class="fas fa-plus-circle"></i>
    <a href="add_resturent.php">Add Restaurant</a>
    <span>Add a new restaurant to the list</span>
  </div>
</div>


    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card-box">
        <i class="fas fa-key"></i>
        <a href="change_password.php">Change Password</a>
        <span>Update login credentials</span>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card-box logout-card">
        <i class="fas fa-sign-out-alt"></i>
        <a href="admin_logout.php">Logout</a>
        <span>Sign out of dashboard</span>
      </div>
    </div>
  </div>
</div>

</body>
</html>
