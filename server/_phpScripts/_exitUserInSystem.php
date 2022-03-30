<?php
//Exit Script User in system

    setcookie('UserParams', $user['id'] , time()-220*8,"/");
    header('Location: /');
?>