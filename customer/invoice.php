<?php
require_once "constants.php";
include('templates/header.php');
session_start();
if (!isset($_SESSION['username'])) 
{
    header('location:../login.php');
    # code...
}         
   $t=time();
   $stamp=date("Y-m-d",$t);

            $user=$_SESSION['username'];
            $con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
            $sql1="select login_id from login where username='$user'";
            $result1=mysqli_query($con,$sql1)or die($sql1); 
            $row1=mysqli_fetch_array($result1);
            $login_id=$row1['login_id'];

                
            $sql2="select * from customer where login_id=$login_id";
            $result2=mysqli_query($con,$sql2)or die($sql2); 
            $row2=mysqli_fetch_array($result2);
            $customer_id=$row2['customer_id'];
            $customername =$row2['customer_name'];
            $custphone =$row2['phone'];
            $custmail =$row2['email'];
            $custadd =$row2['address'];
            $custdistrict =$row2['district'];
            $custpin =$row2['pincode'];

$sql2="select Count(*) from event_booking where status=1 and customer_id=$customer_id and buy =0";
 // $sql2="select Count(*) from event_booking where status=1 and customer_id=$customer_id"
 
  $result1=mysqli_query($con,$sql2)or die($sql2);
  $row=mysqli_fetch_array($result1);
  $cart=$row['Count(*)'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">
     <link href="css1/invoice.css" rel="stylesheet">
    <script src="js1/changepassword.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
                        <a class="collapse-item" href="">Feedback</a>
                
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

                        <!-- Nav Item - Alerts  also callled cart setu-->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="Cart.php" >
                                <i class="fa fa-shopping-cart"></i>
                                <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter" href="Cart.php"><?php echo "$cart" ?></span>
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


                <!-- Begin Page Content -->
                    <!-- Content Row -->
                    <div class="row">
                 <div class="container-fluid">
                    <!-- <H1>PAYMENT</H1> -->


 <div id="invoiceholder">
  <div id="headerimage"></div>
  <div id="invoice" class="effect2">
    
    <div id="invoice-top">
        <center style='color:black;font-size: 20px;'>Big Events <sup>2</sup> </center>
        <center style='color:black;font-size: 15px;'>Payment Invoice </center>
        
      <div class="logo"></div>

       <div class="info">
        <h2 style='color:black;'><?php echo "$customername"; ?></h2>
        <p style='color:black;'> <?php echo "$custmail"; ?></p>
         <p style='color:black;'><?php echo "$custphone"; ?></p>
        <p style='color:black;'> <?php echo "$custadd"; ?>
        <?php echo "$custdistrict"; ?>
         <?php echo "$custpin"; ?></p>
        
      </div>
       <!-- End Info -->
      <div class="title">
        <!-- <h2 style='color:black;'>Issued date: <?php echo "$stamp"; ?> </h2> -->
        
      </div>
      <!-- End Title  -->
    </div>
    <!-- End InvoiceTop  -->
<form name="razorpay_frm_payment"  id="razorpay-frm-payment" method="post" style="float:none !important; text-align:center !important;margin-top: 30px;">

<input type="hidden" name="language" value="EN"> 
<input type="hidden" name="currency" id="currency" value="INR"> 
<input type="hidden" name="surl" id="surl" value="success.php"> 
<input type="hidden" name="furl" id="furl" value="failed.php"> 



<!-- <?php
  $sql2="select * from event_booking where status = 1 and buy = 0";
            $result2=mysqli_query($con,$sql2)or die($sql2);
            
             if ($cart>=0)
             {
                 foreach($result2 as $row)
                {
            $ide=$row['event_id'];
            $sql2="select * from events where event_id=$ide";
            $result2=mysqli_query($con,$sql2)or die($sql2);
            
            foreach($result2 as $rowe)
            {  
                $hostid=$rowe['host_id'];
                $sql3="select * from host where host_id=$hostid";
                $result2=mysqli_query($con,$sql3)or die($sql3);

                 foreach($result2 as $rowd)
            { 
                ?>
    
  <!--   <div id="invoice-mid">
      
      <div class="clientlogo"></div>
      <div class="info">
        <b<h2><?php echo $rowe['event_name'] ?></h2>
        <p><?php echo $rowd['email'] ?></p>
           <p><?php echo $rowd['phone'] ?></p>
      </div> 
<!-- 
      <div id="project">
        <h2>Venue Address: <?php echo $row['venue'] ?></h2>
        <h2>Venue landmark:<?php echo $row['landmark'] ?> </h2>
        <h2>Event-date:<?php echo $row['date'] ?> </h2>
      </div>   

    </div><!--End Invoice Mid -->
<!-- <?php
        }
    }
    }
}
        ?>  -->
    

    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="tabletitle">
              <td class="Rate"><h2>Sl no</h2></td>
            <td class="item"><h2>Event name</h2></td>
            <td class="Hours"><h2>Type</h2></td>
            <td class="Rate"><h2>Rate</h2></td>
            <td class="Rate"><h2>Total</h2></td>
          </tr>

             <?php
           if (isset($_GET['event_id'])) 
        {
             $event=$_GET['event_id'];
            $sql2="select * from event_booking where event_id='$event' and status = 1 and buy = 0";
            $result2=mysqli_query($con,$sql2)or die($sql2);

          }
          else{
             $sql2="select * from event_booking where status = 1 and buy = 0";
            $result2=mysqli_query($con,$sql2)or die($sql2);

            

          }  
             if ($cart>0)
             { 
                $sl = 1;
                 foreach($result2 as $row)
                {
            $ide=$row['event_id'];
            $sql2="select * from events where event_id=$ide";
            $result2=mysqli_query($con,$sql2)or die($sql2);

            
            foreach($result2 as $rowe)
            {  
                $hostid=$rowe['host_id'];
                $sql3="select * from host where host_id=$hostid";
                $result2=mysqli_query($con,$sql3)or die($sql3);

                 foreach($result2 as $rowd)
                    { 
                       
                        ?>
                                    <tr>
                                        <?php
                                            echo "<td style='color:black;'>" .$sl++."</td>" ;
                                            echo "<td style='color:black;'>" .$rowe['event_name'] ."</td>" ;
                                            echo "<td style='color:black;'>" .$rowe['event_type'] ."</td>";
                                            echo "<td style='color:black;' >" .$rowe['cost']  ."</td>";
                                             echo"<input type='hidden' id='event_id' name='eventid[]' value=".$rowe['event_id'].">";
                                              echo"<input type='hidden' id='' name='amt1[]' value=".$rowe['cost'].">";
                                            echo "<td style='color:black;'>" .$rowe['cost']  ."</td>";
                                            
                                           



                                           
                                            ?>
                                            
                                        </tr>
                                    
                                    <?php
                                      
                                }
                            }
                        }


$qry = "SELECT SUM(events.cost) AS count FROM events, event_booking where events.event_id=event_booking.event_id and event_booking.status=1 and event_booking.buy=0 ";

$sql=mysqli_query($con,$qry);
$row22=mysqli_fetch_array($sql);
$sum=$row22['count'];


                 
                            ?>
             <tr class="tabletitle">
               
                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $row2['customer_id']; ?>">
<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $host_id;?>"> 

                 <?php 
                 if (isset($_GET['event_id'])) 
                     $sum=$rowe['cost'];
                ?> 


            <td></td>
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2 style='color:black;'>₹ <?php echo $sum; ?></h2></td>
             <input type="hidden" id="amount" name="amount" value="<?php echo $sum; ?>">
         <input type="hidden" name="billing_name" class="form-control" id="billing-name"  value="<?php echo "$customername"; ?>" > 
         <input type="hidden" name="billing_email"class="form-control" id="billing-email" value="<?php echo "$custmail"; ?>" >
        <input type="hidden" name="billing_phone" class="form-control" id="billing-phone" value="<?php echo "$custphone"; ?>" >

          </tr>
          
        </table>
     <!--End Table-->
 <?php    }
else
{
    ?> <script type="text/javascript">alert("Your Cart is empty. no need to checkout...");</script><?php
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=customer_index.php">';

}

 ?>
      
   
   
<table id="table" border="0"><tr><td><h3>Pay Using:-</h3></td></tr><tr><td>
    <input type="radio" onclick="check()" name="payment" value="razorpay"/>&emsp;<img src="razorpay.png" height="auto" width="100px"></td><td>
<input type="radio" onclick="check()" name="payment" value="cod"/>&emsp;<img src="cod.png" height="auto" width="60px"> PAY ON ORDER COMPLETION</td>
</tr>
</table>
<br>

<input type="submit" value="Pay Now" id="cod" class="btn btn-primary" style="display:none;">
      <button class="btn btn-primary" id="btnsubmit" data-amount="<?php echo $sum; ?>" data-id="1"  style="display:none;">Pay Now</button> 


   </form>

       </div>
      <div id="legalcopy">
        <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 24 hrs. please process this invoice within that time. There will be a 5% commision charge for the admin. 
        </p>
      </div>
      
    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->





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
                    <a class="btn btn-primary" href="../login.php">Logout</a>
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    function chr(){
    var inputs = document.getElementsByClassName( 'eventid' ),
    names  = [].map.call(inputs, function( input ) {
        return input.value;
    }).join( '|' );

alert(names);}
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php include('templates/footer.php');?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
  jQuery(document).on('click', '#btnsubmit', function (e) {
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
    var customer_id= jQuery('form#razorpay-frm-payment').find('input#customer_id').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
    var key_id = "<?php echo RAZOR_KEY_ID; ?>";
    var store_name = 'Big Events';
    var store_description = 'Payment';
    var store_logo = 'bigevent.jpg';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
    
    jQuery('.text-danger').remove();


    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'callback.php',
                type: 'post',
                data: {razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id}, 
                dataType: 'json',
                success: function (res) {
                    if(res.msg){
                        alert(res.msg);
                        return false;
                    } 
                   // window.location = res.redirectURL+"";
                   
    $('#razorpay-frm-payment').attr('action', res.redirectURL+"?razorpay_payment_id="+transaction.razorpay_payment_id).submit();
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                // code here
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
});
</script>




<script>
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='payment']:checked").val();
            var form = $('#razorpay-frm-payment');
            var event_id=$("#event_id").val();
            var customer_id=$("#customer_id").val();

            if(radioValue =="cod"){

                form.attr('action', 'cod.php?customerid='+customer_id);
               
               $("#cod").show();
               $("#btnsubmit").hide();
            }
            else{
            
                $("#cod").hide();
                $("#btnsubmit").show();
            }
        });
    });
</script>


</body>

</html>