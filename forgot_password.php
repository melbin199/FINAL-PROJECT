<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript">
        function imail()
  {
      var emai=document.forms["regform"]["emaile"];
    var mail = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z]+(?:\.[a-zA-Z]{2,})$/;
    if(emai.value == "")
    {
      document.getElementById('emaile').innerHTML="<span class='error'>Please enter a email</span>"
      emai.focus();
    }

    if(emai.value.match(mail))
    {
      document.getElementById('u').innerHTML="<span ></span>";
      // document.regform.ph.focus();
      return true;
    }

    else
    {
      document.getElementById('u').innerHTML="<span class='error'>Please enter a valid email</span>";
      emai.focus();
      return false;
    }
  }
    </script>

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
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" action="send-recovery-mail.php" method="post" name="regform">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="emaile" name="emaile" onblur="imail()" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                                <center>
                                                          
                                              <span id="u"style="color:red; font-size:20px;">

                                            <?php
                                            session_start();
                                            $msg=$_SESSION['msg'];
                                            echo $msg;
                                            ?>
                                                </center>
                                        </div>
                                        <input type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block">
                                            
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
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

</body>

</html>