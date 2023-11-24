<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
    include('Head.php');
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_appointment WHERE app_id='$did'";
   mysql_query($delqry);
   header("location:Bookings.php");
   }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
</head>
<body>
<table border="1" align="center" cellpadding='10' cellspacing='10'>
 <tr>
 <td>Sl NO</td>
  <td> Name</td>
 <td>Service Type</td>
 <td>Token</td>
 <td>Date</td>
 <td>Time</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_appointment a inner join tbl_slot s on s.slot_id=a.slot_id inner join tbl_doctor d on d.doctor_id=s.doctor_id inner join tbl_service se on se.service_id=a.service_id where s.doctor_id=".$_SESSION['Doctorid'];
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
             <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["doctor_name"]?> </td>
         <td><?php echo $row["service_name"]?> </td>
         <td><?php echo $row["app_slot"]?> </td>
         <td><?php echo $row["slot_date"]?> </td>
         <td><?php echo $row["slot_time"]?> </td>
         <td><?php
         if($row['app_status']==0){
            echo 'Appoinment Booked';
         }
         else if($row['app_status']==1){
            echo "Medicine Prescribed";
         }
         ?> </td>
          <td>
            <?php
            if($row['app_status']==0){
                ?>
          <a href="AddPrescription.php?did=<?php echo $row
		  ["app_id"]?>">Prescription</a>
          <?php
            }
            else{
                echo $row['app_replay'];
            }
            ?>
          </td>
            
              </tr>
             <?php
	}
   ?>
   </table>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>
</body>
</html>