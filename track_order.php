<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "Please login to track your order.";
    exit;
}

if (!isset($_GET['id'])) {
    echo "No order selected.";
    exit;
}

$order_id = $_GET['id'];
$user_id = $_SESSION['user'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE id='$order_id' AND user_id='$user_id'");
if (mysqli_num_rows($result) == 0) {
    echo "Order not found.";
    exit;
}

$order = mysqli_fetch_assoc($result);

// Dummy status logic
$status = "Preparing";
$order_time = strtotime($order['order_date']);
$current_time = time();
$time_diff = $current_time - $order_time;

if ($time_diff > 1800) $status = "Out for Delivery";
if ($time_diff > 3600) $status = "Delivered";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Order</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f2f5;
            padding: 40px;
        }
        .box {
            background: white;
            padding: 25px;
            max-width: 600px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #2c3e50;
        }
        .status {
            margin-top: 20px;
            font-size: 22px;
            color: #27ae60;
            font-weight: bold;
        }
        .info {
            margin-top: 10px;
            color: #555;
        }
        a {
            display: inline-block;
            margin-top: 25px;
            background: #34495e;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
        }
        a:hover {
            background: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>📦 Tracking Order: #<?= $order_id ?></h2>
        <div class="status">Status: <?= $status ?></div>
        <div class="info">
            <p><strong>Item:</strong> <?= $order['food_name'] ?></p>
            <p><strong>Qty:</strong> <?= $order['quantity'] ?> | <strong>Price:</strong> ₹<?= $order['price'] ?></p>
            <p><strong>Ordered on:</strong> <?= $order['order_date'] ?></p>
        </div>
        <a href="my-orders.php">← Back to My Orders</a>
    </div>
</body>
</html>
