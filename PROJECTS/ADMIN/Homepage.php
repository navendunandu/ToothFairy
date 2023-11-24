<?php
 ob_start();
    include('Head.php');
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <td>Welcome :: <?PHP echo  $_SESSION["adminame"] ?></td>
  </tr>
  <tr>
    <td><a href="AdminRegistration.php">AdminRegistration</a></td>
  </tr>
 
  <tr>
   <td><a href="category.php">Category</a></td>
  </tr>
  <tr>
    <td><a href="District.php">District</a></td>
  </tr>
  <tr>
    <td><a href="Place.php">Place</a></td>
  </tr>
  <tr>
    <td><a href="pharmacistReg.php">Pharmacist Registration</a></td>
  </tr>
  <tr>
    <td><a href="Service.php">Service</a></td>
  </tr>
  <tr>
    <td><a href="Type.php">Type</a></td>
  </tr>
  <tr>
  <tr>
    <td><a href="UserList.php">UserList</a></td>
  </tr> 
</table>
</body>
</html>
 <?php
include('Foot.php');
ob_flush();
?>