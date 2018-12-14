<?php

namespace app\controllers;


use app\models\Category;

class CategoryController extends Controller
{
    private $tplFolderName = 'category/';

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