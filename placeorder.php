<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "fooddb");
$fid = $_REQUEST['id'];

$query = "SELECT * FROM food WHERE id = $fid";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Place Order - <?php echo $row['foodname']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f0f2f5, #dff6e7);
      padding: 40px;
    }
    .order-box {
      max-width: 750px;
      margin: auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      padding: 35px;
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(50px);}
      to {opacity: 1; transform: translateY(0);}
    }
    h2 {
      text-align: center;
      color: #28a745;
      margin-bottom: 30px;
    }
    .food-details {
      display: flex;
      gap: 20px;
      margin-bottom: 25px;
    }
    .food-details img {
      width: 160px;
      height: 130px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #ddd;
    }
    .info {
      flex: 1;
    }
    .info h3 {
      margin-bottom: 10px;
      color: #333;
    }
    .info p {
      margin: 5px 0;
      font-size: 16px;
    }
    input[type="text"],
    input[type="tel"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 10px 15px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .total {
      font-weight: bold;
      font-size: 18px;
      color: green;
      margin-top: 10px;
    }
    .btn {
      width: 100%;
      padding: 12px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 18px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <div class="order-box">
    <h2>🎉 Place Your Order 🎉</h2>

    <form action="placeorder.php" method="post">
      <div class="food-details">
        <img src="<?php echo $row['image']; ?>" alt="Food Image">
        <div class="info">
          <h3><?php echo $row['foodname']; ?></h3>
          <p>Price: ₹<span id="price"><?php echo $row['price']; ?></span></p>
          <label for="qty">Quantity:</label>
          <input type="number" name="qty" id="qty" value="1" min="1" onchange="calcTotal()" required>
          <div class="total">Total: ₹<span id="total"><?php echo $row['price']; ?></span></div>
        </div>
      </div>

      <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="food_name" value="<?php echo $row['foodname']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">

      <input type="text" name="name" placeholder="Your Name" required>
      <input type="tel" name="mobile" placeholder="Mobile Number" required>
      <textarea name="address" rows="3" placeholder="Delivery Address" required></textarea>

      <button type="submit" class="btn">Confirm & Place Order</button>
    </form>
  </div>

  <script>
    function calcTotal() {
      const price = parseInt(document.getElementById('price').innerText);
      const qty = parseInt(document.getElementById('qty').value);
      document.getElementById('total').innerText = price * qty;
    }
  </script>

</body>
</html>
