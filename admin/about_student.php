<?php
	require '../connect.php';

	$id = $_GET['id'];
	$sql = "SELECT first_name, about,last_name FROM `fill_details` WHERE id = '$id'";
	$res = $conn->query($sql) or die('sql error ' . $conn->error);
	if($res->num_rows > 0){
		$data = $res->fetch_array(MYSQLI_NUM);
		$first_name = $data[0];
		$about = $data[1];
		$second_name = $data[2];
	}
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
						<h4>About <?php echo $first_name . " " . $second_name ?></h4>
					</div>
					<div class = "panel-body">
                        <p><?php echo $about ?></p>
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
<script src = "../js/script.js"></script>
</html>