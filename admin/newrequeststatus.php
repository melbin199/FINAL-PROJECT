<?php
session_start();
$name=$_SESSION["username"];
$con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
$id=$_GET['id'];
$hid=$_GET['hid'];

$sql="update events set approve = 1 where host_id = '$id' and event_id = '$hid'";
$query=mysqli_query($con,$sql);
header("location:newrequest.php");
 ?>