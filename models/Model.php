<?php

namespace php_lvl2\models;

use php_lvl2\interfaces\IModel;
use php_lvl2\services\Db;

/**
 * Class Model описывает функционал базового интерфейса IModel
 * @package php_lvl2\models
 */
abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOne(int $id): array
    {
        $sql = "SELECT * FROM {this->tableName} WHERE id = {this->id}";
        $this->db->queryOne($sql);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM {this->tableName}";
        $this->db->queryAll($sql);
    }


}