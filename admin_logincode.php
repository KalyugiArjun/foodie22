<?php
session_start();
require_once 'db_connect.php';

$username = clean($conn, $_POST['username']);
$password = $_POST['password'];

$res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'"));

if ($res && $res['password'] === $password) {
    $_SESSION['admin'] = $username;
    header("Location: admin_dashboard.php");
    exit();
} else {
    redirectWithAlert('admin_login.php', '❌ Invalid credentials!');
}
?>
