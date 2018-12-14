<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

/**
 * Class Model описывает функционал базового интерфейса IModel
 * @package app\models
 */
abstract class Record implements IRecord
{
    protected $db;
    /**
     * Названия столбцов сущности в бд
     * @var array
     */
    protected $cols = [];

    public function __construct()
    {
        $this->db = static::getDb();
    }

    public static function getDb()
    {
        return Db::getInstance();
    }

    public static function getOne(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return static::getDb()->queryObject($sql, [':id' => $id], get_called_class());
    }

    public static function getAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDb()->queryObjects($sql, $params = [], get_called_class());
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE * FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if($key == 'db'){
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
    }

    public function update()
    {
        $result = "";

        foreach ($this as $key => $value) {
            if($key == 'db'){
                continue;
            }

            $result .= ":$key = $value";
        }


        $tableName = static::getTableName();
        $sql = "UPDATE $tableName SET ... WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
        //TODO Доделать метод
    }

    public function save()
    {
        //TODO
    }

}