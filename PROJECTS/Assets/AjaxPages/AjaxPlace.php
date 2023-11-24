         <option>-----Select-----</option>

 <?php
 include("../Connection/Connection.php"); 

		
	$selqry = "select * from tbl_place where district_id =".$_GET['did'];
	
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    
			?>
             <option value="<?php echo $row["place_id"]?>"><?php echo $row["place_name"]?></option>
                     <?php
	}
	?>