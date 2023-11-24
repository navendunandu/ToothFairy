<?php
 ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtcon"];
	$email=$_POST["txtem"];
	$add=$_POST["txtaddr"];
	$disrict=$_POST["selpla"];
	
	$photoName=$_FILES["filepic"]["name"];
	$pathName=$_FILES["filepic"]["tmp_name"];
	move_uploaded_file($pathName,"../Assets/File/PharmacistDocs/".$photoName);
	
	$proofName=$_FILES["fileproof"]["name"];
	$proofPath=$_FILES["fileproof"]["tmp_name"];
	move_uploaded_file($proofPath,"../Assets/File/PharmacistDocs/".$proofName);
	
	$password=$_POST["txtpass"];
	$det=$_POST["txtdet"];
	
	

	
	
	 $ins="INSERT INTO tbl_pharmasist(pharmasist_name,pharmasist_contact,pharmasist_email,pharmasist_address,place_id,pharmasist_photo,pharmasist_proof,pharmasist_password,pharmasist_details) VALUES
	 ('$name','$contact','$email','$add','$disrict','$photoName','$proofName','$password','$det')";
	   mysql_query($ins);
	    header("location:pharmacistReg.php");
}
if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_pharmasist WHERE pharmasist_id='$did'";
   mysql_query($delqry);
   header("location:pharmacistReg.php");
   }
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pharmacistReg</title>
</head>

<body>
<a href="Homepage.php">Home</a>
<form action="pharmacistReg.php" method="post" enctype="multipart/form-data">
  <table width="329" height="381" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"  title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcon"></label>
      <input type="text" name="txtcon" id="txtcon"  required="required" pattern="[7-9]{1}[0-9]{9}"
title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtadd"></label>
      <input type="email" name="txtem" id="txtem" required="required"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddr"></label>
      <input type="text" name="txtaddr" id="txtaddr" required="required" /></td>
    </tr>
     <tr>
      <td>Place</td>
      <td><label for="txtpla"></label>
        <label for="selpla"></label>
        <select name="selpla" id="selpla" required="required">
          <?php

	$selqry = "select * from tbl_place";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		   
			?>
        
        <option value="<?php echo $row["place_id"]?>"><?php echo $row["place_name"]?></option>
         
         <?php
	}
	?>
       </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic"  required="required"/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" required="required"/></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdet"></label>
      <input type="text" name="txtdet" id="txtdet" required="required" pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
  <input type="reset" name="btncancel" id="btncancel" value="CANCEL" /></td>
    </tr>
  </table>
 
</form>
<table width="200" border="4" align="center">
<tr> 
    <td>SL.NO</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Address</td>  
     <td>Place</td>    
    <td>Photo</td>
    <td>Proof</td> 
 
    <td>Details</td>
    <td>Action</td>
     <?php
	$i=0;
	$selqry="select * from tbl_pharmasist p inner join tbl_place d on p.place_id=d.place_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
<tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["pharmasist_name"]?> </td>
         <td><?php echo $row["pharmasist_contact"]?> </td>
          <td><?php echo $row["pharmasist_email"]?> </td>
           <td><?php echo $row["pharmasist_address"]?> </td>
            <td><?php echo $row["place_name"]?> </td>
             <td><img src="../Assets/File/PharmacistDocs/<?php echo $row["pharmasist_photo"]?>" width="75" height="75" /></td>
              <td><img src="../Assets/File/PharmacistDocs/<?php echo $row["pharmasist_proof"]?>" width="75" height="75" /> </td>
          
              <td><?php echo $row["pharmasist_details"]?> </td>
         
         <td>
          <a href="pharmacistReg.php?did=<?php echo $row
		  ["pharmasist_id"]?>">Delete</a>
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