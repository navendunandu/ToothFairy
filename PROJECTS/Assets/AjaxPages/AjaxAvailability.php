 <?php
 include("../Connection/Connection.php"); 
 $selslot="select * from tbl_slot where doctor_id=".$_GET['did']." and slot_date='".$_GET['date']."'";
 $resSlot=mysql_query($selslot);
 if($dataSlot=mysql_fetch_array($resSlot)){
	$selbooking="select count(app_id) as count from tbl_appointment where slot_id=".$dataSlot['slot_id'];
	 $resbooking=mysql_query($selbooking);
	 $databooking=mysql_fetch_array($resbooking);
	 if($dataSlot['slot_count']>$databooking['count'])
	 {
		 $slot=$databooking['count']+1;
		 ?>
         <input type="hidden" name='txtslot'  value="<?php echo $dataSlot['slot_id'] ?>"/>
  <table width="200" border="1">
    <tr>
      <td>Appointment Time</td>
      <td><label for="txtft"></label>
      <input type="text" name="txtft" id="txtft" readonly="readonly" value="<?php echo $dataSlot['slot_time'] ?>"/></td>
    </tr>
     <tr>
       <td>Token Number</td>
       <td><input type="text" name="txttoken" id="txttoken" readonly="readonly" value="<?php echo $slot ?>"/></td>
     </tr>
     <tr>
      <td colspan="2"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
  <?php
	 }
	 else{
		 echo '<h1 align="center">Slot Full</a>';
	 }
 }
 else{
	 echo '<h1 align="center">Doctor Not Available</a>';
 }