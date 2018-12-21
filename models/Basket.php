<?php

namespace app\models;


use app\models\repositories\ProductRepository;

class Basket
{
    public function add($productId, $productQty)
    {
        if (isset($_SESSION['basket'][$productId])){
            $_SESSION['basket'][$productId] += (int) $productQty;
        }else{
            $_SESSION['basket'][$productId] = (int) $productQty;
        }
    }

    public function getAll()
    {
        $basket = [];
        if(!empty($_SESSION['basket'])) {
            $productsIds = array_keys($_SESSION['basket']);
            $products = (new ProductRepository())->getProductsByIds($productsIds);
            foreach ($products as $product) {
                array_push($basket, [
                    'product' => $product,
                    'count' => $_SESSION['basket'][$product->id]
                ]);
            }
        }
        return $basket;
    }

    public function del($productId)
    {
        unset($_SESSION['basket'][$productId]);
    }
}