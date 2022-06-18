<?php
date_default_timezone_set('Asia/Tokyo');
echo date("Y-m-d H:i:s");
echo '<br>';
echo date("Y-m-d H:i:s",strtotime("+3 day"));
echo '<br>';
echo date("Y-m-d H:i:s",strtotime("-12 hour"));
echo '<br>';

date_default_timezone_set('Asia/Tokyo');
$today = new DateTime('now');
$day = new DateTime('2020-01-01');
$diff = $day->diff($today);
echo $diff->days
?>

