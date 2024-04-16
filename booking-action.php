<?php
include "db.php";
include "user-class.php";
//database and user class access

$user = unserialize($_SESSION["user"]);
$user_id = $user["user_id"];
//gets user_id from session

$room_id = $_GET["room"]; 
//gets the room id from the url
$sql = "SELECT * FROM rooms WHERE 'room_id' = '.$room_id.'"
//sql to fetch that values attached to this room id
$result = mysqli_query($connection , $sql);
$result = $result->fetch_assoc();
//code to execute sql
$per_night = $result["room_cost"];
//this gets how much the room costs for 1 night

$start_date = date_create($_COOKIE["start_date"]);
$end_date = date_create($_COOKIE["end_date"]);
$diff = date_diff($start_date, $end_date);
$diff = $diff->format("%a");
//get the start and end date from the cookie and uses them to calculate the difference between them

$cost = $per_night*$diff;

$sql = "INSERT INTO exam_practise2 ("