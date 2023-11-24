</html>
<?php
ob_start();
    include('Head.php');

		
		include("../Assets/Connection/Connection.php");
	
		session_start(); 
		
		if(isset($_POST["btnupdate"]))
		{
			$name=$_POST["txtname"];
			$contact=$_POST["txtcontact"];
			$email=$_POST["txtemail"];
			
			$up="update  tbl_doctor set doctor_name='$name',doctor_contact='$contact',doctor_email='$email'  where doctor_id='".$_SESSION["Doctorid"]."'";
			mysql_query($up);
			header("location:MyProfile.php"); 
		}
			
		$selDoctor="SELECT * FROM tbl_doctor n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where n.doctor_id='".$_SESSION["Doctorid"]."'";
		$dataDoctor=mysql_query($selDoctor);
		if($rowDoctor=mysql_fetch_array($dataDoctor))
			{
				
			
		
			
?>		










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="375" height="109" border="1">
  
   <tr>
      <td width="97" height="23">Name</td>
      <td width="145"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value=" <?php echo $rowDoctor["doctor_name"]?>"  title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required" />        </td>
    </tr>
    <tr>
      <td height="23">Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $rowDoctor["doctor_contact"]?>" required="required" pattern="[7-9]{1}[0-9]{9}"
title="Phone number with 7-9 and remaing 9 digit with 0-9" />         </td>
    </tr>
    <tr>
      <td height="23">Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" value="<?php echo $rowDoctor["doctor_email"]?>" />         </td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Update" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</form>
<?php
			}
			?>

</body>
</html>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>