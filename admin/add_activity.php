<?php
	require_once '../connect.php';

	if(ISSET($_POST['save_activity'])){
		$title = $_POST['title'];
		$description = $_POST['description'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$day = date("D", strtotime($_POST['start']));
		$month = date("M", strtotime($_POST['start']));
		$year = date("Y", strtotime($_POST['start']));

		//validate date...
		$today = date("m/d/y",time());
		$start_date = date("m/d/y", strtotime($_POST['start']));
		$end_date = date("m/d/y", strtotime($_POST['end']));

		if($start_date < $today){
			echo "<script>
					var cnf = confirm('date is old');
					if(cnf){
						window.location = 'http://localhost:8080/admin/activity.php';
					}
				</script>";
			//header('location: activity.php');
		}
		else if($start_date > $end_date){
			echo "<script>
						var cnf = confirm('start time is greater than end time');
						if(cnf){
							window.location = 'http://localhost:8080/admin/activity.php';
						}
				</script>";
			//header('location: activity.php');
		}
		else{
			$conn->query("INSERT INTO `activity`(title, description, start, end, month, year) VALUES('$title', '$description', '$start', '$end', '$month', '$year')") 
				or die('an error occurred ' . $conn->error);
			//header('location: activity.php');
		}
	}
?>
