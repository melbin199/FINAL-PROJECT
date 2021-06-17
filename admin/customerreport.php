<?php 
 ob_start();
 require_once '../dompdf/autoload.inc.php';
 use Dompdf\Dompdf;
 $dompdf = new Dompdf();

 session_start();
 $name=$_SESSION["username"];
 $con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
 
$output='<!DOCTYPE html>
<html>
<head>
  <title>REPORT GENERATION</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #324b5c;
  color: white;
}
.big
{}

</style>
</head>
<body><br><br>
<h1 align="center">BIG EVENTS <sup>2</sup></h1>
<h1 align="center"><u>Consolidated Report</u></h1>
<b><p> The List showing the activated Customer Details. </p></b>
<table id="customers">
<tr>
<th>Sl.no</th> 
<th>Customer Name</th>
<th>Email</th>
<th>phone</th>
<th>Address</th>
<th>State</th>
<th>District</th>
<th>Pincode</th>
</tr>';

                       
                        $sql = "SELECT * from customer";
                        $result =mysqli_query($con,$sql);
                        $num=mysqli_num_rows($result);
                         $sl = 1; 
                        if ($num > 0) 
                            {
                                while($row = mysqli_fetch_array($result)) 
                                {
                            
                                      $output.= " <tr>
                                        
                                            <td>" .$sl++."</td> 
                                             <td>" .$row['customer_name'] ."</td> 
                                             <td>" .$row['email'] ."</td>
                                             <td>" .$row['phone']  ."</td>
                                             <td>" .$row ['address'] ."</td>
                                             <td>" .$row['state'] ."</td>
                                             <td>" .$row['district'] ."</td>
                                             <td>" .$row['pincode'] ."</td>
                                            
                                            
                                        </tr>";
                                    
                                  
                                }
                            }
                          
                          $output.= "</tbody>
                            </table>";


 $t=time();
$stamp=date("Y-m-d",$t);
$output.="<h4>Generated on: ".$stamp."</h4>
<br>

</body>
</html>";
 
 echo $output;
 $file_name=$stamp.'_Report.pdf';
             $dompdf->setPaper('A4', 'landscape');
             $dompdf->loadHtml($output);
             $dompdf->render();
             ob_end_clean();
             $dompdf->stream($file_name,array('Attachment' =>0));

