<?php
// session_start();
// $_SESSION['msg']="";

if(isset($_POST['login']))
{
  $con=mysqli_connect("localhost","root","","project");
  $username=$_POST["uname"];
  $password=$_POST["password"];
   // $password=mysqli_real_escape_string($con,$_POST["password"]);
  // $passwordd = md5($password); 
  $sql="select * from login where username='$username' and password='$password'";
  $res=mysqli_query($con,$sql)or die($sql);
  if(mysqli_num_rows($res)>0)
  {
    session_start();
    while($row=mysqli_fetch_array($res))
    {
         $r =$row['username'];
         $_SESSION['username']=$r;
     
      if($row['type']=='admin')
      {
        $_SESSION['admin']='admin';
        // header("location:admin/admin_index.php");
        echo "<script>window.open('admin/admin_index.php','_self')</script>";

      }
      elseif($row['type']=='Customer')
    {
        // echo "fine";
        $_SESSION['customer']="customer";
        // header("location:customer/customer_index.php");
        // echo "<script>location.herf='customer/customer_index.php'</script>";
         echo "<script>window.open('customer/customer_index.php','_self')</script>";
      }
      elseif($row['type']=='Host')
      {
        $_SESSION['host']='host';
        // header("location:host/host_index.php");
       echo "<script>window.open('host/host_index.php','_self')</script>";

      }
   }
 }
   else
   {
    ?>
      <script>
      alert("invalid username or password");
    </script>
<?php
   }
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="uname" name="uname" aria-describedby="emailHelp"
                                                placeholder="Username" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required="">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        
                                       
                                        <hr>
                                        <a href="www.gmail.com" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="www.Facebook.com" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                     </form> 
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot_password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
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

</body>

</html>
