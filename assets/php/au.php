<?php

$mail = $_POST['mailAuth'];
$password = $_POST['passAuth'];

  $mysql = new mysqli('localhost','root','00g65O2317','myself_progress_bd');
  $result=$mysql->query("SELECT * FROM `users` WHERE `mail`='$mail' AND `password`= md5('$password')") ;
  $user = $result -> fetch_assoc();
  if (count($user) == 0) {
    $message = 'Неверный логин или пароль!';
  }
  else{
    setcookie('user_id', $user['id_user'] , time()+220*8,"/");
    $mysql->close();
    header('Location: /');
  }
?>