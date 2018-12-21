<?php

namespace app\controllers;


use app\models\Basket;
use app\models\repositories\ProductRepository;
use app\services\Request;

class BasketController extends Controller
{
    private $tplFolderName = 'basket/';

    public function actionIndex()
    {
        echo $this->render('basket', ['basket' => (new Basket())->getAll()]);
    }

    public function actionAdd()
    {
        $request = new Request();
        if ($request->isPost()){
            $productId = $request->getRequestParam('id');
            $productQty = $request->getRequestParam('qty');
            (new Basket())->add($productId, $productQty);
        }
        echo json_encode(['success' => 'ok', 'message' => 'Товар был добавлен в корзину']);
    }

    public function actionDel()
    {
        $request = new Request();
        if ($request->isPost()) {
            $productId = $request->getRequestParam('id');
            (new Basket())->del($productId);
        }
        echo json_encode(['success' => 'ok', 'message' => 'Товар был удалён из корзины']);
    }

    public function actionCheckout()
    {
        echo $this->render('orderForm', []);
    }

    public function actionOrderForm()
    {
        var_dump('Функционал не готов'); exit;
        $request = new Request();
        if ($request->isPost()) {
            $name = $request->getRequestParam('name');
            $city = $request->getRequestParam('city');
        }
    }

    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }

}