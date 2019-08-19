<!DOCTYPE html>
<?php
	require_once 'session.php';
?>
<html lang = "eng">
	<head>
		<title>Egerton Internship System</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">Home</div>
			<div class = "alert alert-success"><center><h3>VISION</h3></center></div>
			<h4 style = "text-indent:50px;">Excellence in producing highly skilled, well qualified students in the job industry.</h4>
			<br />
			<div class = "alert alert-success"><center><h3>MISSION</h3></center></div>
			<h4 style = "text-indent:50px;">Committed to provide affordable and high quality workers.</h4>
			<br />
			<div class = "alert alert-success"><center><h3>OBJECTIVE</h3></center></div>
			<ol>
				<li><h4>Possess knowledge and skills that would prepare students to improve their working skills through work related learning </h4></li>
				<li><h4>Prepare student to be well equiped in the job industry . </h4></li>
				<li><h4>Be proficient in designing and developing computing solutions</h4></li>

			</ol>
		<br /><br /><br />
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<nav class = "navbar-default" id = "footer">
		<label class = "navbar-brand pull-right">&copy; Egerton Internship management system  <?php echo date('Y', strtotime('+8 HOURS'))?></label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
</html>
