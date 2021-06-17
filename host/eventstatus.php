<?php
session_start();
$name=$_SESSION["username"];
$con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
$cid=$_GET['cid'];
$eid=$_GET['eid'];
$bookid = $_GET['bookid'];

 $sql="update event_booking set reference = 'ORDER COMPLETED', eventstatus= 1 where customer_id = $cid and event_id = $eid and booking_id = $bookid";
 $query=mysqli_query($con,$sql);

//  $sql2 ="update payment set status = 1 where event_id = $id and customer_id=customer_id";
// $res =mysqli_query($con,$sql2);
header("location:pending.php");
 ?>