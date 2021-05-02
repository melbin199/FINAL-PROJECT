<?php
session_start();
?>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
   <link href="css1/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
	function pass10()
    {
      var paswd = document.forms["update"]["pass1"];
      var cpaswd = document.forms["update"]["pass2"];

      if(paswd.value == "")
      {
        document.getElementById('j').innerHTML="<span class='error'>Please enter a password</span>";
        // cpaswd.focus();
      }
      else
      	document.getElementById('j').innerHTML="<span></span>";
    
  }

      function pass20()
      {
      var paswd = document.forms["update"]["pass1"];
      var cpaswd = document.forms["update"]["pass2"];

        if(cpaswd.value == "")
      {
        document.getElementById('k').innerHTML="<span class='error'>Please enter a password</span>";
        cpaswd.focus();
      }
      if(paswd.value != cpaswd.value)
      {
          document.getElementById('k').innerHTML="<span class='error'>password doesn't match</span>";
        cpaswd.focus();
        return false;
      }
      else
      {
        document.getElementById('k').innerHTML="<span></span>";
        document.getElementById('k').innerHTML="<span></span>";
        return true;
      }
    }
</script>
</head>
<style media="screen">
body

.p{

  height:100%;
  width: 100 %;
	margin-top: 0;
}
</style>
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
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1><br>
                                    </div>
	<!-- <div class="p"> -->


<!-- <div style="width:700px; margin:50 auto;"> -->

<?php
$con=mysqli_connect("localhost","root","","project");
$error="";
if (isset($_GET["key"]) && isset($_GET["email"])
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
// echo $email;
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
	$_SESSION['msg']="Link Expired";
$error .= '<h2>Invalid Link</h2>

<p>The link is invalid/expired. Either you did not copy the correct link from the email,
or you have already used the key in which case it is deactivated.</p>
<p><a href="http://localhost/mainpro/forgot_password.php">Click here</a> to reset password.</p>';
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
	<form method="post" action="" class="form-group-sm container" name="update">
	<input type="hidden"   name="action" value="update" />
	<br /><br />
	<label><strong>Enter New Password:</strong></label><br />
	<input type="text" class="form-control form-control-user" name="pass1" id="pass1" onblur="pass10()" required>
	 <center><span id="j"style="color:red; font-size:20px;">  </center>
    <br />

	<label><strong>Re-Enter New Password:</strong></label><br />
	<input type="password" name="pass2" class="form-control form-control-user"  id="pass2" onblur="pass20()" required "/>
	 <center><span id="k"style="color:red; font-size:20px;">  </center>
    <br /><br />
	<input type="hidden" name="email" value="<?php echo $email;?>"/>
	<input type="submit" id="reset" class="btn btn-primary btn-user btn-block" value="Reset Password" />
	</form>
	                  <hr>
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
<!-- 
    </div> -->

<?php
}else{
	$_SESSION['msg']="Link Expired";
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
				}
		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br />";
	}
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
		}
	if($error!=""){
		echo "<div class='error'>".$error."</div><br />";
		}else{

// $pass1 = md5($pass1);
$sql="select login_id from customer where email='$email'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$loginid=$row['login_id'];
mysqli_query($con,"UPDATE `login` SET `password`='".$pass1."' WHERE `login_id`='".$loginid."';");

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="http://localhost/mainpro/login.php">Click here</a> to Login.</p></div><br />';
		}
}
?>


<br /><br />
</div>
	</div>
</body>

</html>