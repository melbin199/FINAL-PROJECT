<?php
session_start();
$name=$_SESSION["username"];
$con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
$hid=$_GET['hid'];
$eid=$_GET['eventid'];

$sql="update events set approve = 0 where host_id = $hid and event_id = $eid";
$query=mysqli_query($con,$sql);
header("location:eventdetails.php");
 ?>