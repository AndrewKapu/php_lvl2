<?php

namespace app\models;

/**
 * Class Product описывает сущность категории товара
 * @package app\models
 */
class Category extends Record
{
    public $id;
    public $name;

    public static function getTableName(): string
    {
        return 'category';
    }

}