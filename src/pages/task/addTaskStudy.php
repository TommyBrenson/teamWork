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


    $name_task = $_POST['task'];
    $comment_task = $_POST['commtask'];

    $sql = "INSERT INTO taskstudy(id_user, name_task, comment_task, ready_task) VALUES ('$id_user', '$name_task', '$comment_task', 0)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }


?>