<?php

$id_user = $_COOKIE['user_id'];


$one_lesson_s = $_POST['time']; 
    $two_lesson_s = $_POST['time_two_s'];
    $three_lesson_s = $_POST['time_three_s'];
    $four_lesson_s = $_POST['time_four_s'];
    $five_lesson_s = $_POST['time_five_s'];
    $six_lesson_s = $_POST['time_six_s'];
    $seven_lesson_s = $_POST['time_seven_s'];

    $one_lesson_e = $_POST['time_one_e']; 
    $two_lesson_e = $_POST['time_two_e'];
    $three_lesson_e = $_POST['time_three_e'];
    $four_lesson_e = $_POST['time_four_e'];
    $five_lesson_e = $_POST['time_five_e'];
    $six_lesson_e = $_POST['time_six_e'];
    $seven_lesson_e = $_POST['time_seven_e'];

    $one_lesson = $one_lesson_s .'-'. $one_lesson_e; 
    $two_lesson = $two_lesson_s .'-'. $two_lesson_e;
    $three_lesson = $three_lesson_s .'-'. $three_lesson_e;
    $four_lesson = $four_lesson_s .'-'. $four_lesson_e;
    $five_lesson = $five_lesson_s .'-'. $five_lesson_e;
    $six_lesson = $six_lesson_s .'-'. $six_lesson_e;
    $seven_lesson = $seven_lesson_s .'-'. $seven_lesson_e;



            
    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }


    $sql = "UPDATE lesson_time SET one_lesson = '$one_lesson', two_lesson = '$two_lesson', three_lesson ='$three_lesson', four_lesson ='$four_lesson', five_lesson='$five_lesson', six_lesson='$six_lesson', seven_lesson='$seven_lesson' WHERE id_user = $id_user"; 
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }


?>

