<?php

namespace application\models;

use application\core\base\Model;

class Camagru extends Model {

    private $login;

    public function __construct($sessionLogin) {
        $this->login = $sessionLogin;
    }

    public function changePersonalData() {

    }

}