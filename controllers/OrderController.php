<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Order;

class OrderController extends Controller
{

    public function actionIndex() {
        $admin = App::call()->userRepository->isAdmin();
        $user_id = App::call()->userRepository->getWhere('login', App::call()->userRepository->getName())->id;
        if($admin){
            echo $this->render('order', [
                'orders' => App::call()->orderRepository->getOrders(),
                'admin' => $admin,
            ]);
        }elseif ($user_id){
            echo $this->render('order', [
                'orders' => App::call()->orderRepository->getArrayWhere('user_id', $user_id),
                'auth' => App::call()->userRepository->isAuth(),
            ]);
        }
    }

    public function actionCatalogOrder() {
        $admin = App::call()->userRepository->isAdmin();
        $session = App::call()->orderRepository->getOne(App::call()->request->getParams()['id'])->session_id;
        $user_id = App::call()->userRepository->getWhere('login', App::call()->userRepository->getName())->id; // тут понимает что за юзер айди
        $card_user_id = App::call()->orderRepository->getOne(App::call()->request->getParams()['id'])->user_id; //смотрим чья корзина
        echo $this->render('catalogOrder', [
            'catalog' => App::call()->basketRepository->getBasket($session),//использую готовый метод
            'admin' => $admin,
            'allow' => App::call()->userRepository->allowSeeBasket($user_id, $card_user_id),//проверка, что текущий пользователь смотрит свою корзину
            'total' => App::call()->basketRepository->getTotalBasket($session),//использую готовый метод
            'clientName' => App::call()->orderRepository->getWhere('session_id', $session)->clientName,
            'phone' => App::call()->orderRepository->getWhere('session_id', $session)->phone,
            'statusOrder' => App::call()->orderRepository->getWhere('session_id', $session)->statusOrder,
            'id' => App::call()->orderRepository->getWhere('session_id', $session)->id,
        ]);
    }

    public function actionMakeOrder()
    {
        App::call()->orderRepository->save(new Order(
            session_id(),
            App::call()->request->getParams()['clientName'],
            App::call()->request->getParams()['phone'],
            'Заказ оформлен',
            App::call()->basketRepository->getTotalBasket(session_id()),
            App::call()->userRepository->getUserId()
        ));

        session_regenerate_id();
        header("Location: /basket/");
    }

}