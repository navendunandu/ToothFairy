<?php
 ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor's Profile</title>
<style type=text/css>
html {
height: 100%;
}
body {
margin:0;
padding:0;
font-family: sans-serif;
background: linear-gradient(#141e30, #243b55);
}
</style>
</head>
<body>
<table height="200" width="200" align="center" border="2">
<td  style="color:#FFF">Contact</td>
    <td  style="color:#FFF">Email</td>
    <td  style="color:#FFF">address</td>  
     <td  style="color:#FFF">Place</td>    
    <td  style="color:#FFF">Photo</td>
    <td  style="color:#FFF">Proof</td> 
    <td  style="color:#FFF">Password</td>   
    <td  style="color:#FFF">Details</td>
     <td  style="color:#FFF">Service</td>
     <td  style="color:#FFF">Gender</td>
    <td  style="color:#FFF">Action</td>
     <?php
	$selqry = "select * from tbl_doctor p inner join tbl_doctor d on p.doctor_id=d.doctor_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
			?>
       <tr>
         <td style="color:#FFF"><?php echo $row["doctor_contact"]?> </td>
          <td style="color:#FFF"><?php echo $row["doctor_email"]?> </td>
           <td style="color:#FFF"><?php echo $row["doctor_address"]?> </td>
            <td style="color:#FFF"><?php echo $row["place_id"]?> </td>
             <td style="color:#FFF"><img src="../Assets/File/DoctorDocs/<?php echo $row["doctor_photo"]?>" width="75" height="75" /></td>
              <td style="color:#FFF"><img src="../Assets/File/DoctorDocs/<?php echo $row["doctor_proof"]?>" width="75" height="75" /> </td>
              <td style="color:#FFF"><?php echo $row["doctor_password"]?> </td>
              <td style="color:#FFF"><?php echo $row["doctor_details"]?> </td>
               <td style="color:#FFF"><?php echo $row["service_id"]?> </td>
                <td style="color:#FFF"><?php echo $row["doctor_gender"]?> </td>
         
         <td>
          <a href="Doctor.php?did=<?php echo $row
		  ["doctor_id"]?>"  style="color:#FFF">Delete</a>
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