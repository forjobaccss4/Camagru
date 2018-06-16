<?php
/**
 * Created by PhpStorm.
 * User: vsarapin
 * Date: 5/26/18
 * Time: 7:49 PM
 */

namespace application\models;


use application\core\base\Model;
use application\controllers\ErrorController;

class Recovery extends Model {

    private $route = ['controller' => 'Error', 'action' => 'whooops'];

    public function sendEmailToRecoverPass($mail) {
        $this->table = 'user';
        if (count($foundMail = $this->findOne($mail, "email")) == 1) {
            $this->sendMail($foundMail[0]['email']);
        }
    }

    public function restoreChecker($url) {
        $hash = explode('/', $url);
        if (count($hash) == 3) {
            $this->table = 'user';
            if ($printThis = $this->findOne($hash[2], 'hash')) {
                $this->updateOne($this->table, 'confirm', '1', 'id', $printThis[0]['id']);
                return true;
            }else {
                ErrorController::errorPage();
            }
        }else {
            ErrorController::errorPage();
        }
    }


    private function sendMail($mail) {
        $this->hash = sha1(uniqid($mail, true));
        $encoding = "utf-8";
        $from_name = "Recover Password";
        $from_mail = "vsarapin@student.unit.ua";
        $mail_subject = "Remember password this time";
        $mail_message = "Перейдите по этой ссылке для смены пароля http://localhost:8080/recovery/restore/{$this->hash}";

        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        $header = "Content-type: text/html; charset=" . $encoding . " \r\n";
        $header .= "From: " . $from_name . " <" . $from_mail . "> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: " . date("r (T)") . " \r\n";
        $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

        mail($mail, $mail_subject, $mail_message, $header);
        $this->hash = "'" . $this->hash . "'";
        $this->insertHashIntoSql($this->hash, $mail);
    }

    private function insertHashIntoSql($hash, $mail) {
        $this->table = 'user';
        $foundMail = $this->findOne($mail, "email");
        $this->updateOne($this->table, 'hash', "' '", 'id', $foundMail[0]['id']);
        $this->updateOne($this->table, 'hash', $hash, 'id', $foundMail[0]['id']);

    }

    public function changePass($url, $password, $newPassword) {
        $this->table = 'user';
        $hash = explode('/', $url);
        if ($password != $newPassword) {
            ErrorController::whooopsAction($this->route, "Пароли не совпадают!");
            exit;
        }
        if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)) {
            ErrorController::whooopsAction($this->route, "Пароль должен состоять минимум" . "<br>" . " из 8 символов, одной цифры, одной буквы" . "<br>" . "в верхнем регистре и одной в нижнем");
            exit;
        }
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $newPassword = "'" . $newPassword . "'";
        if ($findHash = $this->findOne($hash[3], 'hash')) {
            $this->updateOne($this->table, 'password', $newPassword, 'id', $findHash[0]['id']);
            $this->updateOne($this->table, 'hash', "' '", 'id', $findHash[0]['id']);
            header('Location: /authorization');
        }else {
            ErrorController::errorPage();
        }

    }
}

