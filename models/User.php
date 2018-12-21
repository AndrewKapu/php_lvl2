<?php

namespace app\models;

/**
 * Class Product описывает сущность пользователя
 * @package app\models
 */
class User extends Record
{
    public $id;
    public $login;
    public $password;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     */
    public function __construct($id = null, $login = null, $password = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }


    public static function getTableName(): string
    {
        return 'users';
    }

}