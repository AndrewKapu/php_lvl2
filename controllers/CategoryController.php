<?php

namespace app\controllers;


use app\models\Category;
use app\models\Controller;

class CategoryController extends Controller
{
    private $tplFolderName = 'category/';
    protected $action;
    protected $defaultAction = "index";
    protected $useLayout = true;
    protected $layout = 'main';

    public function getTplFolderName(): string
    {
        return $this->tplFolderName;
    }

    public function actionIndex()
    {
        $categories = Category::getAll();
        echo $this->render('categories', ['categories' => $categories]);
    }

}