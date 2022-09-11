<?php
require_once 'processing/login.php';
require_once 'components/header.php';

?>
<div class="form-container">
    <form action="log.php" method="POST">
        <p>Введите логин</p>
        <input type="text" name="login" placeholder="Логин" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['loginErr'];
                                    ?></div>
        <p>Введите пароль</p>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['passErr'];
                                    ?></div>
        <button type="submit" value="Зарегестрироваться" class="registerbtn">Войти</button>
    </form>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
    <?php
    if ($_SESSION['is_reg'] === true) :
    ?>
        <p class="message-with-question">Вы успешно зарегистрированы!</p>

    <?php else : ?>

        <p class="message-with-question">Нет аккаунта? <a href="reg.php">Зарегестрируйтесь!</a></p>
    <?php endif; ?>
</div>



<?php
require_once 'components/footer.php';
session_destroy();
?>