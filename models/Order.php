<?php

namespace app\models;

/**
 * Class Product описывает сущность заказа
 * @package app\models
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