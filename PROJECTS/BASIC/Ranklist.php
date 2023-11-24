<?php
$name="";
$gender="";
$dept="";
$total="";
$per="";
$grade="";

if(isset($_POST["btnsubmit"]))
{
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtfname"];
	
	$gender=$_POST["gender"];
	$dept=$_POST["SelDept"];
	
	$m1=$_POST["txtmark1"];
	$m2=$_POST["txtmark2"];
	$m3=$_POST["txtmark3"];
	
	$total=$m1+$m2+$m3;
	$per=($total/300)*100;
	
	if($gender=="Male")
	{
		$name="Mr. ".$fname." ".$lname;
	}
	if($gender=="Female")
	{
		$name="Ms. ".$fname." ".$lname;
	}
	
	if($per>=90)
	{
		$grade="A+";
	}
	else if($per>=80)
	{
		$grade="A";
	}
	else if($per>=80)
	{
		$grade="B+";
	}
	else if($per>=80)
	{
		$grade="B";
	}
	else if($per>=80)
	{
		$grade="c+";
	}
	else if($per>=80)
	{
		$grade="c";
	}
	else if($per>=80)
	{
		$grade="d+";
	}
	else if($per>=80)
	{
		$grade="d";
	}
	else
	{
		$grade="Failed";
	}

}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RankList</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
 <table width="287" border="1">
  <tr>
    <td width="131">First Name</td>
    <td width="140">
      <label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" />
 </td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td>
      <label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" />
   </td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><input type="radio" name="gender" id="gender" value="Male" />Male
      
        <input type="radio" name="gender" id="gender" value="Female" />Female
        <label for="grnder"></label>
    
      <label for="gender"></label>
     
      <label for="rbmale"></label>
<label for="rbfemale"></label>
<label for="rbfemale"></label>
  
        <label for="rdgender"></label>
</td>
  </tr>
  <tr>
    <td>Department</td>
    <td>
      <label for="SelDept"></label>
      <select name="SelDept" size="1"  id="SelDept">
        <option value="BCA" selected="selected">BCA</option>
        <option value="BBA">BBA</option>
        <option value="MCA">MCA</option>
        <option value="BCOM">BCOM</option>
      </select>
  </td>
  </tr>
  <tr>
    <td>Mark1</td>
    <td>
      <label for="txtmark1"></label>
      <input type="text" name="txtmark1" id="txtmark1" />
  </td>
  </tr>
  <tr>
    <td>Mark2</td>
    <td>
      <label for="txtmark2"></label>
      <input type="text" name="txtmark2" id="txtmark2" />
   </td>
  </tr>
  <tr>
    <td>Mark3</td>
    <td>
      <label for="txtmark3"></label>
      <input type="text" name="txtmark3" id="txtmark3" />
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
   </td>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $name?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $gender?></td>
  </tr>
  <tr>
    <td>Department</td>
    <td><?php echo $dept?></td>
  </tr>
  <tr>
    <td>Total</td>
     <td><?php echo $total?></td>
  </tr>
  <tr>
    <td>Percentage</td>
    <td><?php echo $per?></td>
  </tr>
  <tr>
    <td height="23">Grade</td>
    <td><?php echo $grade?></td>
  </tr>
</table>
</form>

</body>
</html>
