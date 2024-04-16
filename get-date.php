<?php
setcookie("start_date",$_GET["start_date"]);
setcookie("end_date",$_GET["end_date"]);
header("Location:booking.php");