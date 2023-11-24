<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
		include('Head.php');
if(isset($_POST["btnSubmit"]))
{
	$date=$_POST["txtdate"];
	$dataSlot=$_POST["txtslot"];
	$dataServ=$_POST["txtservice"];
	$dataToken=$_POST["txttoken"];
	
	
	 $ins="INSERT INTO `tbl_appointment`(`app_date`,`slot_id`,`service_id`,`user_id`,`app_slot`) VALUES (curdate(),'$dataSlot','$dataServ','".$_SESSION["userid"]."','".$dataToken."')";
 
 
  mysql_query($ins);
  
	 
	  header("location:Appointment.php");
	  }
	  $selQry="select * from tbl_doctor where doctor_id=".$_GET['did'];
	  $res=mysql_query($selQry);
	  $data=mysql_fetch_array($res);
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointment</title>
</head>

<body>
<form action="Appointment.php" method="post">
  <table width="200" border="1">
    <tr>
      <td>Doctor</td>
      <td><?php echo $data['doctor_name'] ?>
      <input type='hidden' id='did' value="<?php echo $data['doctor_id'] ?>"  />
      </td>
    </tr>
    <tr>
    	<td>Service</td>
    	<td>
        <select name='txtservice'>
        <option value="">Select Service</option>
        <?php
		
		$selserv="SELECT * FROM tbl_specification sp INNER JOIN tbl_service se on se.type_id=sp.type_id inner join tbl_type t on sp.type_id=t.type_id where sp.doctor_id=".$data['doctor_id'];
		$resServ=mysql_query($selserv);
		while($dataServ=mysql_fetch_array($resServ)){
		?>
        <option value="<?php echo $dataServ['service_id'] ?>"><?php echo $dataServ['service_name'] ?></option>
        <?php
		}
		?>
        </select>
        </td>
    </tr>
    <tr>
      <td>Appointment Date</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate" onchange="getSlot(this.value)"/></td>
    </tr>
  </table><br />
<div id='booking'>
   
  </div>
</form>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getSlot(date)
{
	var did = document.getElementById('did').value;
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxAvailability.php?date="+date+"&did="+did,
	  success: function(html){
		$("#booking").html(html);
	  }
	});
}
</script>
</html>
<?php
include('Foot.php');
ob_flush();
?>