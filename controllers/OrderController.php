<?php

namespace app\controllers;


use app\base\App;
use app\models\Order;
use app\models\OrderProduct;
use app\models\repositories\OrderProductsRepository;
use app\models\repositories\OrderRepository;
use app\services\Db;
use app\services\Request;
use app\services\Session;

class OrderController extends Controller
{

    private $tplFolderName = 'order/';

    /**
     *Добавляет заказ пользователя в БД
     */
    public function actionCreate()
    {
        /** @var Request $request */
        $request = App::call()->request;
        /** @var Session $session */
        $session = App::call()->session;
        /** @var Db $Db */
        $Db = App::call()->db;
        if ($request->isPost()){
            if ($session->get('user')){
                $user = $session->get('user');
                $userId = (int)$user['userId'];
            } else {$userId = null;}
            $address = $request->getRequestParam('address');
            $status = 'processing';
            $date = $request->getRequestParam('date');

            $order = new Order(null, $userId, $address, $status, $date);
            (new OrderRepository())->insert($order);
            $this->orderProductsHandler($Db->getLastInsertId());
        }
        $session->unset('basket');
    }

    public function actionOrderForm()
    {
        echo $this->render('orderForm', []);
    }

    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }

    /**
     * Добавляет иформацию о товарах текущего заказа
     * @param string $orderId id текущего заказа
     */
    private function orderProductsHandler(string $orderId)
    {
        /** @var Session $session */
        $session = App::call()->session;
        foreach ($session->get('basket') as $productId => $quantity){
            $orderProduct = new OrderProduct(null, $orderId, $productId, $quantity);
            (new OrderProductsRepository())->insert($orderProduct);
        }
    }
}