<?php
ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 




if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM   tbl_user WHERE user_id='$did'";
   mysql_query($delqry);
   header("location:UserList.php");
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
</head>


<br />
<a href="Homepage.php">Home</a>
<table border="1" align="center">
 <tr>
 <td>Sl NO</td>
 <td>Photo</td>
 <td>Name</td>
 <td>Gender</td>
 <td>Contact</td>
  <td>Email</td>

    <td>Place</td>
    <td>District</td>
     <td>Action</td>
 
 </tr>
 <?php
 	$i=0;
	$selqry = "select * from tbl_user n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		  $i++;  
			?>
 <tr>
 <td><?php echo $i?></td>
 <td><img src="../Assets/Files/UserDocs/<?php echo $row["user_photo"]?>" width="75" height="75" /></td>
 <td><?php echo $row["user_name"]?></td>
 <td><?php echo $row["user_gender"]?></td>
 <td><?php echo $row["user_contact"]?></td>
 <td><?php echo $row["user_email"]?></td>

 <td><?php echo $row["place_name"]?></td>
  <td><?php echo $row["district_name"]?></td>
 <td>
 
 <a href = "UserList.php?did=<?php echo $row["user_id"]?>">Delete</a>
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