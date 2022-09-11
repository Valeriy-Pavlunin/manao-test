<?php
session_start();

require_once 'database/database.php';
require_once 'database/crud.php';
if(isset($_COOKIE['is_logined'])){
    header('Location: profile.php');
}
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $login = trim(htmlspecialchars($_POST['login']));
    $password = trim(htmlspecialchars($_POST['password']));
    $confirm_password = trim(htmlspecialchars($_POST['confirm_password']));
    $email = trim(htmlspecialchars($_POST['email']));
    $name = trim(htmlspecialchars($_POST['name']));

    $newRecord = new DataBase;
    $errMsg = $newRecord->validation($login, $password, $confirm_password, $email, $name);
    $uniq_elements = [
        'login' => $login,
        'email' => $email,
    ];
    $errMsg = array_merge($errMsg, $newRecord->checkUniqElementsForReg($uniq_elements));
    $_SESSION['errMsg'] = $errMsg;


    $_SESSION['login'] = $login;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['is_reg'] = false;


    $num_of_filled_elements = 0;
    foreach ($errMsg as $value) {
        if ($value !== '') {
            $num_of_filled_elements++;
        }
    }
    if ($num_of_filled_elements === 0) {
        $_SESSION['is_reg'] = true;
        $data = [
            'login' => $login,
            'password' => md5($password . 'соль'),
            'email' => $email,
            'name' => $name,

        ];
        $newRecord->createRecord($data);
 
        header('Location: ../log.php');
    }
}
