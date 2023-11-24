<?php
  ob_start();
    include('Head.php');
 include("../Assets/Connection/Connection.php");  //open connection
 if(isset($_POST["btnsave"]))
 {
       $dname=$_POST["txtdistrict"];
	   $ins="insert into tbl_district(district_name)values('$dname')";
	   mysql_query($ins);
 }
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_district WHERE district_id='$did'";
   mysql_query($delqry);
   header("location:District.php");
   }
 
 ?>
 
 
 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="340" height="73" border="1" align="center">
    <tr>
      <td>District Name</td>
      <td><label for="txtdistrict"></label>
        <input type="text" name="txtdistrict" id="txtdistrict"  title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<br />
<table width="200" border="1" align="center">
<tr> 
    <td>SL.NO</td>
    <td>District</td>
    <td>Action</td>

    <?php
	$i=0;
	$selqry = "select * from tbl_district";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["district_name"]?> </td>
         <td>
          <a href="District.php?did=<?php echo $row
		  ["district_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>

  <?php
include('Foot.php');
ob_flush();
?>