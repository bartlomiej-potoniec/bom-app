<?php

namespace App\Core;

use \PDO;
use \PDOStatement;


class Database
{
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASS;
    private string $dbName = DB_NAME;

    private ?PDO $dbh;
    private ?PDOStatement $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    }

    public function query(string $sql): void
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind(string $param, string $value, $type = null): void
    {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    public function resultSet(): array
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(): object
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}