<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user'];
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;

    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $order_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO orders (user_id, food_id, food_name, price, quantity, total, customer_name, mobile, address, order_date)
            VALUES ('$user_id', '$food_id', '$food_name', '$price', '$quantity', '$total', '$customer_name', '$mobile', '$address', '$order_date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your order has been placed successfully!'); window.location.href='my-orders.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
