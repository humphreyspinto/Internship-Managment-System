<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
?>
<html lang = "eng">
	<head>
		<title>Egerton Internship management system</title>
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

<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Accounts/students</div>
				<button type = "button" id = "add_admin" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add New student</button>
				<button style = "display:none;" type = "button" id = "cancel_admin" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "a_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th>Username</th>
									<th>Firstname</th>
									<th>Pastname</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Gender</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$a_query = $conn->query("SELECT * FROM `registered_users`") or die(mysqli_error());
									while($a_fetch = $a_query->fetch_array()){
										
								?>
								<tr>
									<td><?php echo $a_fetch['user_name']?></td>
                                    <td><?php echo $a_fetch['first_name']?></td>
                                    <td><?php echo $a_fetch['last_name']?></td>
									<td><?php echo md5($a_fetch['password'])?></td>
                                    <td><?php echo $a_fetch['email']?></td>
									<td><?php echo $a_fetch['gender']?></td>
									<td><center><a href = "edit_students.php?admin_id=<?php echo $a_fetch['admin_id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $a_fetch['admin_id']?>" data-toggle = "modal" data-target = "#delete_admin" class = "btn btn-danger admin_id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_admin" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "a_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Accounts/students/Add new</div>
							<div style = "width:40%; margin-left:32%;">	
								<form method = "POST" action = "#">	
									<div class = "form-group">
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
										<button class = "btn btn-primary form-control" name = "save_admin"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
		<label class = "navbar-brand pull-right">&copy; Egerton Internship management system <?php echo date('Y', strtotime('+8 HOURS'))?></label>
	</nav>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.admin_id').on('click', function(){
			$admin_id = $(this).attr('name');
			$('.delete_admin').on('click', function(){
				window.location = 'delete_admin.php?admin_id=' + $admin_id;
			});
		});
	});
</script>
</html>
