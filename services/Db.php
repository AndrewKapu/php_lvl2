<?php

namespace app\services;


use app\traits\TSingletone;

/**
 * Class Db для работы с БД
 * @package app\services
 */
class Db
{
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'rose',
        'charset' => 'utf8'
    ];

    /** @var \PDO */
    private $conn = null;

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_CLASS
            );
        }
        return $this->conn;
    }

    private function query($sql, $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    private function execute($sql, $params = [])
    {
       $pdoStatement = $this->query($sql, $params);
       return $pdoStatement->rowCount();
    }

    /**
     * @param $sql
     * @param $className
     * @param array $params
     * @return object
     */
    public function queryOne($sql, $className, $params = [])
    {
        return $this->queryAll($sql, $className, $params)[0];
    }

    public function queryAll($sql, $className, $params = [])
    {
       return $this->query($sql, $params)->fetchAll(\PDO::FETCH_CLASS, 'app\models\\' . $className);
    }

    public function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}