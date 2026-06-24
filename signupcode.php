<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: signup.php");
    exit();
}

$fname = clean($conn, $_POST['fname']);
$lname = clean($conn, $_POST['lname']);
$uname = clean($conn, $_POST['uname']);
$mob   = clean($conn, $_POST['mob']);
$email = clean($conn, $_POST['email']);
$pass  = $_POST['pass'];

// Check if email already exists
$check = mysqli_query($conn, "SELECT id FROM signup WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    redirectWithAlert('signup.php', '❌ Ye email pehle se registered hai!');
}

$ins = "INSERT INTO signup(fname, lname, uname, mob, email, pass) 
        VALUES('$fname', '$lname', '$uname', '$mob', '$email', '$pass')";

if (mysqli_query($conn, $ins)) {
    redirectWithAlert('login.php', '✅ Registration successful! Ab login karein.');
} else {
    redirectWithAlert('signup.php', '❌ Registration failed: ' . mysqli_error($conn));
}
?>
