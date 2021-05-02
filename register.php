<?php
if(isset($_POST["submit"]))
{
  $con=mysqli_connect("localhost","root","","project");
  $type=$_POST["type"];
  $customer_name=$_POST["name"];
  $email=$_POST["mail"];
  $phone=$_POST["phone"];
  $username=$_POST["user"];
  $password=$_POST["password"];
  // $password=mysqli_real_escape_string($con,$_POST["password"]);
  // $password = md5($password); 
  $sql="insert into login (username,password,type) values('$username','$password','$type')";
  mysqli_query($con,$sql);

  if ($type=="Customer")
   {
    $n = mysqli_insert_id($con);
    $sqli="insert into customer (login_id,customer_name,email,phone) values('$n','$customer_name','$email','$phone')";  
   }
  else
  {
    $n = mysqli_insert_id($con);
    $sqli="insert into host (login_id,owner_name,email,phone) values('$n','$customer_name','$email','$phone')";  
  }

  if(mysqli_query($con,$sqli))
  { 
    // echo $n;

?>
    <script>
      alert("Registration completed Successfully");
    </script>

  <?php 
  // header("location:index.php");
  echo "<script>window.open('login.php','_self')</script>";

}
  else { ?>
    <script>
      alert("Registration completed Successfully");
    </script>
  <?php }

mysqli_close($con);
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/ss?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="js1/registration.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!--  <link href="css/fonts-awesome.css" rel="stylesheet"> -->
   <script>
$(document).ready(function(){

   $("#userna").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: 'usercheck.php',
            type: 'post',
            data: {username: username},
            success: function(response){

                $('#uname_response').html(response);

             }
         });
      }else{
        
         $("#uname_response").html("");
      }

    });

 });

$(document).ready(function(){

   $("#mail").keyup(function(){

      var email = $(this).val().trim();

      if(email != ''){

         $.ajax({
            url: 'usercheck.php',
            type: 'post',
            data: {email: email},
            success: function(response){

                $('#email_response').html(response);

             }
         });
      }else{
        
         $("#email_response").html("");
      }

    });

 });
$(document).ready(function(){

   $("#phone").keyup(function(){

      var phone = $(this).val().trim();

      if(phone != ''){

         $.ajax({
            url: 'usercheck.php',
            type: 'post',
            data: {phone: phone},
            success: function(response){

                $('#phone_response').html(response);

             }
         });
      }else{
        
         $("#phone_response").html("");
      }

    });

 });


</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">
    <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" class="user">
                                <hr>
                                <center>
                                 <div class="accounttype" >
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="radio" value="Customer" id="radioOne" name="type" checked/>
                                  <label for="radioOne" class="radio" chec>Customer</label>
                                  &nbsp;
                                  <input type="radio" value="Host" id="radioTwo" name="type" />
                                  <label for="radioTwo" class="radio">Event Host</label>
                                    </div>
                                </div></center>
                              <hr>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name" id="name"
                                            placeholder="Name" required onblur="myname()">
                                            <span id = "consid" ></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="phone" id="phone" maxlength="10" 
                                            placeholder="phone no" required onblur="myphone()">
                                            <div id="phone_response" ></div>
                                              <span id = "consid2"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="mail" id="mail"
                                        placeholder="Email Address" required onblur="mymail()">
                                        <div id="email_response" ></div>
                                          <span id = "consid3"></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="userna" name="user" placeholder="Username" required>
                                            <div id="uname_response" ></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                                    </form>   
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                         
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
 

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js1/sb-admin-2.min.js"></script>
    <script src="js1/sb-admin-2.min.js"></script>
  


</body>

</html>

