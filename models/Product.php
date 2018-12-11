<?php
namespace app\models;

/**
 * Class Product описывает сущность товара
 * @package app\models
 */
class Product extends Record
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $producer_id;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $category_id
     * @param $producer_id
     */
    public function __construct($id = null, $name = null, $description = null, $price = null, $category_id = null, $producer_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->producer_id = $producer_id;
    }


    public static function getTableName(): string
    {
        return 'products';
    }


}
