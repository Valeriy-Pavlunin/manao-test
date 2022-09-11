<?php

$name = $_COOKIE['is_logined'];
require_once 'components/exit.php';
if(!isset($_COOKIE['is_logined'])){
    header('Location: reg.php');
}
if (isset($_POST['exit'])) {
    setcookie('is_logined', null, -1);
    unset($_COOKIE['is_logined']);
    header('Location: /');
}

echo 'Hello, ' . $name;

