<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");

$name = $_POST['name'];

$rating = $_POST['rating'];
$best_dish = $_POST['best_dish'];

$image = $_FILES['image']['name'];
$dish_image = $_FILES['dish_image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
move_uploaded_file($_FILES['dish_image']['tmp_name'], "uploads/" . $dish_image);

$sql = "INSERT INTO restaurants (name, image, rating, best_dish, dish_image)
        VALUES ('$name', '$image', '$rating', '$best_dish', '$dish_image')";

if (mysqli_query($conn, $sql)) {
    header("Location: restaurant.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
