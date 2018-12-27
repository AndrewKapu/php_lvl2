<?php
/**
 * Created by PhpStorm.
 * User: Runmaster
 * Date: 21.12.2018
 * Time: 18:02
 */

namespace app\models\repositories;


use app\models\User;

class UserRepository extends Repository
{
    public function getTableName(): string
    {
        return 'users';
    }

    public function getEntityClass(): string
    {
        return User::class;
    }

    public function getUserByLogin($login)
    {
        $sql = "SELECT * FROM users WHERE login = :login";
        return $this->db->queryObject($sql, [':login' => $login], $this->getEntityClass());
    }

}