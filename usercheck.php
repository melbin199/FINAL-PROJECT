<?php
  $con=mysqli_connect("localhost","root","","project");

if(isset($_POST['username'])){
   $username = mysqli_real_escape_string($con,$_POST['username']);

   $query = "select count(*) as cntUser from login where username='".$username."'";

   $result = mysqli_query($con,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Username Not Available.</span>";
      }
   
   }

   echo $response;
   die;
}

if(isset($_POST['email'])){
   $email = mysqli_real_escape_string($con,$_POST['email']);

   $query = "select count(*) as cntUser from customer, host where customer.email='".$email."' or host.email='$email'";

   $result = mysqli_query($con,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Email already exists.</span>";
      }
   
   }
   echo $response;
   die;
}

if(isset($_POST['phone'])){
   $phone = mysqli_real_escape_string($con,$_POST['phone']);

   $query = "select count(*) as cntUser from customer, host where customer.phone='".$phone."' or host.phone='$phone'";

   $result = mysqli_query($con,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Phone no already exists.</span>";
      }
   
   }
   echo $response;
   die;
}