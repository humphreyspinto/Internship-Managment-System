<?php
include_once 'dbconfig.php';

if(isset($_FILES['uploadfile']))
{    
	$file = rand(1000,100000)."-".$_FILES['uploadfile']['name'];
    $file_loc = $_FILES['uploadfile']['tmp_name'];
	$file_size = $_FILES['uploadfile']['size'];
	$file_type = $_FILES['uploadfile']['type'];
	$folder="file_uploading/uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	if(move_uploaded_file($file_loc,$folder.$final_file)){
		$file = $_FILES['uploadfile']['name'];
		$link = $folder . $final_file;
		$sql = "UPDATE fill_details SET link = '$link' WHERE file = '$file'";
		mysqli_query($conn, $sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
		<?php
	}
	else
	{die('error '. $_FILES['uploadfile']['error'] . 'size ' . $file_size);
		?>
		<script>
		alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
		<?php
	}
}
else{
	header('location: ../index.php');
}
?>
