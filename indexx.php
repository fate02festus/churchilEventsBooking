<!DOCTYPE html>
<?php include "include/config.php"; ?>
<html lang = "eng">
	<head>
		<title>CLIE</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<meta charset = "utf-8" />
<link rel = "shortcut icon" href = "images/logo.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />

<div class = "navbar navbar-default navtop">
		<img src = "images/hosl.jpg" style = "float:left;" height = "55px" /><label class = "navbar-brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHURCHILL LAUGH INDUSTRY EVENTS</label>
		
			
</div>
		<div id = "sidelogin">
			<form action = "login.php" enctype = "multipart/form-data" method = "POST" >
				<label class = "lbllogin">Please Login Here...</label>
				<hr /style = "border:1px dotted #000;">
				
				<div class = "form-group">
					<label for = "username">Username</label>
					<input class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					<input class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
	 </div>
		</div>	
		<img src = "images/ehrms.jpg" class = "background">	
		<?php include "include/footer.php"; ?>	
</body>

</html>