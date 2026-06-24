<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$id = $_POST['id'];
mysqli_query($conn, "DELETE FROM cart WHERE id='$id'");
?>
