<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
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
			


			$ins="INSERT INTO `events`(`id`,`name`, `description`, `event_venue`, `atendees`, `date`) VALUES ('$itr_no','$name','$description','$venue','$attendees','$date')";
		
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
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD EVENTS</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST"  enctype = "multi-part/form-data" ><!--action="add_event.php" -->
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "firstname">Name: </label>
							<input class = "form-control" type = "text" name = "name"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "middlename">Event Details: </label>
							<textarea class = "form-control" type = "text"  name = "description"></textarea>  
						</div>
						<div class = "form-group">
							<label for = "lastname">Event Venue: </label>
							<input class = "form-control" type = "text" name = "venue" required="required" >
						</div>
						
						<div class = "form-group">
							<label for = "lastname">Event Date: </label>
							<input class = "form-control" type = "date"  required="required" name="date">
						</div>
						<div class = "form-group">
							<label for = "lastname">Atendees: </label>
							<input class = "form-control" type = "number" min="1" name = "attendees" required="required" >
						</div>
						
							<button  class = "btn btn-primary" name = "save_event" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>	
									
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label> EVENTS</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<a href = "home.php" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> BACK</a>
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
						
								<a class = "btn btn-sm btn-info" href = "add_ticket.php?id=<?php echo $fetch['id']?>&name=<?php echo $fetch['name']?>"><i class = "glyphicon glyphicon-edit"></i> Add Tickets</a>
							
								<a class = "btn btn-sm btn-warning" href = "edit_event.php?id=<?php echo $fetch['id']?>&name=<?php echo $fetch['name']?>"><i class = "glyphicon glyphicon-edit"></i> Update</a> <a onclick="confirmationDelete(this);return false;" href = "delete_event.php?id=<?php echo $fetch['id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Archive</a></center></td>
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