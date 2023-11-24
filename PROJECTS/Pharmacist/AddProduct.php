<?php
ob_start();
    include('Head.php');
include("../Assets/Connection/Connection.php"); 
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$rate=$_POST["txtrate"];
	$det=$_POST["txtdet"];
  $sel=$_POST["selcat"];
	$photoName1=$_FILES["fileimg"]["name"];
	$pathName1=$_FILES["fileimg"]["tmp_name"];
	move_uploaded_file($pathName1,"../Assets/File/ProductDocs/".$photoName1);
	
		 $ins="INSERT INTO `tbl_product`(`product_name`, `product_rate`, `product_details`, `product_image`,category_id) VALUES  ('$name','$rate','$det','$photoName1','$sel')";
	   mysql_query($ins);
	 
	  header("location:AddProduct.php");
}
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  `tbl_product` WHERE product_id='$did'";
   mysql_query($delqry);
   header("location:AddProduct.php");
   }
 
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AddProduct</title>
</head>

<body>
<form action="AddProduct.php" method="post" enctype="multipart/form-data">
  <table width="261" height="156" border="1">
    <tr>
      <td width="92">Product Name</td>
      <td width="112"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Product Rate</td>
      <td><label for="txtrate"></label>
      <input type="text" name="txtrate" id="txtrate" /></td>
    </tr>
    <tr>
      <td>Product Detials</td>
      <td><label for="txtdet"></label>
      <textarea name="txtdet" id="txtdet" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Product Image</td>
      <td><label for="fileimg"></label>
      <input type="file" name="fileimg" id="fileimg" /></td>
    </tr>
    <tr>
      <td >category</td>
      <td><label for="selcat"></label>
     <select name="selcat" id="selcat" required="required">
     <?php
     $selqry = "select * from tbl_category";
     $data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		 
			?>
             <option value="<?php echo $row["category_id"]?>"><?php echo $row["category_name"]?></option>
             <?php
	}
	?>
      </select></td>
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
 <td>Product Name</td>
 <td>Product Rate</td>
 <td>Product Detials</td>
 <td>Product Photo</td>
 <td>Stock</td>
  <td>Action</td>
 </tr>
          <?php
	$i=0;
	$selqry = "select * from tbl_product p inner join tbl_product d on p.product_id=d.product_id";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["product_name"]?> </td>
         <td><?php echo $row["product_rate"]?> </td>
         <td><?php echo $row["product_details"]?> </td>
          <td><img src="../Assets/File/ProductDocs/<?php echo $row["product_image"]?>" width="75" height="75" /></td>
         <td><a href="Stock.php?did=<?php echo $row
		  ["product_id"]?>">Stock</a></td>
          <td>
          <a href="AddProduct.php?did=<?php echo $row
		  ["product_id"]?>">Delete</a>
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