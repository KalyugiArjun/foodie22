<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$email = clean($conn, $_POST['email']);
$pass  = $_POST['pass'];

if (empty($email) || empty($pass)) {
    redirectWithAlert('login.php', '❌ Email aur Password required hai!');
}

$sel = "SELECT * FROM signup WHERE email='$email'";
$r   = mysqli_query($conn, $sel);

if ($res = mysqli_fetch_assoc($r)) {
    if ($res['pass'] === $pass) {
        $_SESSION['user']     = $res['email'];
        $_SESSION['user_id']  = $res['id'];
        $_SESSION['username'] = $res['fname'] . ' ' . $res['lname'];
        header("Location: userdashboard.php");
        exit();
    } else {
        redirectWithAlert('login.php', '❌ Password galat hai!');
    }
} else {
    redirectWithAlert('login.php', '❌ Email registered nahi hai!');
}
?>
