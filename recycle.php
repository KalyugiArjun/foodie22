<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$id = $_GET['id'];

// Move back to signup table
$restore = "INSERT INTO signup (id, fname, lname, uname, mob, email, pass)
            SELECT id, fname, lname, uname, mob, email, pass FROM recycle WHERE id=$id";

$delete = "DELETE FROM recycle WHERE id=$id";

if (mysqli_query($conn, $restore) && mysqli_query($conn, $delete)) {
    header("Location: signupshow.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
