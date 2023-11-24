<title>Specification</title>
<form action="Specification.php" method="post"><?php
 ob_start();
    include('Head.php');

include("../Assets/Connection/Connection.php"); 
session_start();

 if(isset($_POST["btnsubmit"]))
 {
       $type=$_POST["selspec"];
	   
	   $ins="INSERT INTO tbl_specification(type_id,doctor_id)values('$type','".$_SESSION['Doctorid']."')"; 
	mysql_query($ins);
 }

 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  `tbl_specification` WHERE `specification_id`='$did'";
   mysql_query($delqry);
   header("location:Specification.php");
   }
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Specification</title>
</head>

<body>
<form  method="post">
  <table width="200" border="1">
    <tr>
      <td>Specification</td>
      <td><label for="selspec"></label>
        <select name="selspec" id="selspec" required="required">
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
    <tr>
     <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
    </tr>
  </table>
</form>
 <table width="222" height="71" border="1" align="center">
 <tr>
 <td width="40">SL NO</td>
 <td width="29">Type</td>
 <td width="99">Action</td>
   <?php
	$i=0;
	$selqry = "select * from tbl_specification s inner join tbl_type t on s.type_id = t.type_id ";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["type_name"]?> </td>
         <td>
          <a href="specification.php?did=<?php echo $row
		  ["specification_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>
 </tr>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>