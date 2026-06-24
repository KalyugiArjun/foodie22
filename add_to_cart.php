<?php
session_start();
require_once 'db_connect.php';

if (!isLoggedIn()) {
    echo "not_logged_in";
    exit;
}

$user_id = clean($conn, $_SESSION['user']);
$food_id = intval($_POST['food_id']);

$check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' AND food_id='$food_id'");

if (mysqli_num_rows($check) > 0) {
    $item     = mysqli_fetch_assoc($check);
    $new_qty  = $item['quantity'] + 1;
    $price    = $item['offer_price'];
    $new_total = $price * $new_qty;
    mysqli_query($conn, "UPDATE cart SET quantity='$new_qty', total='$new_total' WHERE user_id='$user_id' AND food_id='$food_id'");
} else {
    $food = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM biryanis WHERE id='$food_id'"));
    if (!$food) { echo "food_not_found"; exit; }

    $name        = clean($conn, $food['food_name']);
    $image       = clean($conn, $food['image']);
    $offer_price = floatval($food['offer_price']);
    $original    = floatval($food['price']);
    $final_price = ($offer_price > 0) ? $offer_price : $original;

    mysqli_query($conn, "INSERT INTO cart (user_id, food_id, food_name, offer_price, quantity, image, total)
                         VALUES ('$user_id', '$food_id', '$name', '$final_price', 1, '$image', '$final_price')");
}

echo "added";
?>
