<?php

namespace application\core\base;

use application\core\Db;

abstract class Model {

    protected $pdo;
    public $table;
    protected $pk = 'id';

    public function __construct() {
        $this->pdo = Db::instance();
    }

    public function query($sql) {
        return $this->pdo->execute($sql);
    }

    public function findAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = '') {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = []) {
        return $this->pdo->query($sql, $params);
    }

    public function insertUserData($params) {
        $this->table = "user";
        $sql = "INSERT INTO {$this->table} (login, password, email, name, hash) VALUES (?,?,?,?,?)";
        $this->pdo->execute($sql, $params);
    }
    public function insertOne($fileName) {
        $this->table = "images";
        $sql = "INSERT INTO {$this->table} (src) VALUES (?)";
        $this->pdo->execute($sql, $fileName);
    }
    public function addOrRemoveOneLike($table, $change, $data, $row, $hash, $row1, $hash1) {
        $sql = "UPDATE {$table} SET $change = $data WHERE $row = $hash AND $row1 = $hash1";
        return $this->pdo->execute($sql);
    }
    public function updateOne($table, $change, $data, $row, $hash) {
        $sql = "UPDATE {$table} SET $change = $data WHERE $row = $hash";
        return $this->pdo->execute($sql);
    }
    public function insertLikes($values) {
        $sql = "INSERT INTO {$this->table} (user, photo, likes) VALUES (?, ?, ?)";
        $this->pdo->execute($sql, $values);
    }
    public function insertComments($values) {
        $sql = "INSERT INTO comments (user, photo, comment) VALUES (?, ?, ?)";
        $this->pdo->execute($sql, $values);
    }
}