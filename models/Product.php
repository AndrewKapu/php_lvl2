<?php
namespace app\models;

/**
 * Class Product описывает сущность товара
 * @package app\models
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
