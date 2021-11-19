<?php
      include_once('include/config.php');
      
		if(ISSET($_POST['save_event']))
		{
			$id='2';
			$code='EV';
			//get last docno
			$qq = mysqli_query($conn, "SELECT * FROM `sys_master` where id='$id'") or die(mysqli_error());
			$ff = mysqli_fetch_array($qq);
			$lno=intval($ff['last_no'])+1;
			$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
			$itr_no=$code.$ln;
			//===
			$name = $_POST['name']; 
			$venue = $_POST['venue']; 
			$date = $_POST['date']; 
			$description = $_POST['description']; 
			$attendees = $_POST['attendees'];
			


			$ins="INSERT INTO `events`(`id`,`name`, `description`, `event_venue`, `atendees`, `date`) VALUES ('$itr_no',$name','$description','$venue','$attendees','$date')";
			//$conn->query("INSERT INTO `event_type`( `name`, `capacity`, `event`) VALUES ('$name','[value-3]','$itr_no') ");
				if($conn->query($ins)===TRUE)
				{ ?>
                    <script type="text/javascript">
                        alert("Record added successfuly");
                    </script>
                <?php
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }				
		}	
