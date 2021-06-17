<?php
$con=mysqli_connect("localhost","root","","project");
$customer_id=$_POST['customer_id'];
$date=date("j / m / Y");
$ref= $_GET["razorpay_payment_id"];
$ee=$_POST['eventid'];
$amount = $_POST['amt1'];
$j=0;
foreach($ee as $i)
{
$amt=$amount[$j];
# code...
$commision = ($amt * 5)/100;

 $sql="update event_booking set buy=1, status= 1, remark='Your order is Placed',datebooked='$date', payment = 'Razorpay',paystatus= 'PAID' where event_id=$i and customer_id= $customer_id ";
 $result=mysqli_query($con,$sql)or die($sql);

$sql2 ="insert into payment (customer_id, event_id,amount,commision,paytype,status) values ($customer_id,$i,$amt,$commision,'Razorpay',1)";
$res =mysqli_query($con,$sql2);

$j++;
}

if($result==1)
{
 header( "refresh:5;url=customer_index.php" );
}
else{
?>
<script>alert("Some error Occured.. please Try again later..");</script>
<?php
}
?>

<html>
<body>
  <center>
  <br><br><br>
  <h1> Please wait while we are processing your order....</h1>
  <img src="loader.gif" width="500px" height="auto">
  
  <h4> you will be redirected to dashboard after successful order. Please Wait..</h4>

</body>
</html>


