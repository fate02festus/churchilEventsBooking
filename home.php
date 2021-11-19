<!DOCTYPE html>
<?php
   include_once('include/config.php');
	require_once 'logincheck.php';
	
	$date = date("d-m-Y");
?>
<html lang = "eng">
	<head>
		<title>CLIE</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	
			<link href="csss/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="csss/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="csss/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="jss/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->  
<link href="//fontss.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fontss.googleapis.com/css?family=Roboto" rel="stylesheet">

	</head>
<?php require 'script.php'?>
<body>
	<?php include "include/header.php"; ?>
	<?php include "include/sidebar.php"; ?>

<div id = "content">
		<br />
		<br />
		<br />
		<div id="chartContainer" style="width: 70%; ">
			<div class="container">
	<div class="popular-grids">
		<?php
				
						$query = $conn->query("SELECT * FROM `events` ORDER BY `id` asc") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
							
					?>
					<div class="col-md-4 popular-grid">
						
						<div class="popular-text">
							<h5><a href="book_event.php?id=<?php echo $fetch['id'] ?>" ><?php echo $fetch['name']?></a></h5><!--data-toggle="modal" data-target="#myModal2" -->
							<div class="detail-bottom">
								<ul>
									<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $fetch['date']?></li>
									<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $fetch['event_venue']?></li>
								</ul>
								<p><?php echo $fetch['description']?></p>
							</div>
						</div>
					</div>
					<?php
						}
						$conn->close();
					?>
					
			</div>
		</div>	
		
		</div>

		<img src = "images/ehrms.jpg" class = "background">	
		<?php include "include/footer.php"; ?>	
</body>
<?php
	include("script.php");
?>
</html>