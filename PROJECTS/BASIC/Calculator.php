<?php
$result="";
if(isset($_POST["btnadd"]))
	{
		$Number1=$_POST["txtnumber1"];
		$Number2=$_POST["txtnumber2"];
		$sum=$Number1+$Number2;
		$result="sum is".$sum;
	}
if(isset($_POST["btnsub"]))
	{
		$no1=$_POST["txtnumber1"];
		$no2=$_POST["txtnumber2"];
		$diff=$no1-$no2;
		$result="diff is".$diff;
	}
if(isset($_POST["btnmul"]))
	{
		$no1=$_POST["txtnumber1"];
		$no2=$_POST["txtnumber2"];
		$product=$no1*$no2;
		$result="product is".$product;
	}
if(isset($_POST["btndiv"]))
	{
		$no1=$_POST["txtnumber1"];
		$no2=$_POST["txtnumber2"];
		$que=$no1/$no2;
		$result="quotient is".$que;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculator</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Number1</td>
      <td><label for="txtnumber2"></label>
        <label for="txtno1"></label>
        <input type="text" name="txtnumber1" id="txtnumber1" />
<label for="txtnumber4"></label></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtnumber3"></label>
        <label for="txtno2"></label>
        <input type="text" name="txtnumber2" id="txtnumber2" />
<label for="txtnumber5"></label></td>
    </tr>
    <tr>
      <td>Operator</td>
      <td><input type="submit" name="btnadd" id="btnadd" value="+" />
      <input type="submit" name="btnsub" id="btnsub" value="-" />
      <input type="submit" name="btnmul" id="btnmul" value="*" />
      <input type="submit" name="btndiv" id="btndiv" value="/" /></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>
</body>
</html>