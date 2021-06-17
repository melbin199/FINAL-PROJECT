<?php
  $con=mysqli_connect("localhost","root","","project");

if(isset($_POST['event_date']))
{
   $date = mysqli_real_escape_string($con,$_POST['event_date']);
   $event_id = mysqli_real_escape_string($con,$_POST['event_id']);

  		 /*   $SQL2="SELECT HOST_ID FROM HOST WHERE LOGIN_ID=$LOGIN_ID";
            $RESULT2=MYSQLI_QUERY($CON,$SQL2)OR DIE($SQL2); 
            $ROW2=MYSQLI_FETCH_ARRAY($RESULT2);
            $HOST_ID=$ROW2['HOST_ID'];

            $SQL1="SELECT EVENT_ID FROM EVENTS WHERE HOST_ID = $ID";
            $RESULT1=MYSQLI_QUERY($CON,$SQL1)OR DIE($SQL1); 
            $ROW1=MYSQLI_FETCH_ARRAY($RESULT1);
            $EVENT_ID=$ROW1['EVENT_ID'];*/

            $sql3="select * from event_booking  where event_id = $event_id and status = 1 and buy = 1";
            $result3=mysqli_query($con,$sql3)or die($sql3); 
            $row3=mysqli_fetch_array($result3);
            $dateb=$row3['date'];

            if($date == $dateb){$response = "Date not available!!! Try again";}
            else{$response = "Date available";}
            

   echo $response;
   die;
}