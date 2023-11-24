<?php


include("../Assets/Connection/Connection.php");
$mes="";
session_start();


if(isset($_POST["btnlogin"]))
{
	$email=$_POST["txtemail"];
	$pass=$_POST["txtpass"];
	
$seladmin="SELECT * FROM tbl_admin WHERE admin_email='".$email."' and admin_password='".$pass."'";
$dataAdmin=mysql_query($seladmin);



$seluser="SELECT * FROM tbl_user WHERE user_email='".$email."' and user_password='".$pass."'";
$dataUser=mysql_query($seluser);


$selDoctor="SELECT * FROM tbl_doctor WHERE doctor_email='".$email."' and doctor_password='".$pass."'";
$dataDoctor=mysql_query($selDoctor);

$selPharmasist="SELECT * FROM tbl_pharmasist WHERE pharmasist_email='".$email."' and pharmasist_password='".$pass."'";
$dataPharmasist=mysql_query($selPharmasist);

if($rowAdmin = mysql_fetch_array($dataAdmin))
{
	  
	  
	  $_SESSION["adminid"]=$rowAdmin["admin_id"];
	  $_SESSION["adminame"]=$rowAdmin["admin_name"];
	  header("location:../ADMIN/Homepage.php");

}
else if($rowUser = mysql_fetch_array($dataUser))
{
	  
	  
	  $_SESSION["userid"]=$rowUser["user_id"];
	  $_SESSION["username"]=$rowUser["user_name"];
	  header("location:../USER/HomePage.php");

}

else if($rowPharmasis = mysql_fetch_array($dataPharmasist))
{
	  
	  
	  $_SESSION["Pharmasistid"]=$rowPharmasis["pharmasist_id"];
	  $_SESSION["Pharmasistname"]=$rowPharmasis["pharmasist_name"];
	  header("location:../Pharmacist/HomePage.php");

}
else if($rowDoctor = mysql_fetch_array($dataDoctor))
{
	  
	  
	  $_SESSION["Doctorid"]=$rowDoctor["doctor_id"];
	  $_SESSION["Doctorname"]=$rowDoctor["doctor_name"];
	  header("location:../Doctor/HomePage.php");

}

else
{
                        $mes="Invalid Login!!";
						echo $mes;
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link href="Design.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form action="#" method="post">
  <div class="login-box">
<h2>Login</h2>
<div class="user-box">
<input type="email"  name="txtemail" id="txtemail">
<label>Email</label>
</div>
<div class="user-box">
<input type="password"name="txtpass" id="txtpass" pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required">
<label>Password</label>
</div>
<a href="#">
<span></span>
<span></span>
<span></span>
<span></span>
<input type="submit" name="btnlogin" id="btnlogin" value="LOGIN" />
</a>
</form>
</body>
</html>