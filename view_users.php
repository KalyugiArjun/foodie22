<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 60px 15px;
        }

        h2 {
            color: #2c3e50;
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 40px;
            position: relative;
            text-align: center;
        }

        h2::after {
            content: '';
            width: 80px;
            height: 4px;
            background: #3498db;
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .card {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 20px;
            padding: 30px;
            background: #ffffff;
            animation: slideUp 0.6s ease-in-out;
        }

        @keyframes slideUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .table thead {
            background-color: #3498db;
            color: white;
            font-size: 1rem;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #ecf0f1;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .no-users {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .card {
                padding: 20px 15px;
            }

            h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Registered Users</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "fooddb");

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM signup";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['fname']}</td>
                                    <td>{$row['uname']}</td>
                                    <td>{$row['mob']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['pass']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center no-users'>No users found</td></tr>";
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
