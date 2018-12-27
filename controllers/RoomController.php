<?php

namespace app\controllers;


use app\base\App;
use app\interfaces\IRenderer;
use app\services\Request;

/**
 * Личный кабинет пользователя
 * Class RoomController
 * @package app\controllers
 */
class RoomController extends Controller
{
    public function actionIndex()
    {
        /** @var Request $request */
        $request = App::call()->request;

        if ($request->isPost());
        //TODO Доделать личный кабинет пользователя с выводом его заказов
    }

    public function getTplFolderName(): string
    {
       return 'room/';
    }
}