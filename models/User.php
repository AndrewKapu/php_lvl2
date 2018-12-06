<?php

namespace app\models;

/**
 * Class Product описывает сущность пользователя
 * @package app\models
 */
class User extends Model
{
    public $id;
    public $login;
    public $password;

    public function getTableName(): string
    {
        return 'users';
    }

}