<?php
setcookie('user_id', $user['id'] , time()-220*8,"/");

header('Location: /');
?>