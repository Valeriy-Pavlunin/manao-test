<?php

require_once 'crud.php';
class DataBase extends Crud
{
    public function checkUniqElementsForReg($uniq_elements)
    {
        $login = $uniq_elements['login'];
        $email = $uniq_elements['email'];
        $checked_record_by_login = DataBase::readRecord($login, '');
        $checked_record_by_email = DataBase::readRecord('', $email);

        $errMsg = [];
        if ($checked_record_by_login === '' && $checked_record_by_email === '') {
            return $errMsg;
        } elseif (!empty($checked_record_by_login[0]) && $checked_record_by_login[0]['login'] === $uniq_elements['login']) {
            $errMsg['loginErr'] = 'Пользователь с таким логином уже существует';
        }
        if (!empty($checked_record_by_email[0]) && $checked_record_by_email[0]['email'] === $uniq_elements['email']) {
            $errMsg['emailErr'] = 'Пользователь с такой почтой уже существует';
        }

        return $errMsg;
    }

    public function checkLogForm($login, $password)
    {
        $record = DataBase::readRecord($login, '');
        $errMsg = [];
        if ($record === '') {
            $errMsg['loginErr'] = 'Пользователя с таким логином не существует';
        } elseif (md5($password . 'соль') !== $record[0]['password']) {
            $errMsg['passErr'] = 'Неправильный пароль';
        }
        return $errMsg;
    }

    public function validation($login, $pass, $confirm_pass = null, $email = null, $name = null)
    {
        $loginErr = '';
        $passErr = '';
        $confirmPassErr = '';
        $emailErr = '';
        $nameErr = '';
        $errMsg = [];
        if (strlen($login) < 6) {
            $loginErr = 'Логин слишком короткий';
        }
        if (ctype_space($login)) {
            $loginErr = 'Логин не должен содержать пробельных символов';
        }
        if (!preg_match('~\d~', $pass) || !preg_match('~[a-zа-яё]~', $pass) || !ctype_alnum($pass)) {
            $passErr = 'Пароль должен содержать буквы и цифры!';
        }
        if (strlen($pass) < 6) {
            $passErr = 'Пароль слишком короткий!';
        }
        $num_of_args = func_num_args();
        if ($num_of_args === 5) {

            if ($pass !== $confirm_pass) {
                $confirmPassErr = 'Пароли не совпадают!';
            }
           $at_position = stripos($email, '@');
           $domen = substr($email, $at_position);
            if (!strpos($domen, '.')) {
                $emailErr = 'Нет точки в доменной части';
            }
            if (!ctype_alpha($name) || ctype_space($login)) {
                $nameErr = 'Имя может содержать только буквы!';
            }
            if (strlen($name) < 3 || strlen($name) > 40) {
                $nameErr = 'Минимальная длина имени - 3, максимальная - 40';
            }
        }
        $errMsg = [
            'loginErr' => $loginErr,
            'passErr'  => $passErr,
            'confirmPassErr' => $confirmPassErr,
            'emailErr' => $emailErr,
            'nameErr' => $nameErr,
        ];
        return $errMsg;
    }
}
