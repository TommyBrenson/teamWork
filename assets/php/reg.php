<?php

$name = $_POST['firstNameReg'];
$lastname = $_POST['lastNameReg'];
$datebirthday = $_POST['birthdayDateReg'];
$male = $_POST['maleReg'];
$email = $_POST['emailReg'];
$numberphone = $_POST['phoneNumberReg'];
$university = $_POST['universityReg'];
$pass = $_POST['passwordReg'];
$img_ava = 'default.png';

$mysql = new mysqli('localhost','root','00g65O2317','myself_progress_bd');
$result = $mysql->query("INSERT INTO `users` (`name`, `last_name`, `date_birthday`, `mail`, `number_phone`, `university`, `password`, `male`, img) 
VALUES ('$name', '$lastname', '$datebirthday', '$email', '$numberphone', '$university', MD5('$pass'), '$male', '$img_ava')");


$mysql1 = new mysqli('localhost','root','00g65O2317','myself_progress_bd');
$result11=$mysql1->query("SELECT * FROM `users` WHERE `mail`='$email' AND `password`= md5('$pass')") ;
$user = $result11 -> fetch_assoc();
$id_user_get = $user['id_user'];

$result1 = $mysql->query("INSERT INTO `lesson_time` (`id_user`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ($id_user_get, '', '', '', '', '', '', '')");


$result2 = $mysql->query("INSERT INTO `lesson_monday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");

$result3 = $mysql->query("INSERT INTO `lesson_tuesday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");

$result4 = $mysql->query("INSERT INTO `lesson_wednesday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");

$result5 = $mysql->query("INSERT INTO `lesson_thursday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");

$result6 = $mysql->query("INSERT INTO `lesson_friday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");

$result7 = $mysql->query("INSERT INTO `lesson_saturday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', '', '', '', '', '', '', '')");



$result21 = $mysql->query("INSERT INTO `lesson_monday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result31 = $mysql->query("INSERT INTO `lesson_tuesday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result41 = $mysql->query("INSERT INTO `lesson_wednesday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result51 = $mysql->query("INSERT INTO `lesson_thursday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result61 = $mysql->query("INSERT INTO `lesson_friday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result71 = $mysql->query("INSERT INTO `lesson_saturday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', '', '', '', '', '', '', '')");

$result71 = $mysql->query("INSERT INTO `lesson_sunday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Нечетная', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной')");

$result71 = $mysql->query("INSERT INTO `lesson_sunday` (`id_user`, `type_week`, `one_lesson`, `two_lesson`, `three_lesson`, `four_lesson`, `five_lesson`, `six_lesson`, `seven_lesson`) 
VALUES ('$id_user_get', 'Четная', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной', 'Выходной')");


$result111 = $mysql->query("INSERT INTO `rating_users` (`id_user`, `count_success_task`) 
VALUES ('$id_user_get', 0)");


header('location: ../../src/pages/done.php');

?>

