<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Invalid access.";
    exit();
}

$food_id = $_GET['id'];
$query = "SELECT * FROM biryanis WHERE id='$food_id'";
$result = mysqli_query($conn, $query);
$food = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Now - <?= htmlspecialchars($food['food_name']); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-primary">Order Now: <span class="text-dark"><?= htmlspecialchars($food['food_name']); ?></span></h2>

        <form action="submit-order.php" method="POST">
            <!-- Hidden values to pass backend data -->
            <input type="hidden" name="food_id" value="<?= $food['id']; ?>">
            <input type="hidden" name="food_name" value="<?= htmlspecialchars($food['food_name']); ?>">
            <input type="hidden" name="price" value="<?= $food['offer_price']; ?>">

            <!-- Show Offer Price -->
            <div class="mb-3">
                <label class="form-label fw-bold">Offer Price (Per Item):</label>
                <input type="text" class="form-control" value="₹<?= $food['offer_price']; ?>" disabled>
            </div>

            <!-- Customer Info -->
            <div class="mb-3">
                <label class="form-label">Your Name:</label>
                <input type="text" name="customer_name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number:</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter 10-digit mobile number" pattern="[0-9]{10}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Delivery Address:</label>
                <textarea name="address" class="form-control" rows="3" placeholder="Flat no, street, city..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity:</label>
                <input type="number" name="quantity" value="1" min="1" class="form-control" required>
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check-circle"></i> Confirm Order
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome for icons (optional) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
