<?php
include_once('include/config.php');
if(!empty($_POST["classid"])) 
{
 $cid=$_POST['classid'];
 $oc='0';
 		//$amt=$inv['amount'];
	$query = $conn->query("SELECT * FROM `ticket_trans` WHERE  id='$cid'") or die(mysqli_error());
			$fetch = $query->fetch_array();
?>
<label for = "username">Available Tickets: </label>
	<input class = "form-control" type = "number"  name = "cap" value="<?php echo $fetch['capacity'];?>" required="required" >
<label for = "username">Cost: </label>
	<input class = "form-control" type = "number" name = "cost" value="<?php echo $fetch['amount'];?>" required="required" >

 <?php

}
?>