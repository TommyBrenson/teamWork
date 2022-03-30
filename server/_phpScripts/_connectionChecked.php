<?php
//Checked Script to db

    include 'db_connection.php';

    $connection = OpenConnection();
    echo "Connected Successfully";

    CloseConnnection($connection);
?>