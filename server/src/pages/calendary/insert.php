<?php

//insert.php
$id_user = $_COOKIE['user_id'];

$server = "localhost";
$username = "root";
$password = "00g65O2317";
$database = "myself_progress_bd";

$connect = mysqli_connect($server, $username, $password, $database);

$title  = $_POST['title'];
$start  = $_POST['start'];
$end  = $_POST['end'];

if(isset($_POST["title"]))
{
    $mysql1 = new mysqli('localhost','root','00g65O2317','myself_progress_bd');
    $result11=$mysql1->query("INSERT INTO `calendary` (`id_user`, `title`, `start_event`, `end_event`) 
    VALUES ('$id_user', '$title', '$start', '$end')") ;

}

?>