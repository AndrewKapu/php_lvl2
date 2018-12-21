<?php

namespace app\controllers;


use app\models\repositories\UserRepository;
use app\models\User;
use app\services\Request;

class UserController extends Controller
{
    private $tplFolderName = 'user/';

    public function actionAdd()
    {
        $request = new Request();
        if ($request->isPost()) {
            $login = $request->getRequestParam('login');
            $password = $request->getRequestParam('password');
            $user = new User('', $login, $password);
            //(new UserRepository())->insert($user);
        }
    }

    public function actionRegister()
    {
        echo $this->render('registerForm', []);
    }

    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }

}