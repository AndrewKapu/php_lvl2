<?php

namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

/**
 * Class Model описывает функционал базового интерфейса IModel
 * @package app\models
 */
abstract class Model implements IModel
{
    protected $db;
    /**
     * Названия столбцов сущности в бд
     * @var array
     */
    protected $cols = [];

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne(int $id): object
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, $this->getClassName(), [':id' => $id]);
    }

    public function getAll(): array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql, $this->getClassName());
    }

    public function getCols(): array
    {
        return $this->cols;
    }

}