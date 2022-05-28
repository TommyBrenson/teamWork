<?php

$id_user = $_COOKIE['user_id'];


$tel = $_POST['tel']; 
$name = $_POST['name']; 
$last_name = $_POST['lastname']; 
$data = $_POST['data']; 


            
    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }



    $sql1 = "UPDATE users SET name = '$name', last_name = '$last_name', date_birthday ='$data', number_phone ='$tel' WHERE id_user=$id_user"; 
    $result1 = mysqli_query($conn, $sql1);


    if ($result1) {
        echo 1;
    } else {
        echo 0;
    }


?>

