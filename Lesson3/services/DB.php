<?php

namespace app\services;

use app\traits\SingletonTrait;

class DB
{
    use SingletonTrait;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'db' => 'php_1',
        'charset' => 'UTF8',
        'login' => 'root',
        'password' => 'www12345',
    ];

    private $connection;

    private function getConnection()
    {
        if (empty($this->connection)) {
            $this->connection = new \PDO(
                $this->getSdn(),
                $this->config['login'],
                $this->config['password']
            );

            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }

        return $this->connection;
    }

    private function getSdn()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['db'],
            $this->config['charset']
        );
    }

    private function query($sql, $params = [])
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }
    public function find($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function findAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
    }
    public function getTableColumns($tableName)
    {
        $dbName = $this->config["db"];
        $sql = "SELECT Column_Name FROM INFORMATION_SCHEMA.COLUMNS WHERE table_Schema='$dbName' and table_name = '$tableName' and Extra not like '%auto_increment%'";
        $fildsInDb = [];
        foreach ($this->query($sql)->fetchAll() as $row)
            $fildsInDb[] = $row['COLUMN_NAME'];

        return $fildsInDb;
    }

}