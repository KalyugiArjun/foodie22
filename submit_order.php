<?php
session_start();
require_once 'db_connect.php';

if (!isLoggedIn()) {
    redirectWithAlert('login.php', '❌ Pehle login karein!');
}

$user_id    = clean($conn, $_SESSION['user']);
$order_time = date("Y-m-d H:i:s");

$cart_result = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
if (mysqli_num_rows($cart_result) == 0) {
    redirectWithAlert('my-cart.php', '❌ Cart khali hai!');
}

$grand_total = 0;
$order_items = [];

while ($row = mysqli_fetch_assoc($cart_result)) {
    $food_id   = intval($row['food_id']);
    $food_name = clean($conn, $row['food_name']);
    $price     = floatval($row['offer_price']);
    $quantity  = intval($row['quantity']);
    $total     = floatval($row['total']);
    $grand_total += $total;

    $insert = "INSERT INTO orders (user_id, food_id, food_name, offer_price, quantity, total, status, order_date)
               VALUES ('$user_id', '$food_id', '$food_name', '$price', '$quantity', '$total', 'Pending', '$order_time')";
    mysqli_query($conn, $insert);
    $order_items[] = $food_name . " x" . $quantity;
}

// Cart clear karo
mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Placed! 🎉</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg, #f8f9fa, #e8f5e9); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    .order-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.15); text-align: center; max-width: 500px; }
    .tick { font-size: 80px; animation: bounce 1s ease infinite alternate; }
    @keyframes bounce { from { transform: scale(1); } to { transform: scale(1.1); } }
    .total-badge { background: #ff6b35; color: white; padding: 10px 25px; border-radius: 50px; font-size: 1.3rem; font-weight: bold; display: inline-block; margin: 15px 0; }
  </style>
</head>
<body>
<div class="order-card">
  <div class="tick">🎉</div>
  <h2 class="text-success mt-3">Order Successfully Placed!</h2>
  <p class="text-muted">Aapka order receive ho gaya hai.</p>
  <div class="total-badge">₹<?= number_format($grand_total, 2) ?></div>
  <p class="mt-3"><strong>Order Time:</strong> <?= $order_time ?></p>
  <p><strong>Items:</strong> <?= implode(", ", $order_items) ?></p>
  <a href="my-orders.php" class="btn btn-outline-success me-2 mt-3">📦 My Orders</a>
  <a href="index.php" class="btn btn-warning mt-3">🏠 Home</a>
</div>
</body>
</html>
