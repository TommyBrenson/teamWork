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

$text = $_POST['main_text'];
$name = $_POST['name_zametki'];
$id_zametki = $_POST['special'];


$sql = "UPDATE zametki SET main_text = '$text' WHERE id_user = $id_user";
$result = mysqli_query($conn, $sql);


if ($result) {
    echo 1;
} else {
    echo 0;
}

?>
