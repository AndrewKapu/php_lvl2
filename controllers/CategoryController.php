<?php

namespace app\controllers;


use app\models\Category;

class CategoryController extends Controller
{

    public function getTplFolderName(): string
    {
        return 'category/';
    }

    public function actionIndex()
    {
        $categories = Category::getAll();
        echo $this->render('categories', ['categories' => $categories]);
    }

}