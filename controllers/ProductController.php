<?php

namespace app\controllers;


use app\base\App;
use app\models\Product;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{


    public function actionIndex()
    {
        $products = (new ProductRepository())->getAll();
         echo $this->render('products', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }


    public function getTplFolderName(): string
    {
        return 'product/';
    }


}