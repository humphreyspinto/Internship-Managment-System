<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_admin'])){
		$username = $_POST['userName'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
		$password = $_POST['password'];
        $email = $_POST['userEmail'];
		$gender = $_POST['gender'];
		$q_admin = $conn->query("SELECT * FROM `registered_users` WHERE `username` = '$username'") or die(mysqli_error());
		$v_admin = $q_admin->num_rows;
		if($v_admin > 0){
			echo '<script>alert("Username already taken");</script>';
			echo '<script>window.location = "edit_admin.php?admin_id=" +'.$_REQUEST['admin_id'].'</script>';
		}else{
			$conn->query("UPDATE `admin` SET `username` = '$username', `first_name` = '$firstname','last_name'=' $lastname ' `password` = '$password', 'email'=' $email' ,'gender'='$gender' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
			header('location:admin.php');
		}
	}
?>