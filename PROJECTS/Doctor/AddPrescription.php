<?php
 ob_start();
 include('Head.php');
include("../Assets/Connection/Connection.php"); 
$did = $_GET["did"];
if(isset($_POST["btnsubmit"]))
{
	$replay=$_POST["txtem"];
   $ins="UPDATE `tbl_appointment` SET `app_replay`='$replay', `app_status`='1' where app_id=".$_POST['txtid'];
     mysql_query($ins);
    header("location:Bookings.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddPrescription</title>
</head>
<body>
<form action="AddPrescription.php" method="post" enctype="multipart/form-data">
  <table width="329" height="381" border="0">
<tr>
      <td ><input type="hidden" name="txtid" value=<?php echo $_GET['did'] ?>></td>
      <td><label for="txtem"></label>
      <textarea name="txtem" id="txtem" cols="30" rows="10"></textarea>
       <td colspan="2" ><input type="submit" name="btnsubmit" id="btnsubmit" value="UPDATE" />
  <input type="reset" name="btncancel" id="btncancel" value="CANCEL" /></td>
    </tr>
    </table>
</body>
</html>
 <?php
include('Foot.php');
ob_flush();
?>