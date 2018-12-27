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
    public $address;
    public $status;
    public $date;

    /**
     * Order constructor.
     * @param $id
     * @param $user_id
     * @param $address
     * @param $status
     * @param $date
     */
    public function __construct($id = null, $user_id = null, $address = null, $status = null, $date = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->address = $address;
        $this->status = $status;
        $this->date = $date;
    }


}