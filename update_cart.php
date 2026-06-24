<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");

$id = $_POST['id'];
$delta = $_POST['delta'];

mysqli_query($conn, "UPDATE cart SET quantity = quantity + $delta WHERE id='$id'");
mysqli_query($conn, "UPDATE cart SET total = offer_price * quantity WHERE id='$id'");
mysqli_query($conn, "DELETE FROM cart WHERE quantity <= 0");
?>
