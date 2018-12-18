<?php

namespace app\controllers;


use app\models\Product;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    /**
     * Название папки с шаблонами для данного контроллера
     * @var string
     */
    private $tplFolderName = 'product/';



    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();
         echo $this->render('products', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }


    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }


}