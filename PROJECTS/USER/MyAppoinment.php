<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
    include('Head.php');
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="UPDATE tbl_appoinment set app_status=5 WHERE app_id=".$did;
   mysql_query($delqry);
   header("location:MyAppoinment.php");
   }
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyAppoinment</title>
</head>

<body>

<table border="1" align="center">
 <tr>
 <td>Sl NO</td>
  <td>Doctor Name</td>
 <td>Service Type</td>
 <td>Token</td>
 <td>Date</td>
 <td>Time</td>
 <td>Prescription</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_appointment a inner join tbl_slot s on s.slot_id=a.slot_id inner join tbl_doctor d on d.doctor_id=s.doctor_id inner join tbl_service se on se.service_id=a.service_id where a.user_id=".$_SESSION['userid'];
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
         <td><?php echo $row["app_replay"]?> </td>
         <td><?php 
         if($row["app_status"]==0)
         {
            echo "Appoinment Booked";
         }
         else if($row["app_status"]==1){
            echo "Buy Medicine";
         }
         else if($row["app_status"]==2){
            echo "Medicine Booked. Waiting for medicine packing...";
         }
         else if($row["app_status"]==3){
            echo "Collect Medicine from the pharmacist.";
         }
         else if($row["app_status"]==4){
            echo "Completed.";
         }
         else if($row["app_status"]==5){
            echo "Appoinment Cancelled.";
         }
         ?> </td>
          <td>
            <?php
            if($row["app_status"]==0){
                ?>
          <a href="MyAppoinment.php?did=<?php echo $row
		  ["service_id"]?>">Cancel</a>
          <?php
            }
            else if($row["app_status"]==1){

            ?>
            <a href="SearchMedicine.php?aid=<?php echo $row
		  ["app_id"]?>">Buy Medicine</a>
          <?php
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