<?php
  ob_start();
    include('Head.php');
 include("../Assets/Connection/Connection.php");  //open connection
 if(isset($_POST["btnsave"]))
 {
       $catname=$_POST["txtcat"];
	   $ins="insert into tbl_category(category_name)values('$catname')";
	   mysql_query($ins);
 }
 if(isset($_GET["did"]))
   {
	   $did = $_GET["did"];
   $delqry="DELETE FROM  tbl_category WHERE category_id ='$did'";
   mysql_query($delqry);
   header("location:category.php");
   }
 
 
 ?>
<title>Category</title>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>category name</td>
      <td><label for="txtcat"></label>
      <input type="text" name="txtcat" id="txtcat"  title="NameAllows Only Alphabets,Spaces and First Letter Must Be Capital
Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<table width="200" border="1" align="center">
<tr> 
    <td>SL.NO</td>
    <td>category</td>
    <td>Action</td>

    <?php
	$i=0;
	$selqry = "select * from tbl_category";
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    $i++;
			?>
       <tr>
         <td><?php echo $i?> </td>
         <td><?php echo $row["category_name"]?> </td>
         <td>
          <a href="category.php?did=<?php echo $row
		  ["category_id"]?>">Delete</a>
          </td>
             </tr>
             <?php
	}
   ?>
<?php
include('Foot.php');
ob_flush();
?>