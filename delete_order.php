<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "Please login to delete your order.";
    exit;
}

if (!isset($_GET['id'])) {
    echo "No order selected.";
    exit;
}

$order_id = $_GET['id'];
$user_id = $_SESSION['user'];

// Ensure user is deleting only their own order
$check = mysqli_query($conn, "SELECT * FROM orders WHERE id='$order_id' AND user_id='$user_id'");
if (mysqli_num_rows($check) == 0) {
    echo "Invalid request.";
    exit;
}

// Delete the order
mysqli_query($conn, "DELETE FROM orders WHERE id='$order_id' AND user_id='$user_id'");
header("Location: my-orders.php?deleted=1");
exit;
?>
