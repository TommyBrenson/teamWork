<?php

//load.php
$id_user = $_COOKIE['user_id'];

$server = "localhost";
$username = "root";
$password = "00g65O2317";
$database = "myself_progress_bd";

$connect = mysqli_connect($server, $username, $password, $database);

$data = array();

$mysql1 = new mysqli('localhost','root','00g65O2317','myself_progress_bd');
$result11=$mysql1->query("SELECT * FROM `calendary` WHERE `id_user` = $id_user ORDER BY `id_cal`") ;

while ($row = mysqli_fetch_assoc($result11)) {

 $data[] = array(
  'id'   => $row["id_cal"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
