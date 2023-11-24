
<?php
  ob_start();
    include('Head.php');
 include("../Assets/Connection/Connection.php");  //open connection
 
 
 if(isset($_POST["btnsave"]))
 {
       $pln=$_POST["txtplace"];
	   $disrict=$_POST["selditname"];
	   
	   $ins="insert into tbl_place(place_name,district_id)values('$pln','$disrict')";
	   mysql_query($ins);
	   header("location:Place.php");
 }
 
 
 
  if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_place WHERE place_id='$did'";
   mysql_query($delqry);
   header("location:Place.php");
   }
 
 
 
 
 
 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form id="form1" name="form1" method="post" action="Place.php">
  <table width="344" height="90" border="1" align="center">
    <tr>
      <td width="85">District Name</td>
      <td width="167"><label for="selditname"></label>
      
      
      
        <select name="selditname" id="selditname"  required="required">
         <?php

	$selqry = "select * from tbl_district";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		   
			?>
        
        <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
         
         <?php
	}
	?>
      </select>
      
      
      
      
      </td>
    </tr>
    <tr>
      <td height="26">Place Name</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace"  required="required"/></td>
    </tr>
     <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" />
       <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>


 <table border="1" align="center">
 <tr>
 <td>Sl NO</td>
 <td>Place</td>
 <td>District</td>
 <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["place_name"]?> </td>
         <td><?php echo $row["district_name"]?> </td>
         <td>
          <a href="Place.php?did=<?php echo $row
		  ["place_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>
</table>
</body>
</html> 
   <?php
include('Foot.php');
ob_flush();
?>
 
  
       
                  
