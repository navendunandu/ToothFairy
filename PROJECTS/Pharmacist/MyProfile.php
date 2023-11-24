<?php
		
		include("../Assets/Connection/Connection.php");
	
		session_start(); 
    ob_start();
    include('Head.php');

			
		$selUser="SELECT * FROM tbl_user n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where n.user_id='".$_SESSION["userid"]."'";
		$dataUser=mysql_query($selUser);
		if($rowUser=mysql_fetch_array($dataUser))
			{
				
			
		
			
?>		










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="375" height="288" border="1">
  
   <tr>
     <td colspan="2" align="center"><img src="../Assets/File/UserDocs/<?php echo $rowUser["user_photo"]?>" width="75" height="75" /></td>
    </tr>
   <tr>
      <td>District</td>
      <td><?php echo $rowUser["district_name"]?> </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $rowUser["place_name"]?> </td>
    </tr>
    
    
    <tr>
      <td width="97">Name</td>
      <td width="145"><?php echo $rowUser["user_name"]?> </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $rowUser["user_gender"]?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $rowUser["user_contact"]?> </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $rowUser["user_email"]?> </td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center"><a href="EditProfile.php">EditProfile</a>/<a href="ChangePassword.php">ChangePassword</a></td>
    </tr>
  </table>
</form>
</form>
<?php
			}
			?>

</body>
</html>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>