<?php
session_start();
$sesid = $_SESSION['user'];
$conn = mysqli_connect("localhost","root","","fooddb");
if(isset($_SESSION['user']))
{
    session_destroy();
    header("location:login.php");
}
else{
    echo "logout failed";
}


?>