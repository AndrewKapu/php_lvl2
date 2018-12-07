<?php

namespace app\interfaces;


interface IModel
{
    /**
     * Возвращает одну запись из БД
     * @param int $id идентификатор сущности
     * @return object соответствующая запись из БД
     */
    public function getOne(int $id) : object;

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

    /**
     * Возвращает правильный набор имён столбцов
     * @return array
     */
    public function getCols(): array;

    /**
     * Возвращает название класса
     * @return array
     */
    public function getClassName();


}