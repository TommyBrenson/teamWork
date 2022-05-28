<?php

$id_user = $_COOKIE['user_id'];

            
    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }


    $sql = "SELECT count(*) FROM `task` WHERE `id_user`= $id_user AND `ready_task` = 0";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT count(*) FROM `task` WHERE `id_user`= $id_user AND `ready_task` = 1";
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT count(*) FROM `taskstudy` WHERE `id_user`= $id_user AND `ready_task` = 0";
    $result2 = mysqli_query($conn, $sql2);

    $sql12 = "SELECT count(*) FROM `taskstudy` WHERE `id_user`= $id_user AND `ready_task` = 1";
    $result12 = mysqli_query($conn, $sql12);


    $countNotReady= $result+$result2;
    $countReady= $result1+$result12;


?>

