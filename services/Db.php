<?php

namespace app\services;


/**
 * Class Db для работы с БД
 * @package php_lvl2\services
 */
class Db
{
    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function queryOne($sql, $params = [])
    {
        return [];
    }

    public function queryAll($sql, $params = [])
    {
        return [];
    }
}