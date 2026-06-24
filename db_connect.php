<?php
// ============================================================
//  FOODIE - Secure Database Connection File
//  File: db_connect.php
//  Include this file in every PHP page instead of writing
//  mysqli_connect() repeatedly.
// ============================================================

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');           // Apna password yahan daalein
define('DB_NAME', 'fooddb');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("❌ Database Connection Failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// ============================================================
//  SECURE HELPER FUNCTIONS
// ============================================================

/**
 * SQL Injection se bachao - sab inputs ke liye use karein
 */
function clean($conn, $data) {
    return mysqli_real_escape_string($conn, trim(strip_tags($data)));
}

/**
 * User logged in hai ya nahi check karo
 */
function isLoggedIn() {
    return isset($_SESSION['user']);
}

/**
 * Admin logged in hai ya nahi check karo
 */
function isAdminLoggedIn() {
    return isset($_SESSION['admin']);
}

/**
 * Redirect with message
 */
function redirectWithAlert($url, $message) {
    echo "<script>alert('$message'); window.location.href='$url';</script>";
    exit();
}
?>
