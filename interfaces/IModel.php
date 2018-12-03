<?php

namespace php_lvl2\interfaces;


interface IModel
{
    /**
     * Возвращает одну запись из БД
     * @param int $id идентификатор сущности
     * @return array соответствующая запись из БД
     */
    public function getOne(int $id) : array;

    /**
     * Возвращает некоторе кол-во записей из БД
     * @return array массив соответствующих записей из БД
     */
    public function getAll() : array;

    /**
     * Получает название ссответствующей сущности
     * @return string название сущности
     */
    public function getTableName() : string;
}