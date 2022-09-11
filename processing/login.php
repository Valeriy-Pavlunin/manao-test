<?php
session_start();

if(isset($_COOKIE['is_logined'])){
    header('Location: profile.php');
}
require_once 'database/database.php';
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $login = trim(htmlspecialchars($_POST['login']));
    $password = trim(htmlspecialchars($_POST['password']));
    $user = new DataBase;
    $errMsg = $user->validation($login, $password);

    $errMsg = array_merge($errMsg, $user->checkLogForm($login, $password));

    $_SESSION['errMsg'] = $errMsg;
    $num_of_filled_elements = 0;
    foreach($errMsg as $value){
        if($value !== ''){
            $num_of_filled_elements++;
        }
    }


    if ($num_of_filled_elements === 0) {
        session_destroy();
        $name = $user->readRecord($login, '')[0]['name'];
        setcookie('is_logined', "$name", time() + 3600 * 24);
        header('Location: ../profile.php');
    }
}
