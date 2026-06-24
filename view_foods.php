<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fffbd5, #b20a2c);
            font-family: 'Segoe UI', sans-serif;
        }

        h2, h4 {
            color: #2c3e50;
            font-weight: 700;
            position: relative;
            text-align: center;
        }

        h2::after, h4::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: #e67e22;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .card {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 20px;
            background: #fff;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        .btn-orange {
            background-color: #e67e22;
            color: #fff;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-orange:hover {
            background-color: #cf711f;
        }

        .table thead {
            background-color: #e67e22;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #fef0e3;
        }

        .food-img {
            width: 80px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .no-items {
            font-weight: bold;
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }

            h2, h4 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<div class="container my-5">
    <!-- Add Food Form -->
    <div class="card p-4 mb-5">
        <h4 class="mb-4">Add New Food Item</h4>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Food Name</label>
                    <input type="text" name="food_name" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Price (₹)</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Offer Price (₹)</label>
                    <input type="number" name="offer_price" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" name="add" class="btn btn-orange px-4">Add Item</button>
                </div>
            </div>
        </form>
    </div>

    <!-- View Food Items Table -->
    <div class="card p-4">
        <h2 class="mb-4">Available Food Items</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Offer Price</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "fooddb");
                    $result = mysqli_query($conn, "SELECT * FROM biryanis");

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['food_name']}</td>
                                    <td>₹{$row['price']}</td>
                                    <td>₹{$row['offer_price']}</td>
                                    <td>{$row['description']}</td>
                                    <td><img src='{$row['image']}' class='food-img'></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center no-items'>No food items found.</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
