<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
$id = $_GET['id'];

// Move user to recycle table before delete
$move = "INSERT INTO recycle (id, fname, lname, uname, mob, email, pass)
         SELECT id, fname, lname, uname, mob, email, pass FROM signup WHERE id=$id";

$delete = "DELETE FROM signup WHERE id=$id";

if (mysqli_query($conn, $move) && mysqli_query($conn, $delete)) {
    header("Location: signupshow.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
