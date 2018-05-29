<?php

namespace application\models;


use application\core\base\Model;

class Error extends Model {

    public function getRandImage() {
        $this->table = 'southpark';
        $all = $this->findAll();
        $randId = rand(0, count($all) - 1);
        $result = "<img src=" . $all[$randId]['src'] . ">";
        return $result;
    }
}
