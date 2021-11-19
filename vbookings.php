<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$id = $_GET['id'];	
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
				<label><?php echo $_GET['name']; ?> BOOKINGS</Label>
			</div>
			<div class = "panel-body">
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Phone No</th>
							<th>Email</th>
							<th>Tickets</th>
							<th>Amount</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					$idd=0;
						$query = $conn->query("SELECT concat(firstname,' ',middlename,' ',lastname) as name,phone,email,ticket_no,amount FROM `event_trans` where id='$id' ORDER BY `id` asc") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
							$idd++;
							
			
					?>
						<tr>
							<td><?php echo $idd?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['phone']?></td>
							<td><?php echo $fetch['email']?></td>
							<td><?php echo $fetch['ticket_no']?></td>
							<td><?php echo $fetch['amount']?></td>
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