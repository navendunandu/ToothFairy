<?php
 ob_start();
    include('Head.php');

include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnlogin"]))
{
	$name=$_POST["txtName"];
	$gender=$_POST["radio"];
	$contact=$_POST["txtContact"];
	$email=$_POST["txtEmail"];
	$password=$_POST["txtpass"];
	$place=$_POST["selpla"];
	$add=$_POST["txtadd"];
	
	
	$photoName=$_FILES["filephoto"]["name"];
	$pathName=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($pathName,"../Assets/File/UserDocs/".$photoName);
	
	
	$proofName=$_FILES["fileproof"]["name"];
	$proof=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($proof,"../Assets/File/UserDocs/".$proofName);
	
	
	
	
	 $ins="INSERT INTO tbl_user(user_name,user_gender,user_contact,user_email,user_password,place_id,user_photo,user_proof,user_address) VALUES
	 ('$name','$gender','$contact','$email','$password','$place','$photoName','$proofName','$add')";
	   mysql_query($ins);
	    
		header("location:NewUser.php");
}

if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_user WHERE user_id='$did'";
   mysql_query($delqry);
   header("location:NewUser.php");
   }
 



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1">
  <tr>
      <td  >District</td>
      <td><p>
        <label for="seldis"></label>
        <select name="seldis" id="seldis" onchange="getPlace(this.value)" required="required">
        
        <?php
			$selqry = "select * from tbl_district";
	echo $selqry;
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
      <td>Place</td>
      <td><label for="selpla"></label>
        <select name="selpla" id="selpla" required="required">
        <option>-----Select-----</option>
      </select></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txtName"></label>
      <input type="text" name="txtName" id="txtName"  title="Name Allows Only
Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="required"/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="radio" value="Male"  required="required" />
      <label for="rdMale">Male  
        <input type="radio" name="radio" id="radio" value="Female" />
      </label>   Female</td>
    </tr>
    <td>Address</td>
      <td><label for="txtadd"></label>
      <input type="text" name="txtadd" id="txtadd"  required="required" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtContact"></label>
      <input type="text" name="txtContact" id="txtContact"  required="required" pattern="[7-9]{1}[0-9]{9}"
title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtEmail"></label>
      <input type="email" name="txtEmail" id="txtEmail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtcpass"></label>
      <input type="text" name="txtcpass" id="txtcpass" pattern="(?=.*\d)(?
=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required" /></td>
    </tr>
    
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required="required" /></td>
    </tr>
     <tr>
      <td>Proof</td>
      <td><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof" required="required" /></td>
    </tr>
    
    <tr>
      <td colspan="2"><input type="submit" name="btnlogin" id="btnlogin" value="Submit" />
      <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form>

 <table border="1" align="center">
 <tr>
 <td>Sl NO</td>
 <td>User Name</td>
 <td>User Contact</td>
 <td>User Email</td>
 <td>User Password</td>
    <td>User Gender</td>
     <td>User Photo</td>
      <td>User Proof</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_user p inner join tbl_user d on p.user_id=d.user_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["user_name"]?> </td>
         <td><?php echo $row["user_contact"]?> </td>
         <td><?php echo $row["user_email"]?> </td>
         <td><?php echo $row["user_password"]?> </td>
         <td><?php echo $row["user_gender"]?> </td>
          <td><img src="../Assets/File/UserDocs/<?php echo $row["user_photo"]?>" width="75" height="75" /></td>
          <td><img src="../Assets/File/UserDocs/<?php echo $row["user_proof"]?>" width="75" height="75" /></td>
         <td>
          <a href="NewUser.php?did=<?php echo $row
		  ["user_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>

</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#selpla").html(html);
	  }
	});
}
</script>
</html>
<?php
include('Foot.php');
ob_flush();
?>