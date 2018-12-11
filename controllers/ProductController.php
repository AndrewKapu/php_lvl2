<?php

namespace app\controllers;


use app\models\Controller;
use app\models\Product;

class ProductController extends Controller
{
    /**
     * Название папки с шаблонами для данного контроллера
     * @var string
     */
    private $tplFolderName = 'product/';
    protected $action;
    protected $defaultAction = "index";
    protected $useLayout = true;
    protected $layout = 'main';


    public function actionIndex()
    {
        $products = Product::getAll();
         echo $this->render('products', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }


    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }


}