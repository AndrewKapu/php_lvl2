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
    public $category_id;
    public $producer_id;


    public function getTableName(): string
    {
        return 'products';
    }

    public function getClassName(): string
    {
        return 'Product';
    }


}
