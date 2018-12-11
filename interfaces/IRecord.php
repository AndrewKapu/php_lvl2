<?php

namespace app\interfaces;
use app\models\Record;

interface IRecord
{
    /**
     * Возвращает одну запись из БД
     * @param int $id идентификатор сущности
     * @return IRecord соответствующая запись из БД
     */
    public static function getOne(int $id) : Record;

    /**
     * Возвращает некоторе кол-во записей из БД
     * @return array массив Объектов
     */
    public static function getAll() : array;

    /**
     * Получает название ссответствующей сущности
     * @return string название сущности
     */
    public static function getTableName() : string;


    public function update();

    public function insert();

    public function delete();

    public function save();

}