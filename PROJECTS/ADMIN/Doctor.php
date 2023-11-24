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
	$ser=$_POST["selser"];
	
	$photoName=$_FILES["filepic"]["name"];
	$pathName=$_FILES["filepic"]["tmp_name"];
	move_uploaded_file($pathName,"../Assets/File/DoctorDocs/".$photoName);
	
	$proofName=$_FILES["fileproof"]["name"];
	$proofPath=$_FILES["fileproof"]["tmp_name"];
	move_uploaded_file($proofPath,"../Assets/File/DoctorDocs/".$proofName);
	
	$password=$_POST["txtpass"];
	$det=$_POST["txtdet"];
	$gender=$_POST["radio"];
	
	
	
	 $ins="INSERT INTO tbl_doctor(`doctor_name`, `doctor_contact`, `doctor_email`, `doctor_address`, `place_id`,service_id, `doctor_photo`, `doctor_proof`, `doctor_password`, `doctor_details`, `doctor_gender`) VALUES
	 ('$name','$contact','$email','$add','$disrict','$ser','$photoName','$proofName','$password','$det','$gender')";
	   mysql_query($ins);
	  
	  
	   header("location:Doctor.php");
}
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_doctor WHERE doctor_id ='$did'";
   mysql_query($delqry);
   header("location:Doctor.php");
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor</title>


</head>

<body>
<form action="Doctor.php" method="post" enctype="multipart/form-data">
  <table width="329" height="381" border="0">
    <tr>
      <td>Doctor Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required" /></td>
    </tr>
    <tr>
      <td >Doctor Contact</td>
      <td><label for="txtcon"></label>
      <input type="text" name="txtcon" id="txtcon" required="required" pattern="[7-9]{1}[0-9]{9}"
title="Phone number with 7-9 and remaing 9 digit with 0-9"  /></td>
    </tr>
    <tr>
      <td >Doctor email</td>
      <td><label for="txtadd"></label>
      <input type="email" name="txtem" id="txtem" required="required" /></td>
    </tr>
     <tr>
      <td >Place</td>
      <td><label for="txtpla"></label>
        <label for="selpla"></label>
        <select name="selpla" id="selpla" required="required">
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
       </select></td>
    </tr>
     <tr>
      <td >Doctor Service</td>
      <td><label for="selser"></label>
     <select name="selser" id="selser" required="required">
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
      <td>Photo</td>
      <td ><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic" required="required"/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td ><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof" required="required"/></td>
    </tr>
    <tr>
      <td >Password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass"  pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required"/></td>
    </tr>
    <tr>
      <td >Details</td>
      <td><label for="txtdet"></label>
      <input type="text" name="txtdet" id="txtdet" required="required" /></td>
    </tr>
     <tr>
      <td>Address</td>
      <td><label for="txtaddr"></label>
      <input type="text" name="txtaddr" id="txtaddr" required="required"/></td>
    </tr>
    <td >Gender</td>
      <td ><input type="radio" name="radio" id="radio" value="Male" required="required"/>
      <label for="rdMale">Male  
        <input type="radio" name="radio" id="radio" value="Female" />
      </label>   Female</td>
    </tr>
    <tr>
      <td colspan="2" ><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
  <input type="reset" name="btncancel" id="btncancel" value="CANCEL" /></td>
    </tr>
  </table>
 
</form>
 <table width="329" height="381" border="0">
      <?php
	  $i=0;
	$selqry = "select * from tbl_doctor p inner join tbl_doctor d on p.doctor_id=d.doctor_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		 $i++;
			?>
            <td>
           <img src="../Assets/File/DoctorDocs/<?php echo $row["doctor_photo"]?>" width="75" height="75" /><br />
           <?php echo $row["doctor_name"]?> <br />
            <?php echo $row["doctor_contact"]?><br />
           
          <a href="ProfileDoc.php"  style="color:#F00">Read more</a>
             </td>
          
             
             <?php
	}if($i==4)
	{
	echo"</tr><tr>";	
	$i=0;
	echo"<tr>";
	}
   ?>
   
</table>
</body>
</html>
 <?php
include('Foot.php');
ob_flush();
?>