
<!DOCTYPE html>
<html lang="en">
<head>
<title>CLIA | Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Events Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
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
<!-- //web-fonts -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
	<!-- banner -->
	<div class="w3ls-banner-1"> 
		<!-- banner-text --> 
	
	<!-- //banner --> 
			<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Events</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.html">Events</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							
							<li><a class="hvr-sweep-to-right" href="index.php">Back</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->
	</div>	
	<!-- events -->
	<!--Events --> 
		
		<div class="container">
				<div class="popular-grids">
					<div>
		
		<div class = "panel panel-success">	
		<?php
		     include_once('include/config.php');
		     $id=$_GET['id'];
			$query = $conn->query("SELECT * FROM `events` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
			
			//
			$rows = mysqli_query($conn, "SELECT * FROM `ticket_trans` where event='$_GET[id]'") or die(mysqli_error());
		$row11 = mysqli_fetch_all($rows);
		?>
			
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "middlename">Event: </label>
							<input type = "hidden"  name = "id" value = "<?php echo $id ?>"> 
							<input class = "form-control" type = "text"  name = "name" value = "<?php echo $fetch['name'] ?>">  
						</div>
						<div class = "form-group">
							<label for = "firstname">First Name: </label>
							<input class = "form-control" type = "text" name = "fname"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "firstname">Middle Name: </label>
							<input class = "form-control" type = "text" name = "mname"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "firstname">Last Name: </label>
							<input class = "form-control" type = "text" name = "lname"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "firstname">Phone No: </label>
							<input class = "form-control" type = "text" name = "phone"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "firstname">Email: </label>
							<input class = "form-control" type = "email" name = "email"  required = "required" >
						</div>
						<div class = "form-group">
							<label for = "lastname">Ticket Type: </label>
							<select class = "form-control" onChange="getAmt(this.value);" name="type" required="required">
								<?php foreach ($row11 as $p1) {?>
								<option value = "<?php echo $p1['0'];?>"><?php echo $p1['1'];?></option>
								 <?php } ?>
							</select>
						</div>
						<div id= "subject" class = "form-group">
							
						</div>						
						<div class = "form-group">
							<label for = "lastname">No of Tickets: </label>
							<input class = "form-control" type = "number" min="1" max="5" name = "tickets"  required="required" type="Book upto five tickets">
						</div>
						<div class = "form-group">
							<label for = "username">Amount </label>
							<input class = "form-control" type = "number" min="1" name = "amount" required="required" >
						</div>
							<button  class = "btn btn-warning" name = "book_event" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>
					<?php require 'edit_query.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
	</div>
					
			</div>
		</div>
			<div class="copy-right">
				<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
						<div class="copy-left">
						<p>&copy; 2021 Events. All rights reserved | Design by <a href="#">CLIE</a></p>
						</div>
					</div>
				<div class="col-md-6 col-sm-6 col-xs-6 top-middle">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					</div>
			</div>
			

<!-- //bootstrap-modal-pop-up --> 
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-2.2.3.min.js"></script> 
	
<!-- skills -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},100);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script>
function getAmt(val) {
    $.ajax({
    type: "POST",
    url: "get-amt.php",
    data:'classid='+val,
    success: function(data){
        $("#subject").html(data);
        
    }
    });
    }
</script>
</body>
</html>