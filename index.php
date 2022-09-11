<?php
if(isset($_COOKIE['is_logined'])){
    header('Location: profile.php');
}
require_once 'components/header.php';
require_once 'components/footer.php';
?>


