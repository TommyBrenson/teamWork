<?php
//Auth Script User

//Give params for auth client in sistem
$mail = $_POST['...'];
$password = $_POST['...'];
//....

include '_connectionDataBase.php';
$result=$mysql->query("SELECT * FROM `UserDbName` WHERE `mail`='$mail' AND `password`= MD5('$password')") ;


//Checked params to db 
$user = $result -> fetch_assoc();
  if (count($user) == 0) {
}
else{
    setcookie('user_id', $user['id'] , time()+220*8,"/");
    $mysql->close();
    header('Location: /');
}
?>