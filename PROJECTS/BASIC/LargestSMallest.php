<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LargeSmall</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Number1</td>
      <td><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php $largest ?></td>
    </tr>
    <tr>
      <td><p>Smallest</p></td>
      <td><?php $smallest ?> </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
$largest="";
$smallest="";
if(isset($_POST["submit"]))
	{
		$num1=$_POST["txtnumber1"];
		$num2=$_POST["txtnumber2"];
		if($num1>$num2)
			{
				$largest="largest number is".$num1;
				$smallest="smallest number is ".$num2;
			}
			else
			{
				$largest="largest number is".$num2;
				$smallest="smallest number is ".$num1;
			}

	}
?>			