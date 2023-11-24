<?php
ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$cet=$_POST["txtdet"];
	$rate=$_POST["txtrate"];
	$type=$_POST["seltype"];
	$photoName1=$_FILES["filepic"]["name"];
	$pathName1=$_FILES["filepic"]["tmp_name"];
	move_uploaded_file($pathName1,"../Assets/File/UserDocs/ServicePhoto/".$photoName1);
	
		 $ins="INSERT INTO tbl_service(service_name,service_details,service_rate,service_photo,type_id) VALUES
	 ('$name','$cet','$rate','$photoName1','$type')";
	   mysql_query($ins);
	
	 
	 
	   header("location:Service.php");
}
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_service WHERE service_id='$did'";
   mysql_query($delqry);
   header("location:Service.php");
   }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Service</title>
</head>
<body>
<a href="Homepage.php">Home</a>
<form action="#" method="post" enctype="multipart/form-data">
  <table width="374" height="203" border="1" align="center">
    <tr>
      <td>Service Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Detials</td>
      <td><label for="txtdet"></label>
      <input type="textarea" name="txtdet" id="txtdet" /></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="txtrate"></label>
      <input type="text" name="txtrate" id="txtrate" /></td>
    </tr>
     <td>Type</td>
      <td><label for="seltype"></label>
        <select name="seltype" id="seltype">
         <?php
			$selqry = "select * from tbl_type";
	echo $selqry;
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
      <td><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
      <input type="submit" name="btncancel" id="btncancel" value="CANCEL" /></td>
  
    </tr>
  </table>
</form>
 <table border="1" align="center">
 <tr>
 <td>Sl NO</td>
 <td>Service Name</td>
 <td>Service Detials</td>
 <td>Service Rate</td>
 <td>Service Photo</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_service p inner join tbl_service d on p.service_id=d.service_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["service_name"]?> </td>
         <td><?php echo $row["service_details"]?> </td>
         <td><?php echo $row["service_rate"]?> </td>
          <td><img src="../Assets/File/UserDocs/ServicePhoto/<?php echo $row["service_photo"]?>" width="75" height="75" /></td>
         <td>
          <a href="Service.php?did=<?php echo $row
		  ["service_id"]?>">Delete</a>
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