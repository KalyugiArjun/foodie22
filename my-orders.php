<?php 
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "fooddb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Session check
if (!isset($_SESSION['user'])) {
    echo "Please login to view your orders.";
    exit;
}

$user_id = $_SESSION['user'];
$result = mysqli_query($conn, "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Orders</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #eef2f3;
      padding: 40px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 25px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #34495e;
      color: white;
    }
    tr:hover {
      background-color: #f9f9f9;
    }
    .btn {
      padding: 7px 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
    }
    .track {
      background-color: #27ae60;
      color: white;
    }
    .track:hover {
      background-color: #219150;
    }
    .delete {
      background-color: #e74c3c;
      color: white;
    }
    .delete:hover {
      background-color: #c0392b;
    }
    .no-orders {
      text-align: center;
      color: #888;
      padding: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>📦 My Orders</h2>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table>
      <tr>
        <th>Order Date</th>
        <th>Item</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['order_date'] ?></td>
          <td><?= $row['food_name'] ?></td>
          <td><?= $row['quantity'] ?></td>
          <td>₹<?= $row['price'] ?></td>
          <td>₹<?= $row['total'] ?></td>
          <td>
            <a href="track_order.php?id=<?= $row['id'] ?>" class="btn track">Track</a>
            <a href="delete_order.php?id=<?= $row['id'] ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <div class="no-orders">😢 You haven’t placed any orders yet.</div>
  <?php endif; ?>
</div>

</body>
</html>
