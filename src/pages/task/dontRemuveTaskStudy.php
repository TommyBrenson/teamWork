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



$id = $_POST['id'];

$sql = "UPDATE taskstudy SET ready_task = 0 WHERE id_task = $id";
$result = mysqli_query($conn, $sql);

/*


$sql2 = "SELECT * FROM `rating_users` WHERE id_user= $id_user";
$result2 = mysqli_query($conn, $sql);
$success_task = $result2 -> fetch_assoc();
$useCount = $success_task['count_success_task'] - 1;

$sql1 = "UPDATE `rating_users` SET count_success_task = $useCount WHERE id_user = $id_user";
$result1 = mysqli_query($conn, $sql);

*/

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>
