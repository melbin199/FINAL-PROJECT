<?php 
 ob_start();
 require_once '../dompdf/autoload.inc.php';
 use Dompdf\Dompdf;
 $dompdf = new Dompdf();

 session_start();
 $name=$_SESSION["username"];
 $con=mysqli_connect("localhost","root","","project") or die("connection moonchi");

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

$output='<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment Invoice Bill Generation </title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css1/sb-admin-2.min.css" rel="stylesheet">
     <link href="css1/invoice.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> 
                        </li>
                    </ul>

                </nav>
                
                    <div class="row">
                 <div class="container-fluid">
                       <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>
                    


 <div id="invoiceholder">
  <div id="headerimage"></div>
  <div id="invoice" class="effect2">
    
    <div id="invoice-top">
        <center style=color:black;font-size: 20px;>Big Events <sup>2</sup> </center>
        <center style=color:black;font-size: 15px;>Payment Bill Invoice </center>
      <div class="logo"></div>';

       
        $output .="<h2 style=color:black>".$customername."</h2>
        <p style=color:black> ".$custmail."</p>
         <p style=color:black> ".$custphone."</p>
        <p style=color:black;> ".$custadd.">
        <".$custdistrict."
         < ".$custpin."</p>

      </div>
      <div class=title>
        <h2 style=color:black;>Issued date:".$stamp." </h2>
        
      </div>
    </div>";
  

  $sql2="select distinct * from event_booking where customer_id = $customer_id and buy = 1";
            $result2=mysqli_query($con,$sql2)or die($sql2);
            

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
                
    
  $output.= "<div id=invoice-mid>
        <div class=clientlogo></div>
      <div class=info>
        <b><h2> ".$rowe['event_name']." </h2>
        <p>".$rowd['email']." </p>
        <p> ".$rowd['phone']." </p>
      </div> 

      <div id=project>
        <h2>Venue Address:".$row['venue']. "</h2>
        <h2>Venue landmark:". $row['landmark']."  </h2>
        <h2>Event-date:".$row['date']."</h2>
      </div>   

    </div>


    <div id=invoice-bot>
      
      <div id=table>
        <table>
          <tr class=tabletitle>
              <td class=Rate><h2>Sl no</h2></td>
            <td class=item><h2>Event name</h2></td>
            <td class=Hours><h2>Type</h2></td>
            <td class=Rate><h2>Rate</h2></td>
            <td class=Rate><h2>Total</h2></td>
          </tr>";

          if (isset($_GET['event_id'])) 
        {
             $event=$_GET['event_id'];
            $sql2="select * from event_booking where  buy = 1 and customer_id = $customer_id";
            $result2=mysqli_query($con,$sql2)or die($sql2);

          }
          else
          {

             $sql2="select * from event_booking where  buy = 1 and customer_id = $customer_id";
            $result2=mysqli_query($con,$sql2)or die($sql2);

          }  
             
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
                              
                                  $output.="<tr>
                                        
                                             <td style='color:black;'>" .$sl++."</td>
                                             <td style='color:black;'>" .$rowe['event_name'] ."</td>
                                             <td style='color:black;'>" .$rowe['event_type'] ."</td>
                                             <td style='color:black;' >" .$rowe['cost']  ."</td>
                                             <td style='color:black;'>" .$rowe['cost']  ."</td>
                                            
                                        </tr>";
                                    
                                   
                    }
                }
            }
        }
    }
}


$qry = "SELECT SUM(events.cost) AS count FROM events, event_booking where events.event_id=event_booking.event_id  and event_booking.buy=1 and event_booking.status=1 ";

$sql=mysqli_query($con,$qry);
$row22=mysqli_fetch_array($sql);
$sum=$row22['count'];

     $output.="<tr class=tabletitle> ";      

                 if (isset($_GET['event_id'])) 
                     $sum=$rowe['cost'];
  
          $output.="<td></td>
            <td></td>
            <td></td>
            <td class=Rate><h2>Total</h2></td>
            <td class=payment><h2 style='color:black;'>₹  ".$sum."</h2></td>
         
          </tr>
          
        </table>
      
    </div><
  </div><
</div>

            </div>
            </div>
            </div>
            <!-- End of Main Content -->




        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->";

    
 $t=time();
$stamp=date("Y-m-d",$t);
$output.="<h4>Generated on: ".$stamp."</h4>
<br>

</body>
</html>";
 
 echo $output;
 $file_name=$stamp.'_BillReport.pdf';
             $dompdf->setPaper('A4', 'landscape');
             $dompdf->loadHtml($output);
             $dompdf->render();
             ob_end_clean();
             $dompdf->stream($file_name,array('Attachment' =>0));
