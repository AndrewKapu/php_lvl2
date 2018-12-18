<?php

namespace app\interfaces;
use app\models\Record;

interface IRepository
{
    /**
     * Возвращает одну запись из БД
     * @param int $id идентификатор сущности
     * @return IRecord соответствующая запись из БД
     */
    public function getOne(int $id) : Record;

    /**
     * Возвращает некоторе кол-во записей из БД
     * @return array массив Объектов
     */
    public function getAll() : array;

    /**
     * Получает название ссответствующей сущности
     * @return string название сущности
     */
    public function getTableName() : string;

    public function getEntityClass() : string;

    public function update(Record $record);

    public function insert(Record $record);

    public function delete(Record $record);

    public function save(Record $record);

}