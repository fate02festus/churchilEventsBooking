<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>CLEA</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<?php include "include/header.php"; ?>
	<?php include "include/sidebar.php"; ?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<?php
		     include_once('include/config.php');
			$query = $conn->query("SELECT * FROM `events` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>EDIT EVENT TICKETS</label>
				<a href = "events.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						
						<div class = "form-group">
							<label for = "firstname">Name: </label>
							<input  type = "text" name = "event" hidden="hidden" value = "<?php echo $fetch['id'] ?>"  required = "required" >
							<input class = "form-control" type = "text" name = "name"  value = "<?php echo $fetch['name'] ?>"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "firstname">Capacity: </label>
							<input class = "form-control" type = "text" name = "cap"  value = "<?php echo $fetch['atendees'] ?>"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "middlename">Ticket Type: </label>
							<select class = "form-control" name="type" required="required">
								<option value = "REGULAR">REGULAR</option>
								<option value = "VIP">VIP</option>
							</select>  
						</div>
						<div class = "form-group">
							<label for = "lastname">Ticket Capacity: </label>
							<input class = "form-control" type = "number" min="1" name = "capacity" required="required" >
						</div>
						<div class = "form-group">
							<label for = "lastname">Ticket Price: </label>
							<input class = "form-control" type = "number" min="1" name = "amount" required="required" >
						</div>
							<button  class = "btn btn-warning" name = "add_ticket" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>
					<?php require 'edit_query.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
	</div>
	<?php include "include/footer.php"; ?>	
<?php require'script.php' ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>