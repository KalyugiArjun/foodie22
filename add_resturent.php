<?php

// Add this at the very top of the file
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database_name"; // Change this to your actual DB name

$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $rating = floatval($_POST["rating"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $about = mysqli_real_escape_string($conn, $_POST["about"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $timing = mysqli_real_escape_string($conn, $_POST["timing"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);

    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . time() . "_" . $imageName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO restaurants 
                (name, rating, image, description, about, location, timing, contact, type) 
                VALUES 
                ('$name', $rating, '$targetFilePath', '$description', '$about', '$location', '$timing', '$contact', '$type')";

            if (mysqli_query($conn, $sql)) {
                $successMsg = "🎉 Restaurant added successfully!";
            } else {
                $errorMsg = "❌ Error: " . mysqli_error($conn);
            }
        } else {
            $errorMsg = "❌ Sorry, image upload failed.";
        }
    } else {
        $errorMsg = "❌ Only JPG, JPEG, PNG & GIF files are allowed.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            padding: 30px 40px;
            max-width: 450px;
            width: 100%;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #fff;
        }

        label {
            margin-top: 10px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px 15px;
            margin-top: 5px;
            border-radius: 8px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        input[type="submit"] {
            background-color: #00c9a7;
            color: white;
            padding: 12px;
            margin-top: 20px;
            width: 100%;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #00a387;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .message.success {
            color: #00ffb2;
        }

        .message.error {
            color: #ffb3b3;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>🍽️ Add New Restaurant</h2>

        <?php if (!empty($successMsg)): ?>
            <div class="message success"><?php echo $successMsg; ?></div>
        <?php elseif (!empty($errorMsg)): ?>
            <div class="message error"><?php echo $errorMsg; ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <label>Restaurant Name</label>
            <input type="text" name="name" required>

            <label>Rating (1.0 - 5.0)</label>
            <input type="number" name="rating" min="1" max="5" step="0.1" required>

            <label>Upload Image</label>
            <input type="file" name="image" accept="image/*" required>
            <label>Description</label>
<input type="text" name="description" >

<label>About</label>
<input type="text" name="about" >

<label>Location</label>
<input type="text" name="location" >

<label>Timing</label>
<input type="text" name="timing" placeholder="e.g., 10 AM - 11 PM" >

<label>Contact Number</label>
<input type="text" name="contact" >

<label>Type</label>
<input type="text" name="type" placeholder="e.g., Veg, Non-Veg, Multi-Cuisine" >


            <input type="submit" value="➕ Add Restaurant">
        </form>
    </div>

</body>
</html>
