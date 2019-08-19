<?php

	require 'session.php';
	require '../connect.php';
	session_start();

	$old_password = $new_password = $confirm_new_password = $errors = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['old_password']) && isset($_POST['new_password']) 
			&& isset($_POST['confirm_new_password'])){
				$username = $_SESSION['admin_username'];
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];
				$confirm_new_password = $_POST['confirm_new_password'];
				
				if(empty($_POST['old_password']) || empty(empty($_POST['new_password'])) 
					|| empty($_POST['confirm_new_password'])){
					if(empty($_POST['old_password'])){
						$errors .= '<br /> <br/> <br /> error old password is empty <br />';
					}
					if(empty($_POST['new_password'])){
						$errors .= '<br /> error new password is empty <br />';
					}
					if(empty($_POST['confirm_new_password'])){
						$errors .= '<br/> error you need to provide a confirm password <br />';
					}
				}
				if(!empty($errors)){
					goto end;
				}
				if(!strcmp($new_password, $confirm_new_password)){
					$query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$old_password'") or die(mysqli_error());
					if($query->num_rows > 0){
						$set_pass = $conn->query("UPDATE `admin`SET `password` = '$new_password' WHERE `username` = '$username'") 
							or die('An sql error occured ' . $conn->error);
						if($set_pass){
							echo "<script>
							var cnf = confirm('password reset was successful');
							if(cnf){
								window.location = 'http://localhost:8080/admin/student.php';
							}else{window.location = 'http://localhost:8080/admin/activity.php';}
							</script>";}
							else{
								echo "<script>
							var cnf = confirm('error occured resetting your password');
							if(cnf){
								window.location = 'http://localhost:8080/admin/student.php';
							}else{window.location = 'http://localhost:8080/admin/activity.php';}
							</script>";}
						
					}
					else die('error: no one found with username ' . $username);
				}
				else die('error: passwords do not match');
		}
		else{
		}
	}
	end:
		echo $errors;
?>

<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Internship portal management system</title>
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
	<div class = "container-fluid" id = "content">
		<div class = "row">	
			<div class = "col-md-2">	
			</div>
			<div class = "col-md-2">	
			</div>
			<div class = "col-md-4">	
				<div class = "panel panel-primary">
					<div class = "panel-heading">
						<h4>Administrator Reset Password</h4>
					</div>
					<div class = "panel-body">
						<form method = "POST" enctype = "multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class = "form-group">
								<label>Old Password</label>
								<input type = "password" name = "old_password" class = "form-control" />
							</div>
							<div class = "form-group">
								<label>New Password</label>
								<input type = "password" maxlength = "12" name = "new_password" class = "form-control" />
							</div>
                            <div class = "form-group">
								<label>Confirm New Password</label>
								<input type = "password" maxlength = "12" name = "confirm_new_password" class = "form-control" />
							</div>
							<div id = "loading">
							</div>
							<br />
							<div class = "form-group">
								<button type = "submit" class = "btn btn-primary form-control" id = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
							</div>
						</form>
					</div>
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
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>

</html>
