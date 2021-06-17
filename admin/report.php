<?php
session_start();
 $name=$_SESSION["username"];
  $con=mysqli_connect("localhost","root","","project") or die("connection moonchi");
 
require_once '../dompdf/autoload.inc.php';
 use Dompdf\Dompdf;
 $dompdf = new Dompdf();
session_start();

  $output ='<h3 align="center">Attendance Report</h3><br />';
              $output .="
            <table width ='100%' border='1' cellpadding='5' cellspacing ='0'>



            
            <tr>
           <th>Customer Name</th>
<th>Email</th>
<th>phone</th>
<th>Address</th>
<th>State</th>
<th>District</th>
<th>Pincode</th>
            </tr>
            ";

           $sql = "SELECT * from customer";
                        $result =mysqli_query($con,$sql);
                        $num=mysqli_num_rows($result);

           if ($num > 0) 
                            {
                                while($row = mysqli_fetch_array($result)) 
                                {

                       $output .='
                       <tr>
                       <td>'.$row["Name"].'</td>
                       <td>'.$row["attend_status"].'</td>
                        <td>'.$row["date"].'</td>
                       </tr>';
}
                      $output .="</table>
                      </td>
                      </tr>
                      </table><br />";

}
             echo $output;
             $file_name='Report.pdf';
             $dompdf->loadHtml($output);
             $dompdf->render();
             ob_end_clean();
             $dompdf->stream($file_name,array('Attachment' =>0));



 ?>
