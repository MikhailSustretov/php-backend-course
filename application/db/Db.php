<?php

namespace application\db;

use PDO;
use PDOStatement;

class Db
{

    private static $instance;

    private $pdo;

    private function __construct()
    {

        $db_params = require_once 'application/config/db_params.php';

        $this->pdo = new PDO("{$db_params["driver"]}:host={$db_params["host"]};
        dbname={$db_params["db_name"]}; charset={$db_params["charset"]}", $db_params["db_user"],
            $db_params["db_pass"], $db_params["options"]
        );
    }

    public function query(string $sql, array $params = []): bool|PDOStatement
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return false;
        }

        return $sth;
    }

    public function fetchOneValue(string $sql, array $params = [])
    {
        $sth = $this->query($sql, $params);
        return $sth->fetchColumn();
    }

    public function fetchAllDataSets(string $sql, array $params = [])
    {
        $sth = $this->query($sql, $params);

        return $sth->fetchAll();
    }

    public function fetchOneDataSet(string $sql, array $params = [])
    {
        $sth = $this->query($sql, $params);

        return $sth->fetch();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }
}