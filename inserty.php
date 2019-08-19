<?php
require_once('connect.php');
session_start();

$activity_id = $_SESSION['activity_id'];
$about = $_POST['about'];

if(isset($_POST['insert_button'])){
    $file_name = $_FILES['uploadfile']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_ext = array("doc", "docx", "pdf");
    if(!preg_match("/^[a-zA-Z'-]+$/", $_POST["first_name"]) || 
    !preg_match("/^[a-zA-Z'-]+$/", $_POST["last_name"])){
        echo "<script>
        var res = confirm('names should only contain uppercase and lowercase letters');
        if(res){
            window.location = 'http://localhost:8080/fill_details.php';
        }
        else{
            window.location = 'http://localhost:8080/fill_details.php';
        }
    </script>";
    }
    else if(!in_array($ext, $allowed_ext)){
        echo "<script>
                var res = confirm('file type not allowed');
                if(res){
                    window.location = 'http://localhost:8080/fill_details.php';
                }
                else{
                    window.location = 'http://localhost:8080/fill_details.php';
                }
            </script>";
    }
    else{
    $sql1 = "SELECT company_name, first_name, last_name, email, gender, file FROM fill_details WHERE 
    company_name='$_POST[company_name]' AND first_name='$_POST[first_name]' AND last_name='$_POST[last_name]' AND email='$_POST[email]' AND gender='$_POST[gender]' 
    AND file='$file_name'";
    //$sql1 = "SELECT company_name WHERE company_name='$_POST[company_name]'";
    if($result = mysqli_query($conn, $sql1)){
        $row_count = mysqli_num_rows($result);
        if($row_count > 0){
            echo "<script>alert('you have already applied for this internship');</script>";
            header('location: fill_details.php');
        }
        else{
            $sql2="INSERT INTO fill_details (company_name, first_name, last_name,email,gender,file, activity_id,about)
            VALUES( '$_POST[company_name]','$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[gender]','$file_name','$activity_id','$about')";
         
            if(!mysqli_query($conn, $sql2)){
                die('Error: ' . $conn->error);
            }
            include_once 'file_uploading/upload.php';
            header('location: file_uploading/index.php');
            mysqli_close($conn);
        }
    }else{die('error' . mysqli_error($conn));}
}
}
?>
<!--
<html>
<body>
<form action="<?php //echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    Upload your CV:
    <input type="file" name="uploadfile" id="uploadfile" required/>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body> 
<html/>
-->