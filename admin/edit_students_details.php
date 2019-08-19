<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
<html lang = "eng">
	<head>
		<title>Internship portal management system</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Accounts/Administrator/Update</div>
				<a class = "btn btn-success" href = "admin.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_admin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
							$f_admin = $q_admin->fetch_array();
						?>
							<form method = "POST" action = "edit_students_query.php?admin_id=<?php echo $f_admin['admin_id']?>">	
								<div>
                                    <label>Username</label>
										<input type = "text" class = "form-control"  name = "userName"/>
									</div>
                                    <div class = "form-group">
										<label>Firstname</label>
										<input type = "text" class = "form-control"  name = "firstName"/>
									</div>
                                    <div class = "form-group">
										<label>lastname</label>
										<input type = "text" class = "form-control"  name = "lastName"/>
									</div>
									<div class = "form-group">
										<label>Password</label>
										<input type = "password" class = "form-control"  name = "password"/>
									</div>
                                    <div class = "form-group">
										<label>Email</label>
										<input type = "text" class = "form-control"  name = "userEmail"/>
									</div>
									<div class = "form-group">
										<label>gender</label>
										<input type = "text" class = "form-control"  name = "gender"/>
									</div>
								<div class = "form-group">
									<button class = "btn btn-warning form-control" name = "update_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
								</div>
							</form>	
						</div>	
					</div>
				</div>
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
		<label class = "navbar-brand pull-right">&copy; Internship portal management system <?php echo date('Y', strtotime('+8 HOURS'))?></label>
		<label class = "navbar-brand ">Developed By: Sheila Tandayag</label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>