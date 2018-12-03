<?php

namespace php_lvl2\models;

/**
 * Class Product описывает сущность пользователя
 * @package php_lvl2\models
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