<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	
      
			
?>
<html lang = "eng">
	<head>
		<title>CLEA</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<?php include "include/header.php"; ?>
	<?php include "include/sidebar.php"; ?>
	<div id = "content">
		<br />
		<br />
		<br />
			
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label> EVENTS</Label>
			</div>
			<div class = "panel-body">
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Venue</th>
							<th>Date</th>
							<th>Capacity</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
					$idd=0;
						$query = $conn->query("SELECT * FROM `events` ORDER BY `id` asc") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
							$idd++;
							
			
					?>
						<tr>
							<td><?php echo $idd?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['event_venue']?></td>
							<td><?php echo $fetch['date']?></td>
							<td><?php echo $fetch['atendees']?></td>
							<td><center>
								<a class = "btn btn-sm btn-info" href = "vbookings.php?id=<?php echo $fetch['id']?>&name=<?php echo $fetch['name']?>"><i class = "glyphicon glyphicon-edit"></i> View Bookings</a>
							
								</center></td>
						</tr>
					<?php
						}
						$conn->close();
					?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	<?php include "include/footer.php"; ?>	
	
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('Are you sure want to delete this record?');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>