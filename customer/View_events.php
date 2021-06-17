<?php
session_start();
if (!isset($_SESSION['username'])) 
{
    header('location:../login.php');
    # code...
}           


            $id=$_SESSION['id'];//product id
            $user=$_SESSION['username'];
            $con=mysqli_connect("localhost","root","","project");

            $sql1="select login_id from login where username='$user'";
            $result1=mysqli_query($con,$sql1)or die($sql1); 
            $row1=mysqli_fetch_array($result1);
            $login_id=$row1['login_id'];

                
            $sql2="select customer_id from customer where login_id=$login_id";
            $result2=mysqli_query($con,$sql2)or die($sql2); 
            $row2=mysqli_fetch_array($result2);
            $customer_id=$row2['customer_id'];

            $sql2="select Count(*) from event_booking where status=1 and customer_id=$customer_id and buy =0";
 // $sql2="select Count(*) from event_booking where status=1 and customer_id=$customer_id"
            $result1=mysqli_query($con,$sql2)or die($sql2);
            $row=mysqli_fetch_array($result1);
            $cart=$row['Count(*)'];


?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">
    <link href="css1/division.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
  $("#event_date").blur(function(){
    
    var event_date = $(this).val().trim();
    var event_id = $("#event_id").val();

      if(event_date != ''){

         $.ajax({
            url: 'eventdatecheck.php',
            type: 'post',
            data: {event_id: event_id,event_date:event_date},
            success: function(response){

                alert(response);

             }
         });
      }
  });
});
</script>

</head>
<script type="text/javascript">
    function one(a)
     {

 	 document.getElementById('resulte').value=a;
	}

function datepick()
{
	const today1 = new Date()
const tomorrow = new Date(today1)
tomorrow.setDate(tomorrow.getDate() + 2)
var today = new Date(tomorrow).toISOString().split('T')[0];
document.getElementsByName("date")[0].setAttribute('min', today);

}	


   $("#event_date").blur(function(){

      var event_date = $(this).val().trim();
      var event_id= $("#event_id").val();
      alert("")

      if(event_date != ''){

         $.ajax({
            url: 'eventdatecheck.php',
            type: 'post',
            data: {event_date: event_date},
            success: function(response){

               alert("");

             }
         });
      }else{
        
        alert("");
      }

    });


</script>

<?php
if (isset($_POST['submit'])) //bookings to booking table
 {
    $id=$_POST['result'];
    $venue=$_POST['venue'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    $landmark=$_POST['landmark'];

    $sql1="insert into event_booking(`event_id`,`customer_id`,`venue`,`time`,`date`,`landmark`,`status`)values($id,$customer_id,'$venue','$time','$date','$landmark',1)";
mysqli_query($con,$sql1) or die($sql1);
?>
    <script type="text/javascript">
        alert("Your Booking is addED to cart");
    </script>
    
    <?php
            
    // header('location:customer_index.php');
}
?>
<style type="text/css">
.asd{
    border-radius:5px ;
     height:30px; 
     width: 400px;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="customer_index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Big Event <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="customer_index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>CUSTOMER</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="customer_index.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-address-book"></i>
                    <span>Profile</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Customer Components:</h6>
                    <a class="collapse-item" href="customer_edit.php">Edit Details</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-truck"></i>
                    <span>Event Bookings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Event:</h6>
                        <a class="collapse-item" href="Cart.php">cart</a>
                        <a class="collapse-item" href="Myorders.php">My Orders</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Activity</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Raise Ticket:</h6>
                        <a class="collapse-item" href="custfeed.php">Feedback</a>
                        <a class="collapse-item" href="changepass.php">change password</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>

            <!-- Sidebar Message -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        

        </ul>
        <!-- End of Sidebar ithu vare same -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                              <a class="nav-link dropdown-toggle" href="Cart.php" >
                                <i class="fa fa-shopping-cart"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter" href="Cart.php"><?php echo "$cart" ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    CART
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                </a>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome <?php echo "$user";?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- view events for the product -->
<div class="ser_agile">
<div class="container">
<form id="forme" action="" method="post">
              <input type="hidden" name="result" id="resulte">
            <!-- <h2 class="heading-agileinfo"><br><br><span><hr>Events is a professionally managed Event</span></h2> -->
            
            <div id="wrap">
    <div id="columns" class="columns_8">
        <?php
            $con=mysqli_connect("localhost","root","","project");
            $sql="select * from events where event_id=$id";
            $result=mysqli_query($con,$sql); 
            foreach($result as $row)
                {
                    ?>
    <div style="margin-top: 30px; color: black;">
        <h1 style=""><strong><?php echo $row['event_name']?></strong></h1>
  
    </div>
  <figure>          
  <img src="../image/<?php echo $row['pic1'];?>" >
  </figure>
  <figure>          
  <img src="../image/<?php echo $row['pic2'];?>" >
  </figure>
    <figure>            
  <img src="../image/<?php echo $row['pic3'];?>" >
  </figure>
    <figure>           
  <img src="../image/<?php echo $row['pic4'];?>" >
  </figure>
    <!-- <figure>           
  <img src="../image/<?php echo $row['pic4'];?>" >
  </figure>
 -->
<br>
  <!-- <h4><?php echo $row['event_name']?></h4> -->
<div style="float: right;">
    <h1 style="color: black;"><strong>₹<?php echo $row['cost']?></strong></h1>
</div>



<div style="margin-top: 30px;color: black;">
    <h4><?php echo $row['title']?></h4>
    </div>
    <br>
    <br>

    <div class="table-responsive">
    <table <table class="table table-bordered"  width="100%" cellspacing="0">
        <tr>
        <th>Specification</th>
        <th>Amount with detail</th>
        </tr>

        <?php
        $tbl = "select * from specification where event_id = $id";
        $tbres = mysqli_query($con,$tbl);
       
                                while($trow = mysqli_fetch_array($tbres)) 
                                {
                                    ?>
                                        <tr>
                                        <?php
                                            echo "<td>" .$trow['spec1'] ."</td>" ;
                                            echo "<td>" .$trow['s1'] ."</td>";
                                         ?>   
                                         </tr>
                                         <tr>
                                        <?php
                                            echo "<td>" .$trow['spec2'] ."</td>" ;
                                            echo "<td>" .$trow['s2'] ."</td>";
                                         ?>   
                                         </tr>
                                         <tr>
                                        <?php
                                            echo "<td>" .$trow['spec3'] ."</td>" ;
                                            echo "<td>" .$trow['s3'] ."</td>";
                                         ?>   
                                         </tr>
                                         <tr>
                                        <?php
                                            echo "<td>" .$trow['spec4'] ."</td>" ;
                                            echo "<td>" .$trow['s4'] ."</td>";
                                         ?>   
                                         </tr>
                                  
                                    <?php
                                }
                            
                            ?>
      
    </table>
</div>
 <label>Venue</label><br>
    <input type="text"  class="container asd" required name="venue" ><br>
    <label>Time</label><br>
    <input type="Time" class="container asd" required name="time" s><br>
    <label>Date</label><br>
    <input type="Date" class="container asd" required id="event_date" name="date" min="2021-04-01" onclick="datepick()"><br>
    <label>Landmark</label><br>
    <input type="text" class="container asd" required name="landmark" >
    <input type="hidden" name="" id = "event_id" value="<?php echo $row['event_id']?>">

    <input type="submit" style="float: right;" name="submit" class="btn btn-warning" onclick="one('<?php echo $row['event_id'] ?>')" value="ADD TO CART">
 </form>
    
<!--    <figure>
    <img src="https://i.imgur.com/sPxEkEI.jpg">
    <figcaption>Green and Black Flowers</figcaption>
    <span class="price">$44</span>
    <a class="button" href="#">Book Now</a>
    </figure> -->
    
        <?php
                }
                        ?>
    
</div>  

        </div>
    </form>
    </div>
                    
</div>


            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; www.bigevents.com</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Do you want to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js1/demo/chart-area-demo.js"></script>
    <script src="js1/demo/chart-pie-demo.js"></script>

</body>

</html>