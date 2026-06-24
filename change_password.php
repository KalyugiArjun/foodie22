<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fooddb");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_POST['update'])) {
    $old = $_POST['old'];
    $new = $_POST['new'];

    $admin = $_SESSION['admin'];
    $check = mysqli_query($conn, "SELECT * FROM admin WHERE username='$admin' AND password='$old'");

    if (mysqli_num_rows($check) == 1) {
        mysqli_query($conn, "UPDATE admin SET password='$new' WHERE username='$admin'");
        $msg = "Password updated successfully!";
    } else {
        $msg = "Old password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
  <div class="container" style="max-width: 500px;">
    <h3>Change Password</h3>
    <?php if (isset($msg)) echo "<div class='alert alert-info'>$msg</div>"; ?>
    <form method="post">
      <div class="mb-3">
        <label>Old Password</label>
        <input type="password" name="old" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>New Password</label>
        <input type="password" name="new" class="form-control" required>
      </div>
      <button name="update" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
