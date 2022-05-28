<?php

$id_user = $_COOKIE['user_id'];


$one_lesson1 = $_POST['one_lesson1']; 
$one_lesson2 = $_POST['one_lesson2']; 
$one_lesson3 = $_POST['one_lesson3']; 
$one_lesson4 = $_POST['one_lesson4']; 
$one_lesson5 = $_POST['one_lesson5']; 
$one_lesson6 = $_POST['one_lesson6']; 

$two_lesson1 = $_POST['two_lesson1']; 
$two_lesson2 = $_POST['two_lesson2']; 
$two_lesson3 = $_POST['two_lesson3']; 
$two_lesson4 = $_POST['two_lesson4']; 
$two_lesson5 = $_POST['two_lesson5']; 
$two_lesson6 = $_POST['two_lesson6']; 

$three_lesson1 = $_POST['three_lesson1']; 
$three_lesson2 = $_POST['three_lesson2']; 
$three_lesson3 = $_POST['three_lesson3']; 
$three_lesson4 = $_POST['three_lesson4']; 
$three_lesson5 = $_POST['three_lesson5']; 
$three_lesson6 = $_POST['three_lesson6']; 

$four_lesson1 = $_POST['four_lesson1']; 
$four_lesson2 = $_POST['four_lesson2']; 
$four_lesson3 = $_POST['four_lesson3']; 
$four_lesson4 = $_POST['four_lesson4']; 
$four_lesson5 = $_POST['four_lesson5']; 
$four_lesson6 = $_POST['four_lesson6']; 

$five_lesson1 = $_POST['five_lesson1']; 
$five_lesson2 = $_POST['five_lesson2']; 
$five_lesson3 = $_POST['five_lesson3']; 
$five_lesson4 = $_POST['five_lesson4']; 
$five_lesson5 = $_POST['five_lesson5']; 
$five_lesson6 = $_POST['five_lesson6']; 

$six_lesson1 = $_POST['six_lesson1']; 
$six_lesson2 = $_POST['six_lesson2']; 
$six_lesson3 = $_POST['six_lesson3']; 
$six_lesson4 = $_POST['six_lesson4']; 
$six_lesson5 = $_POST['six_lesson5']; 
$six_lesson6 = $_POST['six_lesson6']; 

$seven_lesson1 = $_POST['seven_lesson1']; 
$seven_lesson2 = $_POST['seven_lesson2']; 
$seven_lesson3 = $_POST['seven_lesson3']; 
$seven_lesson4 = $_POST['seven_lesson4']; 
$seven_lesson5 = $_POST['seven_lesson5']; 
$seven_lesson6 = $_POST['seven_lesson6']; 

$type = "Четная";


            
    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }



    $sql1 = "UPDATE lesson_monday SET one_lesson = '$one_lesson1', two_lesson = '$two_lesson1', three_lesson ='$three_lesson1', four_lesson ='$four_lesson1', five_lesson='$five_lesson1', six_lesson='$six_lesson1', seven_lesson='$seven_lesson1' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "UPDATE lesson_tuesday SET one_lesson = '$one_lesson2', two_lesson = '$two_lesson2', three_lesson ='$three_lesson2', four_lesson ='$four_lesson2', five_lesson='$five_lesson2', six_lesson='$six_lesson2', seven_lesson='$seven_lesson2' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result2 = mysqli_query($conn, $sql2);

    $sql3 = "UPDATE lesson_wednesday SET one_lesson = '$one_lesson3', two_lesson = '$two_lesson3', three_lesson ='$three_lesson3', four_lesson ='$four_lesson3', five_lesson='$five_lesson3', six_lesson='$six_lesson3', seven_lesson='$seven_lesson3' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result3 = mysqli_query($conn, $sql3);

    $sql4 = "UPDATE lesson_thursday SET one_lesson = '$one_lesson4', two_lesson = '$two_lesson4', three_lesson ='$three_lesson4', four_lesson ='$four_lesson4', five_lesson='$five_lesson4', six_lesson='$six_lesson4', seven_lesson='$seven_lesson4' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result4 = mysqli_query($conn, $sql4);

    $sql5 = "UPDATE lesson_friday SET one_lesson = '$one_lesson5', two_lesson = '$two_lesson5', three_lesson ='$three_lesson5', four_lesson ='$four_lesson5', five_lesson='$five_lesson5', six_lesson='$six_lesson5', seven_lesson='$seven_lesson5' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result5 = mysqli_query($conn, $sql5);

    $sql6 = "UPDATE lesson_saturday SET one_lesson = '$one_lesson6', two_lesson = '$two_lesson6', three_lesson ='$three_lesson6', four_lesson ='$four_lesson6', five_lesson='$five_lesson6', six_lesson='$six_lesson6', seven_lesson='$seven_lesson6' WHERE id_user = $id_user AND `type_week` = '$type'"; 
    $result6 = mysqli_query($conn, $sql6);

    if ($result1) {
        echo 1;
    } else {
        echo 0;
    }


?>

