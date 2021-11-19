<?php
       include_once('include/config.php');
      
		if(ISSET($_POST['save_admin']))
		{
			$id='1';
			$code='AD';
			//get last docno
			$qq = mysqli_query($conn, "SELECT * FROM `sys_master` where id='$id'") or die(mysqli_error());
			$ff = mysqli_fetch_array($qq);
			$lno=intval($ff['last_no'])+1;
			$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
			$itr_no=$code.$ln;

			$username = $_POST['username']; 
			$password = md5($_POST['password']); 
			$firstname = $_POST['firstname']; 
			$middlename = $_POST['middlename']; 
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$idno = $_POST['idno'];  
			
			$ins="INSERT INTO `admin` (admin_id,username,password,firstname,middlename,lastname,idno,phone) VALUES('$itr_no', '$username', '$password', '$firstname', '$middlename', '$lastname','$idno','$phone')";//phone
				 $conn->query("update sys_master set last_no=last_no+1 where id='$id'") or die(mysqli_error());
				 if($conn->query($ins)===TRUE)
				{ ?>
                    <script type="text/javascript">
                        alert("Record added successfuly");
                    </script>
                <?php
                }else
                {
                    ?>
                        <script type="text/javascript">
                            alert("Error inserting record");
                        </script>
                    <?php
                }				
		}
		
