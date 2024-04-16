<?php
include "db.php";
include "user-class.php";
$username = "user";//set username

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$email = $row["email"];
$password = $row["password"];

$u = new User($connection, $email, $password, $username);
$u -> authenticate();

if ($u->is_logged_in()) {
    session_start();
    $u = serialize($u);
    $_SESSION["user"] = $u;
    header("Location:booking.php");
}