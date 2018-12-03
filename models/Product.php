<?php
namespace php_lvl2\models;

/**
 * Class Product описывает сущность товара
 * @package php_lvl2\models
 */
class Product extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $brand_id;

    public function getTableName(): string
    {
        return 'products';
    }
}
