<?php
	require_once '../connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
	$valid = $query->num_rows;
	$fetch = $query->fetch_array();
	if($valid > 0){
		echo 'Success';
		session_start();

		$_SESSION['admin_username'] = $username;
		$_SESSION['admin_id'] = $fetch['admin_id'];
		
	}else{
		echo 'Error';
	}