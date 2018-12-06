<?php

namespace app\models;

/**
 * Class Product описывает сущность категории товара
 * @package app\models
 */
class Category extends Model
{
    public $id;
    public $name;

    public function getTableName(): string
    {
        return 'category';
    }

}