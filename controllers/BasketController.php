<?php

namespace app\controllers;

use app\engine\App;


class BasketController extends Controller
{

    public function actionIndex() {
        echo $this->render('basket', [
            'products' => App::call()->basketRepository->getBasket(session_id()),
            'total' => App::call()->basketRepository->getTotalBasket(session_id())
        ]);
    
    }

    public function actionCard() {
        $product = App::call()->productRepository->getOne(App::call()->request->getParams()['id']);
        echo $this->render('card', ['product' => $product]);
    }

}