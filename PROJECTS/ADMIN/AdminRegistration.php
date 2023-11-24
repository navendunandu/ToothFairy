<?php
 ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnSubmit"]))
{
	$name=$_POST["txtName"];
	$contact=$_POST["txtContact"];
	$email=$_POST["txtEmail"];
	$password=$_POST["txtpass"];
	
	


	 $ins="INSERT INTO `tbl_admin`(`admin_name`, `admin_contact`, admin_email,admin_password) VALUES ('$name','$contact','$email','$password')";
	   mysql_query($ins);
	  
	  header("location:AdminRegistration.php");
}
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_admin WHERE admin_id ='$did'";
   mysql_query($delqry);
   header("location:AdminRegistration.php");
   }
 
 
 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1" align="center">
  
    <tr>
      <td>Name</td>
      <td><label for="txtName"></label>
      <input type="text" name="txtName" id="txtName" title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required" /></td>
    </tr>
    
    <tr>
      <td>Contact</td>
      <td><label for="txtContact"></label>
      <input type="text" name="txtContact" id="txtContact" required="required" pattern="[7-9]{1}[0-9]{9}"
title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtEmail"></label>
      <input type="email" name="txtEmail" id="txtEmail" required="required"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" required="required"  pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
   
    <tr>
      <td colspan="2"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<br />
<table width="200" border="4" align="center">
<tr> 
    <td>SL.NO</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Password</td>
    <td>Action</td>

    <?php
	$i=0;
	$selqry = "select * from tbl_admin";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["admin_name"]?> </td>
          <td><?php echo $row["admin_contact"]?> </td>
           <td><?php echo $row["admin_email"]?> </td>
            <td><?php echo $row["admin_password"]?> </td>
         <td>
          <a href="AdminRegistration.php?did=<?php echo $row
		  ["admin_id"]?>">Delete</a>
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

