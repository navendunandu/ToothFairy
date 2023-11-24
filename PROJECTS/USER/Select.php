<?php
ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select</title>
</head>

<body>
<form action="Select.php" method="post">
  <table width="200" border="4" align="center">
    <tr>
     
      
      <td><label for="seltype"></label>
        <select name="seltype" id="seltype" onchange="getDoctor(this.value)">
         <option value="">Select</option>
         <?php
			$selqry = "select * from tbl_type";
	
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		 
			?>
           
             <option value="<?php echo $row["type_id"]?>"><?php echo $row["type_name"]?></option>
             <?php
	}
	?>
      </select></td>
      
    </tr>
  </table>
</form>
<div id="search">
<table width="200" border="4" align="center" cellspacing="10" cellpadding="10">
<tr>
     <?php
	 $i=0;
	$selqry = "select * from tbl_doctor";
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
   </tr>
   </table>
   </div>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getDoctor(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxSearch.php?did="+did,
	  success: function(html){
		$("#search").html(html);
	  }
	});
}
</script>
</html>
<?php
include('Foot.php');
ob_flush();
?>