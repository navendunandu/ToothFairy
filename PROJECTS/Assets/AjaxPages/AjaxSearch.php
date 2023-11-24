
<?php
include("../Connection/Connection.php"); 
?>

<table width="200" border="4" align="center" cellspacing="10" cellpadding="10">
<tr> 
     <?php
	 $i=0;
	$selqry = "select * from tbl_doctor d inner join  tbl_specification s on d.doctor_id = s.doctor_id  where TRUE";
	if($_GET['did']!=null){
		$selqry.= " AND s.type_id = ".$_GET['did'];
	}
	$selqry.=" group by d.doctor_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		     $i++;
			?>
			  <td>
         <?php echo $i?> <br />
         <?php echo $row["doctor_name"]?> <br />
        <img src="../Assets/File/DoctorDocs/<?php echo $row["doctor_photo"]?>" width="75" height="75" /><br />
           <?php echo $row["doctor_details"]?><br />
           <a href="Appointment.php?did=<?php echo $row['doctor_id']?>">Get Appoinment</a>
             </td>
                   
             <?php
			 if($i==4)
	{
	echo"</tr><tr>";	
	$i=0;
	}
	}
   ?>
   
   </table>