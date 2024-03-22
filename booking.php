<?php
include "db.php";
session_start();

if (isset($_SESSION["user"])) {
  $user = unserialize($_SESSION["user"]);
}

$sql = "SELECT * FROM rooms";
$result = mysqli_query($connection, $sql);

?>

<form action="booking.php" method="get">
  <label for="start_date">start date:</label>
  <input type="date" id="start_date" name="start_date">
  <br/>
  <br/>
  <label for="end_date">end date:</label>
  <input type="date" id="end_date" name="end_date">
  <input type="submit" value="search">

  <?php if (isset($_GET["end_date"]) && isset($_GET["start_date"])):?> 
    <div style="overflow:scroll; width: 300px; height: 50%;">
    <table>
      <tr>
        <th>Room number</th>
        <th>Room capacity</th>
        <th>price per night</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?=$row["room_num"]?></td>
        <td><?=$row["room_cap"]?></td>
        <td><?=$row["room_cost"]?></td>
      </tr>
        <?php endwhile;?>
      </table>
    </div>
  <?php endif;?>
</form>