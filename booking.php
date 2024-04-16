<?php
include "db.php";
session_start();

if (isset($_SESSION["user"])) {
  $user = unserialize($_SESSION["user"]);
}

//if (isset($_COOKIE["start_date"] && $_COOKIE["end_date"])) {
// $start_date = $_COOKIE["start_date"];
//  $end_date = $_COOKIE["end_date"];
//  $sql =
//}

$sql = "SELECT * FROM rooms";
$result = mysqli_query($connection, $sql);

?>

<form action="get-date.php" method="get">
  <label for="start_date">start date:</label>
  <input type="date" id="start_date" name="start_date">
  <br/>
  <br/>
  <label for="end_date">end date:</label>
  <input type="date" id="end_date" name="end_date">
  <input type="submit" value="search">
</form>
  <?php if (isset($_COOKIE["start_date"])):?> 
    <div style="overflow:scroll; width: 400px; height: 50%;">
    <table>
      <tr>
        <th>Room number</th>
        <th>Room capacity</th>
        <th>price per night</th>
        <th></th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?=$row["room_num"]?></td>
        <td><?=$row["room_cap"]?></td>
        <td><?=$row["room_cost"]?></td>
        <td><a href="booking-action.php?room=<?=$row["room_id"]?>">Book this one</a></td>
      </tr>
        <?php endwhile;?>
      </table>
    </div>
  <?php endif;?>
</form>