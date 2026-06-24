<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (isset($_POST['submit'])) {
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $offer_price = $_POST['offer_price'];
    $description = $_POST['description'];

    // Upload image
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_path = "uploads/" . $image;

    if (move_uploaded_file($tmp_name, $upload_path)) {
        $sql = "INSERT INTO fooditems (food_name, image, price, offer_price, description) 
                VALUES ('$food_name', '$upload_path', '$price', '$offer_price', '$description')";

        if (mysqli_query($conn, $sql)) {
            header("location:addfood.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>
