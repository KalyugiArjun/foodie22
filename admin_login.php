<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(2px);
    }

    .login-box {
      background: rgba(255, 255, 255, 0.96);
      padding: 40px;
      max-width: 420px;
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0,0,0,0.3);
      animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-box h2 {
      text-align: center;
      color: #d35400;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-control {
      border-radius: 8px;
      box-shadow: none;
      transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
      border-color: #d35400;
      box-shadow: 0 0 0 0.2rem rgba(211, 84, 0, 0.25);
    }

    .btn-login {
      background-color: #d35400;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }

    .btn-login:hover {
      background-color: #e67e22;
      transform: scale(1.03);
    }

    .alert {
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Admin Panel Login</h2>

    <?php if (isset($error)) echo "<div class='alert alert-danger text-center'>$error</div>"; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter admin name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>

      <button type="submit" name="login" class="btn btn-login w-100">🔐 Login</button>
    </form>
  </div>

</body>
</html>
