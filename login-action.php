<?php
include "db.php";
include "user-class.php";
$username = "user";//set username

$sql="SELECT * FROM users WHERE username='".$username."'"; //search the users table for username
$result = mysqli_query($connection , $sql);
$result = $result->fetch_assoc();
$email = $result["email"];
$password = $result["password"];

$u = new User($connection, $email, $password, $username);
$u -> authenticate();

if ($u->is_logged_in()) {
    session_start();
    $u = serialize($u);
    $_SESSION["user"] = $u;
    header("Location:booking.php");
}