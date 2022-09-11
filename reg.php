<?php
require_once 'processing/registration.php';
require_once 'components/header.php';
if ($_SESSION['is_reg'] === true){
    header('Location: log.php');
}

?>

<div class="form-container">
    <form method="POST" action="reg.php">
        <p>Введите логин</p>
        <input type="text" name="login" placeholder="Логин" value="<?= $_SESSION['login'] ?>" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['loginErr'];
                                    ?></div>
        <p>Введите пароль</p>
        <input type="password" name="password" placeholder="Пароль" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['passErr'];
                                    ?></div>
        <p>Повторите пароль</p>
        <input type="password" name="confirm_password" placeholder="Повторите пароль" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['confirmPassErr'];
                                    ?></div>
        <p>Введите адрес электроноой почты</p>
        <input type="email" name="email" placeholder="Email" value="<?= $_SESSION['email'] ?>" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['emailErr'];
                                    ?></div>
        <p>Введите имя</p>
        <input type="text" name="name" placeholder="Ваше имя" value="<?= $_SESSION['name'] ?>" required>
        <div class="error-message"><?php
                                    echo $_SESSION['errMsg']['nameErr'];
                                    ?></div>
        <button type="submit" value="Зарегестрироваться" class="registerbtn">Зарегестрироваться</button>
    </form>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
    <p class="message-with-question">Есть аккаунт? <a href="log.php">Войдите</a></p>
</div>

<?php
require_once 'components/footer.php';

?>