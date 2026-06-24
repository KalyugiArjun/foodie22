<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['user'])) {
    echo "<script>alert('User not logged in'); window.location.href='login.php';</script>";
    exit();
}

$email = $_SESSION['user'];
$res = mysqli_query($conn, "SELECT * FROM favourites WHERE user_id = '$email'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favourite Foods</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff8f0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #ff6347;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: inline-block;
            width: 220px;
            vertical-align: top;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 10px 0 5px;
            font-size: 20px;
            color: #333;
        }

        .card p {
            color: #888;
            margin-bottom: 10px;
        }

        .btn {
            background: #ff4d4d;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background: #e60000;
        }
    </style>
</head>
<body>
    <h2>Your Favourite Foods</h2>

    <?php
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "
            <div class='card'>
                <img src='{$row['image']}' alt=''>
                <h3>{$row['food_name']}</h3>
                <p>₹ {$row['price']}</p>
                <form method='post' action='remove_fav.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button class='btn'>Remove</button>
                </form>
            </div>
            ";
        }
    } else {
        echo "<p style='text-align:center; color:gray;'>No favourites added yet.</p>";
    }

    mysqli_close($conn); // ✅ Always close connection
    ?>
</body>
</html>
