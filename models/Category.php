<?php

namespace php_lvl2\models;

/**
 * Class Product описывает сущность категории товара
 * @package php_lvl2\models
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