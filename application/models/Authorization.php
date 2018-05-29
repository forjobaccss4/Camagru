<?php

namespace application\models;

use application\core\base\Model;
use application\controllers\ErrorController;

class Authorization extends Model
{
    protected $login;
    protected $password;
    protected $name;
    protected $email;
    protected $repassword;
    protected $loginMessage = '';
    protected $errorArray = [];
    protected $hash;

    public function registration($login, $password, $repassword, $email, $name) {
        if (empty($login) ||
            empty($password) ||
            empty($email) ||
            empty($name) ||
            empty($repassword)) {
            echo "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
        }
        $this->table = 'user';
        $this->login = trim(htmlspecialchars(stripslashes($login)));
        if (($checkLogin = $this->checkLoginRegular($this->login)) === false) {
            array_push($this->errorArray, $this->loginMessage);
        }
        $this->password = crypt(trim(htmlspecialchars(stripslashes($password))), "ZqbHp9lb");
        $this->repassword = crypt(trim(htmlspecialchars(stripslashes($repassword))), "ZqbHp9lb");
        if (!hash_equals($this->password, $this->repassword))
            array_push($this->errorArray, "Пароли не совпадают!");
        $this->name = trim(htmlspecialchars(stripslashes($name)));
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->email = $email;
        else
            array_push($this->errorArray, "Неверный формат email");
        $this->checkLoginMailDb();
        if (!empty($this->errorArray)) {
            return $this->errorArray;
        }
        $this->hash = sha1(uniqid($email, true));
        $params = [$login, $this->password, $email, $name, $this->hash];
        $this->insertUserData($params);
        $this->sendMail();
        return '';
    }

    private function checkLoginMailDb() {
        $this->table = 'user';
        $checkLogin = $this->findOne($this->login, "login");
        $checkMail = $this->findOne($this->email, "email");
        if (!empty($checkLogin)) {
            if (!strcmp($checkLogin[0]['login'], $this->login)) {
                array_push($this->errorArray,"Такой логин уже занят");
            }
        }
        if (!empty($checkMail)) {
            if (!strcmp($checkMail[0]['email'], $this->email)) {
                array_push($this->errorArray, "Такой email уже занят");
            }
        }
    }

    private function checkLoginRegular($login) {
        $len = strlen($login);


        if (empty($login)) {
            $this->loginMessage = 'Логин не может быть пустым';
            return false;
        }
        if ($len < 4 || $len > 20) {
            $this->loginMessage = 'В логине должно быть от 4 до 20 символов';
            return false;
        }
        if (!preg_match("/^[a-zA-Z1-9]+$/", $login)) {
            $this->loginMessage = 'В логине должны быть только латинские буквы';
            return false;
        }

        if (!empty($login)) {
            if (is_numeric($login{0})) {
                $this->loginMessage = 'Логин должен начинаться с буквы';
                return false;
            }
        }
        return true;
    }

    private function sendMail() {
        $encoding = "utf-8";
        $from_name = "Registration for defence";
        $from_mail = "vsarapin@student.unit.ua";
        $mail_subject = "Confirm Camagru Registration";
        $mail_message = "Перейдите по этой ссылке для подтверждения регистрации http://10.111.3.5:8080/authorization/activation/{$this->hash}";

        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: " . $from_name . " <" . $from_mail . "> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

        mail($this->email, $mail_subject, $mail_message, $header);

    }

    public function checkConfirmUrl($url) {
        $hash = explode('/', $url);
        if (count($hash) == 3) {
            $this->table = 'user';
            if ($printThis = $this->findOne($hash[2], 'hash')) {
                $this->updateOne($this->table, 'confirm', '1', 'id', $printThis[0]['id']);
                $this->updateOne($this->table, 'hash', '\' \'', 'id', $printThis[0]['id']);
                header('Location: /authorization');
            }
            else
                ErrorController::errorPage();
        }
        else
            ErrorController::errorPage();
    }
}
