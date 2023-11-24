<?php
ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php");  //open connection
 if(isset($_POST["btnsubmit"]))
 {
       $type=$_POST["txtname"];
	   $ins="insert into tbl_type(type_name)values('$type')";
	   mysql_query($ins);
 }

 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_type WHERE type_id='$did'";
   mysql_query($delqry);
   header("location:Type.php");
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="248" height="71" border="1" align="center">
    <tr>
      <td width="69">TypeName</td>
      <td width="144"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
      <input type="reset" name="btncancel" id="btncancel" value="RESET" /></td>
    
    </tr>
  </table>
  
  
   <table width="222" height="71" border="1" align="center">
 <tr>
 <td width="40">SL NO</td>
 <td width="29">Type</td>
 <td width="99">Action</td>
 </tr>
         <?php
	$i=0;
	$selqry = "select * from tbl_type";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["type_name"]?> </td>
         <td>
          <a href="Type.php?did=<?php echo $row
		  ["type_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>
</table>
</form>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>