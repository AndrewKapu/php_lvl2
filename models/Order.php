<?php

namespace php_lvl2\models;

/**
 * Class Product описывает сущность заказа
 * @package php_lvl2\models
 */
class Order extends Model
{
    public $id;
    public $user_id;
    public $order;

    public function getTableName(): string
    {
        return 'orders';
    }

}