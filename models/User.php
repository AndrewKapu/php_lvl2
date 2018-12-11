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

    public static function getTableName(): string
    {
        return 'users';
    }

}