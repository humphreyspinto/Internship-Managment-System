<?php
	require_once '../connect.php';
	require 'session.php';
	$id = $_GET['id'];
	$res = $conn->query("DELETE FROM `fill_details` WHERE id = '$id'") or die($conn->error . 'query' . '');
	header('location:student.php');
?>