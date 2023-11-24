<?php
  ob_start();
    include('Head.php');

include("../Assets/Connection/Connection.php"); 
session_start();
if(isset($_POST["btnSubmit"]))
{
	$Date=$_POST["txtdate"];
	$Time=$_POST["txttime"];
	$Slot=$_POST["txtslot"];
	
	
	$ins="INSERT INTO `tbl_slot`(`slot_date`, `doctor_id`,`slot_count`, `slot_time`) VALUES ('$Date','".$_SESSION["Doctorid"]."','$Slot','$Time')";


 mysql_query($ins);
	  
	 header("location:Slots.php");
}
  if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_slot WHERE slot_id ='$did'";
   mysql_query($delqry);
   header("location:Slots.php");
   }
 
 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slots</title>
</head>

<body>

<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1" align="center">
  
    <tr>
      <td>Date</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate" required="required"/></td>
    </tr>
    
    <tr>
      <td>Time</td>
      <td><label for="txttime"></label>
      <input type="time" name="txttime" id="txttime" required="required"/></td>
    </tr>
    <tr>
      <td>Slot</td>
      <td><label for="txtslot"></label>
      <input type="text" name="txtslot" id="txtslot" /></td>
    </tr>
    
    <tr>
      <td colspan="2"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<table width="200" border="4" align="center">
<tr> 
    <td>SL.NO</td>
    <td>Date</td>
     <td>Time</td>
      <td>Slot</td>
       <td>Action</td>
      <?php
	$i=0;
	$selqry = "select * from tbl_slot";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		
		    $i++;
			?>
<tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["slot_date"]?> </td>
           <td><?php echo $row["slot_time"]?> </td>
              <td><?php echo $row["slot_count"]?> </td>
            <td>
          <a href="Slots.php?did=<?php echo $row
		  ["slot_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>