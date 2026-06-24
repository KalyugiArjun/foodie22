<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "Please login.";
    exit;
}

$user_id = $_SESSION['user'];
$customer_name = $_POST['customer_name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$total = $_POST['total'];
$order_date = date("Y-m-d H:i:s");

$cart_items = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
while ($item = mysqli_fetch_assoc($cart_items)) {
    $food_id = $item['food_id'];
    $food_name = $item['food_name'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $item_total = $item['total'];

    $insert = "INSERT INTO orders (user_id, food_id, food_name, price, quantity, total, customer_name, mobile, address, order_date)
               VALUES ('$user_id', '$food_id', '$food_name', '$price', '$quantity', '$item_total', '$customer_name', '$mobile', '$address', '$order_date')";
    mysqli_query($conn, $insert);
}

// Clear the cart after order placed
mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

echo "<script>alert('✅ Order placed successfully!'); window.location.href='userdashboard.php';</script>";
?>
