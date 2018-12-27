<?php

namespace app\controllers;


use app\base\App;
use app\models\repositories\UserRepository;
use app\models\User;
use app\services\Db;
use app\services\Request;
use app\services\Session;

class UserController extends Controller
{


    /**
     *Регестрирует нового пользователя в нашей системе
     */
    public function actionAdd()
    {
        /** @var Request $request */
        $request = App::call()->request;
        /** @var Session $session */
        $session = App::call()->session;
        if ($request->isPost()) {
            $name = $request->getRequestParam('name');
            $login = $request->getRequestParam('login');
            $password = md5($request->getRequestParam('password'));
            if ($this->findUser($login)) {
                echo 'Пользователь с таким логином уже существует, попробуйте другой логин';
            } else {
                $user = new User(null, $name, $login, $password);
                (new UserRepository())->insert($user);
                header('Location: /user/login');
            }
        }

    }

    public function actionAuthorise()
    {
        /** @var Request $request */
        $request = App::call()->request;
        /** @var Session $session */
        $session = App::call()->session;
        if ($request->isPost()) {
            $login = $request->getRequestParam('login');
            $password = md5($request->getRequestParam('password'));
            if ($user = $this->findUser($login)) {
                if ($user->password == $password) {
                    echo "Добро пожаловать, {$user->name}";
                    $user = ['userId' => $user->id, 'userName' => $user->name];
                    $session->set('user', $user);
                    /*$session->set(['user']['id'], $user->id);
                    $session->set(['user']['name'], $user->name);*/
                } else {
                    echo "Неверный пароль";
                }
            } else {
                echo "Пользователя с таким логином нет в системе! Возможно вы не регистрировались.";
            }
        }
    }

    public function actionLogout()
    {
        /** @var Session $session */
        $session = App::call()->session;
        $session->unset('user');
        header('Location: /');
    }


    public function actionLogin()
    {
        echo $this->render('authorisation', []);
    }

    public function actionRegister()
    {
        echo $this->render('registration', []);
    }

    public function getTplFolderName(): string
    {
        return 'user/';
    }

    private function findUser($login)
    {
        /** @var Db $Db */
        return (new UserRepository())->getUserByLogin($login);
    }

}