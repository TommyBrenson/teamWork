<?php

$id_user = $_COOKIE['user_id'];

$server = "localhost";
$username = "root";
$password = "00g65O2317";
$database = "myself_progress_bd";

$connect = mysqli_connect($server, $username, $password, $database);

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$id_cal = $_POST['id'];

if(isset($_POST["id"]))
{

 $sql1 = "UPDATE calendary SET title='$title', start_event='$start', end_event='$end' WHERE id_cal=$id_cal AND id_user=$id_user"; 
 $result1 = mysqli_query($connect, $sql1);

}

?>