<?php

namespace app\models;


class OrderProduct extends Record
{
    public $id;
    public $order_id;
    public $product_id;
    public $quantity;

    /**
     * OrderProduct constructor.
     * @param $id
     * @param $order_id
     * @param $product_id
     * @param $quantity
     */
    public function __construct($id = null, $order_id = null, $product_id = null, $quantity = null)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

}