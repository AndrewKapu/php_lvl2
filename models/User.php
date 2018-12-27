<?php

namespace app\models;

/**
 * Class Product описывает сущность пользователя
 * @package app\models
 */
class User extends Record
{
    public $id;
    public $name;
    public $login;
    public $password;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     */
    public function __construct($id = null, $name = null, $login = null, $password = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }


}