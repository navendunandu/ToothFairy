<?php
 ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnsubmit"]))
{
	$exp=$_POST["txtdate"];
	$qty=$_POST["txtqty"];
  $product=$_POST['txtid'];
	 $ins="INSERT INTO `tbl_stock`(`stock_date`, `stock_quantity`, `product_id`) VALUES ('$exp','$qty','$product')";
	  mysql_query($ins);
	 
	  header("location:AddProduct.php");
	}
	if(isset($_GET["det"]))
   {
	   $did = $_GET["det"];
   $delqry="DELETE FROM  `tbl_stock` WHERE stock_id='$det'";
   mysql_query($delqry);
   header("location:Stock.php");
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
</head>

<body><form action="Stock.php" method="post">
  <input type="hidden" name="txtid" value='<?php echo $_GET['did'] ?>'>
  <table width="291" border="1" align="center">
    <tr>
      <td width="131"><p>Product Expiry</p></td>
      <td width="144"><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate"  required="required"/></td>
    </tr>
    <tr>
      <td>Product Quantity</td>
      <td><label for="txtqty"></label>
      <input type="text" name="txtqty" id="txtqty"  required="required"/></td>
    </tr>
     <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="SUBMIT" />
      <input type="submit" name="btncancel" id="btncancel" value="CANCEL" /></td>
  
    </tr>
  </table>
</form>
<table border="5" align="center">
 <tr>
 <td>Sl NO</td>
 <td>Expiry</td>
 <td>Quantity</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_stock p inner join tbl_stock d on p.stock_id=d.stock_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
             <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["stock_date"]?> </td>
         <td><?php echo $row["stock_quantity"]?> </td>
        <td> <a href="Stock.php?det=<?php echo $row
		  ["stock_id"]?>">Delete</a></td>
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