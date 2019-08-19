<?php
    require '../email.php';
    require '../connect.php';

    $id = $_GET['id'];
    $res = $conn->query("SELECT `email`,`activity_id` FROM `fill_details` WHERE id = '$id'") or die('SQL error'. $conn->error . 'query' . '');
    if($res->num_rows > 0){
        $data = $res->fetch_array(MYSQLI_NUM);
        $email = $data[0];
        $acv_id = $data[1];

        $res = $conn->query("SELECT `title`,`start`,`end` FROM `activity` WHERE activity_id = '$acv_id'") or die('SQL error'. $conn->error);
        $acv_data = $res->fetch_array(MYSQLI_NUM);
        $title = $acv_data[0];
        $start = date("M d, Y", strtotime($acv_data[1]));
        $end = date("M d, Y", strtotime($acv_data[2]));
        $res = send_mail($email, "You have been accepted for our internship " . $title . " starting on " . $start . " and ending on " . $end);
        if($res){echo "<script>
        var cnf = confirm('sent acceptance message to applicant');
        if(cnf){
            window.location = 'http://localhost:8080/admin/student.php';
        }else{window.location = 'http://localhost:8080/admin/activity.php';}
        </script>";}
        else{
            echo "<script>
        var cnf = confirm('error occured sending message');
        if(cnf){
            window.location = 'http://localhost:8080/admin/student.php';
        }else{window.location = 'http://localhost:8080/admin/activity.php';}
        </script>";}
    }
    //header('location: student.php');
?>