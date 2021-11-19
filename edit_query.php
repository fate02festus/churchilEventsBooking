<?php
    include_once('include/config.php');
	$id = $_GET['id'];
	//$last = $_GET['lastname'];
	if(ISSET($_POST['edit_admin'])){
		$last = $_GET['lastname'];
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$idno = $_POST['idno'];
			$ins="UPDATE `admin` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `middlename` ='$middlename', `lastname` = '$lastname', `phone` = '$phone' WHERE `admin_id` = '$id'" or die(mysqli_error());
			if($conn->query($ins)===TRUE)
				 { 
              			 echo "<script>alert('Record updated succesifully')</script>";
                
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }
			//header("location: admin.php");
		}
	
if(ISSET($_POST['edit_event'])){
			$name = $_POST['name']; 
			$venue = $_POST['venue']; 
			$date = $_POST['date']; 
			$description = $_POST['description']; 
			$attendees = $_POST['attendees'];
			

			$ins="UPDATE `events` SET `name`='$name',`description`='$description',`event_venue`='$venue',`atendees`='$attendees',`date`='$date' WHERE `id`='$id'" or die(mysqli_error());
			if($conn->query($ins)===TRUE)
				 { 
              			 echo "<script>alert('Event updated succesifully')</script>";
                
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }
		}	
	if(ISSET($_POST['book_event'])){
		   //ticket no.
		   $idd='3';
			$code='TC';
			//get last docno
			$qq = mysqli_query($conn, "SELECT * FROM `sys_master` where id='$idd'") or die(mysqli_error());
			$ff = mysqli_fetch_array($qq);
			$lno=intval($ff['last_no'])+1;
			$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
			$itr_no=$code.$ln;

			$id = $_POST['id']; 
			$name = $_POST['name'];
			$fname = $_POST['fname']; 
			$mname = $_POST['mname']; 
			$lname = $_POST['lname']; 
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$type = $_POST['type'];  
			$tickets = $_POST['tickets'];
			$amount = $_POST['amount'];

			$ins="INSERT INTO `event_trans`( `id`,`event`, `firstname`, `middlename`,`lastname`, `phone`, `email`, `ticket_type`, `ticket_no`, `amount`) VALUES ('$idd','$id','$fname','$mname','$lname','$phone','$email','$type','$tickets','$amount')" or die(mysqli_error());
			$conn->query("update ticket_trans set capacity=capacity-'$tickets' where event='$id' and id='$type'");
			if($conn->query($ins)===TRUE)
				 { 
				 	    // the message
					$msg = "Dear ".$fname." ,Thank you for booking Ticket for ". $name. " Event. Your ticket number is ".$itr_no ;

					// use wordwrap() if lines are longer than 70 characters
					$msg = wordwrap($msg,70);

					// send email
					mail("mutisofestus02@gmail.com","TICKET BOOKING",$msg);
				 	//SEND EMAIL
              			 echo "<script>alert('Event updated succesifully')</script>";
                
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }
		}	
			
	if(ISSET($_POST['add_ticket'])){
			$id = $_POST['event']; 
			$type = $_POST['type']; 
			$capacity = $_POST['capacity']; 
			$amount = $_POST['amount'];

			$ins="INSERT INTO `ticket_trans`( `name`, `capacity`, `amount`, `event`) VALUES ('$type','$capacity','$amount','$id')" or die(mysqli_error());
			if($type=="REGULAR")
				$conn->query("update events set reg_tickets='$capacity' where id='$id'");
			else if($type=="VIP")
				$conn->query("update events set vip_tickets='$capacity' where id='$id'");

			if($conn->query($ins)===TRUE)
				 { 
				 	//SEND EMAIL
              			 echo "<script>alert('Event Tickets added succesifully')</script>";
                
                }else{
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }
		}	