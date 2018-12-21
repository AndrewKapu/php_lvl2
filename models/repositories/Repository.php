<?php

namespace app\models\repositories;

use app\base\App;
use app\interfaces\IRepository;
use app\models\Record;
use app\services\Db;


abstract class Repository implements IRepository
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

    public function getDb()
    {
        return App::call()->db;
    }

    public function getOne(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObjects($sql, $params = [], $this->getEntityClass());
    }

    public function delete(Record $record)
    {
        $tableName = static::getTableName();
        $sql = "DELETE * FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $record->id]);
    }

    public function insert(Record $record)
    {
        $params = [];
        $columns = [];

        foreach ($record as $key => $value) {
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

    public function update(Record $record)
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

    public function save(Record $record)
    {
        if(is_null($record->id)){
            $this->insert($record);
        }else{
            $this->update($record);
        }
    }

    public function find($sql, $params = [])
    {
        return $this->db->queryObjects($sql, $params, $this->getEntityClass());
    }

}