<?php 

    $con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
    $id=$_GET['remove'];
    $sql="update event_booking set status=0 where event_id=$id and booking_id= (select booking_id from event_booking where event_id=$id and buy=0 and status =1 Limit 1)";
    $result=mysqli_query($con,$sql)or die($sql);
    header('location:cart.php');

?>