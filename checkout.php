<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "Please login to continue.";
    exit;
}

$user_id = $_SESSION['user'];
$cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
$grand_total = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f9f9f9;
    }
    h2 {
      text-align: center;
    }
    form {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .cart-summary {
      background: #f0f0f0;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .cart-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
    }
    .btn {
      background: #28a745;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      transition: background 0.3s;
    }
    .btn:hover {
      background: #218838;
    }
  </style>
</head>
<body>

<h2>Checkout</h2>

<form method="POST" action="submit_order.php">
  <div class="cart-summary">
    <h3>Order Summary:</h3>
    <?php while ($row = mysqli_fetch_assoc($cart_query)): ?>
      <div class="cart-item">
        <span><?= $row['food_name'] ?> x <?= $row['quantity'] ?></span>
        <span>₹<?= $row['total'] ?></span>
      </div>
      <?php $grand_total += $row['total']; ?>
    <?php endwhile; ?>
    <hr>
    <div class="cart-item"><strong>Total:</strong> <strong>₹<?= $grand_total ?></strong></div>
  </div>

  <input type="text" name="customer_name" placeholder="Full Name" required>
  <input type="text" name="mobile" placeholder="Mobile Number" required pattern="[0-9]{10}">
  <textarea name="address" placeholder="Full Delivery Address" rows="4" required></textarea>

  <input type="hidden" name="total_amount" value="<?= $grand_total ?>">

  <button class="btn" type="submit">Place Order</button>
</form>

</body>
</html>
