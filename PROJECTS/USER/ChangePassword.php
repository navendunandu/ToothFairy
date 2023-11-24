<?php
		
		include("../Assets/Connection/Connection.php");
		session_start(); 
		ob_start();
		include('Head.php');
$current="";
$new="";
$confirm="";	
	
if(isset($_POST["btnupdate"]))
		{
			$current=$_POST["txtcurrennt"];
			$new=$_POST["txtnew"];
			$confirm=$_POST["txtconfirm"];	
			
				$selUser="SELECT * FROM tbl_user where newuser_password='".$current."' and newuser_id='".$_SESSION["userid"]."'";
				$datapass=mysql_query($selUser);
				if($rowpass=mysql_fetch_array($datapass))
					{
						if($new==$confirm)
							{

									$up="update  tbl_user set user_password='$confirm' where user_id='".$_SESSION["userid"]."'";
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
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="324" height="116" border="1">
    <tr>
      <td width="175">Current Password</td>
      <td width="85"><label for="txtcurrennt"></label>
      <input type="text" name="txtcurrennt" id="txtcurrennt" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="text" name="txtnew" id="txtnew" /></td>
    </tr>
    <tr>
      <td>Comfirm Password</td>
      <td><label for="txtconfirm"></label>
      <input type="text" name="txtconfirm" id="txtconfirm" /></td>
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