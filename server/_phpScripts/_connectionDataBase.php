<?php
//Connection to db Script

function OpenConnection(){
    $dbhost = "dbHost";
    $dbuser = "dbUser";
    $dbpass = "dbPass";
    $dbname = "dbName";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n". $connection -> error);
    return $connection;
}
 
function CloseConnection($connection){
    $connection -> close();
} 
?>