<?php
	session_start();
	include_once('include/config.php');
	if(ISSET($_POST['login']))
	{
		$username = $_POST['username'];
		$password =md5($_POST['password']);
		    
				
			$query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
					
			$fetch = $query->fetch_array();
		    $valid = $query->num_rows;
			if($valid > 0)
			{
				$_SESSION['admin_id'] = $fetch['admin_id'];
				header("location:home.php");
			}
			else
			{
				echo "<script>alert('Invalid Admin username or password')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}

		
	}
	$conn->close();
	