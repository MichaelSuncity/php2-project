<?php

namespace app\controllers;

use app\engine\App;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $showFrom = App::call()->config['showFrom'];  //стартовое значение
        $showCount = App::call()->config['showCount'];  //сколько показывать при первом открытии страницы
        $productList = App::call()->productRepository->getLimit($showFrom, $showCount);
        foreach ($productList as $key => $item) {
            if ($item['price'] < 0) {
                throw new \Exception("Цена товара id = {$item['id']} не может быть меньше 0");
            }
        }
        $catalog = $this->renderTemplate('catalogList', ['catalog' => $productList]); //рендер самого каталога
        echo $this->render('catalog', ['catalog' => $catalog]); //рендер страницы каталога
    }

    public function actionCard() {
        $product = App::call()->productRepository->getOne(App::call()->request->getParams()['id']);
        echo $this->render('card', ['product' => $product]);
    }

}