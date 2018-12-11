<?php

namespace app\models;

/**
 * Class Product описывает сущность заказа
 * @package app\models
 */
class Order extends Record
{
    public $id;
    public $user_id;
    public $order;

    public static function getTableName(): string
    {
        return 'orders';
    }

}