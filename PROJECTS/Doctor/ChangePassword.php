<?php
ob_start();
    include('Head.php');

		
		include("../Assets/Connection/Connection.php");
	
		session_start(); 
$current="";
$new="";
$confirm="";	
	
if(isset($_POST["btnupdate"]))
		{
			$current=$_POST["txtcurrennt"];
			$new=$_POST["txtnew"];
			$confirm=$_POST["txtconfirm"];	
			
				$selDoctor="SELECT * FROM tbl_doctor where doctor_password='".$current."' and doctor_id='".$_SESSION["Doctorid"]."'";
				$datapass=mysql_query($selDoctor);
				if($rowpass=mysql_fetch_array($datapass))
					{
						if($new==$confirm)
							{

									$up="update  tbl_doctor set doctor_password='$confirm' where doctor_id='".$_SESSION["Doctorid"]."'";
									mysql_query($up);
									echo "Password Updated...";
							}
						else
							{
									echo "Confirm Password Mismatch";
							}
				}
				else
					{
									echo "Current Password Mismatch";
					}
		}
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ChangePassword</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="324" height="116" border="1">
    <tr>
      <td width="175">Current Password</td>
      <td width="85"><label for="txtcurrennt"></label>
      <input type="password" name="txtcurrennt" id="txtcurrennt" required="required" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="password" name="txtnew" id="txtnew" pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required"/></td>
    </tr>
    <tr>
      <td>Comfirm Password</td>
      <td><label for="txtconfirm"></label>
      <input type="password" name="txtconfirm" id="txtconfirm" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>