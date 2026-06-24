<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "Please login to view cart.";
    exit;
}

$user_id = $_SESSION['user'];
$result = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 20px;
      background: #f2f2f2;
      color: #333;
    }

    h2 {
      text-align: center;
      color: #222;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin-top: 30px;
    }

    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    img {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 6px 10px;
      margin: 0 5px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #388E3C;
    }

    .remove-btn {
      background-color: #e53935;
    }

    .remove-btn:hover {
      background-color: #c62828;
    }

    h3 {
      text-align: right;
      padding-right: 20px;
      font-size: 20px;
      color: #222;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        background-color: white;
      }

      td, th {
        text-align: left;
        padding: 10px;
      }

      td::before {
        font-weight: bold;
        display: inline-block;
        width: 100px;
      }

      td:nth-of-type(1)::before { content: "Image"; }
      td:nth-of-type(2)::before { content: "Food"; }
      td:nth-of-type(3)::before { content: "Offer_Price"; }
      td:nth-of-type(4)::before { content: "Quantity"; }
      td:nth-of-type(5)::before { content: "Total"; }
      td:nth-of-type(6)::before { content: "Actions"; }

      h3 {
        text-align: center;
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>

<h2>Your Cart Items</h2>

<table>
<tr>
  <th>Image</th>
  <th>Food</th>
  <th>Offer Price</th>
  <th>Quantity</th>
  <th>Total</th>
  <th>Actions</th>
</tr>

<?php
$grand_total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $grand_total += $row['total'];
    echo "<tr>
        <td><img src='{$row['image']}' alt='Food'></td>
        <td>{$row['food_name']}</td>
        <td>₹{$row['offer_price']}</td>
        <td>
          <button onclick='updateQty({$row['id']}, -1)'>−</button>
          <strong>{$row['quantity']}</strong>
          <button onclick='updateQty({$row['id']}, 1)'>+</button>
        </td>
        <td>₹{$row['total']}</td>
        <td><button class='remove-btn' onclick='removeFromCart({$row['id']})'>Remove</button></td>
      </tr>";
}
?>

</table>

<h3>Grand Total: ₹<?= $grand_total ?></h3>

<?php if ($grand_total > 0): ?>
  <div style="text-align: right; padding-right: 20px; margin-top: 10px;">
    <form action="checkout.php" method="post">
      <button type="submit" class="checkout-btn" style="
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
      ">Proceed to Checkout</button>
    </form>
  </div>
<?php endif; ?>

<script>
function updateQty(id, delta) {
  fetch('update_cart.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'id=' + id + '&delta=' + delta
  }).then(() => location.reload());
}

function removeFromCart(id) {
  fetch('remove_from_cart.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'id=' + id
  }).then(() => location.reload());
}
</script>

</body>
</html>
