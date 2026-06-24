<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Order Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fff4e6, #ffe6cc);
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            color: #e67e22;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 2px solid #e67e22;
            display: inline-block;
            padding-bottom: 5px;
        }
        .table thead {
            background-color: #e67e22;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #fff3e0;
        }
        .btn-action {
            padding: 4px 12px;
            font-size: 0.9rem;
        }
        .badge-status {
            font-size: 0.85rem;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Order Management</h2>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Email</th>
                    <th>Food Name</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "fooddb");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM orders ORDER BY order_date DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['status'] ?? 'Pending';
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['user_id']}</td>
                            <td>{$row['food_name']}</td>
                            <td>{$row['quantity']}</td>
                            <td>₹{$row['total']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['mobile']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['order_date']}</td>
                            <td><span class='badge bg-" . ($status === 'Delivered' ? "success" : ($status === 'Confirmed' ? "primary" : "warning")) . " badge-status'>{$status}</span></td>
                            <td>
                                <form method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='order_id' value='{$row['id']}' />
                                    <select name='status' class='form-select form-select-sm mb-1'>
                                        <option value='Pending' " . ($status === 'Pending' ? 'selected' : '') . ">Pending</option>
                                        <option value='Confirmed' " . ($status === 'Confirmed' ? 'selected' : '') . ">Confirmed</option>
                                        <option value='Delivered' " . ($status === 'Delivered' ? 'selected' : '') . ">Delivered</option>
                                    </select>
                                    <button type='submit' name='update_status' class='btn btn-sm btn-success btn-action'>Update</button>
                                </form>
                                <form method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='order_id' value='{$row['id']}' />
                                    <button type='submit' name='delete_order' class='btn btn-sm btn-danger btn-action'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11' class='text-danger'>No orders found.</td></tr>";
            }

            if (isset($_POST['update_status'])) {
                $oid = $_POST['order_id'];
                $new_status = $_POST['status'];
                mysqli_query($conn, "UPDATE orders SET status='$new_status' WHERE id='$oid'");
                echo "<script>location.reload();</script>";
            }

            if (isset($_POST['delete_order'])) {
                $oid = $_POST['order_id'];
                mysqli_query($conn, "DELETE FROM orders WHERE id='$oid'");
                echo "<script>location.reload();</script>";
            }

            mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
