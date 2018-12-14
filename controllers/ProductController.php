<?php

namespace app\controllers;


use app\models\Product;

class ProductController extends Controller
{
    /**
     * Название папки с шаблонами для данного контроллера
     * @var string
     */
    private $tplFolderName = 'product/';



    public function actionIndex()
    {
        $products = Product::getAll();
         echo $this->render('twigProducts', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('twigCard', ['product' => $product]);
    }


    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }


}