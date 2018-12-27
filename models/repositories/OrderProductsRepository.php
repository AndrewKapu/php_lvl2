<?php

namespace app\models\repositories;


use app\models\Order;
use app\models\OrderProduct;

class OrderProductsRepository extends Repository
{

    public function getTableName(): string
    {
        return 'order_products';
    }

    public function getEntityClass(): string
    {
       return OrderProduct::class;
    }
}