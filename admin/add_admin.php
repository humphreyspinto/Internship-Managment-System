<?php
	require_once '../connect.php';
	require_once '../email.php';

	if(isset($_POST['save_admin'])){	
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = bin2hex(random_bytes(5));
		$name = $_POST['name'];

		$msg = "You have been added as a new admin.\nHere are your credentials. Please reset your password\nUsername: " . $username . "\nPassword: " . $password;
		$res = send_mail($email, $msg);
		if($res){
			echo "<script>
			var cnf = confirm('username and password sent');
			if(cnf){
				window.location = 'http://localhost:8080/admin/admin.php';
			}else{window.location = 'http://localhost:8080/admin/activity.php';}
			</script>";die();
		}
		else{
			echo "
			<script>
			var cnf = confirm('username and password not sent');
			if(cnf){
				window.location = 'http://localhost:8080/admin/admin.php';
			}else{window.location = 'http://localhost:8080/admin/activity.php';}
			</script>";
			die();
		}
	
		$a_query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$a_valid = $a_query->num_rows;
		if($a_valid > 0){
			echo "<script>alert('Username already taken')</script>";
			echo "<script>window.location = 'admin.php'</script>";
		}else{
			$conn->query("INSERT INTO `admin`(username, password, name) VALUES('$username', '$password', '$name')") or die(mysqli_error($conn));
			header('location:admin.php');
		}
	}	
?>