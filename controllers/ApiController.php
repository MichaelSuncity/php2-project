<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entities\Basket;
use app\models\entities\Order;
use app\models\entities\User;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;


class ApiController extends Controller
{
    public function actionAddBasket(){
        $product_id = App::call()->request->getParams()['id'];
         App::call()->basketRepository->save(new Basket(
            session_id(),
            $product_id,
            App::call()->productRepository->getOne($product_id)->price)
        );

        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
            ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDeleteBasket(){
        App::call()->basketRepository->deleteByIdWhere(App::call()->request->getParams()['id'], 'session_id', session_id());

        $response = [
            'result' => 1,
            'count' =>  App::call()->basketRepository->getCountWhere('session_id', session_id()),
            'total' =>  App::call()->basketRepository->getTotalBasket(session_id())
            ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionClearAllBasket(){
       App::call()->basketRepository->clearAllBySession(session_id());

        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id()),
            'total' => App::call()->basketRepository->getTotalBasket(session_id()),
            ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionShowMore() {
        $showCount = App::call()->request->getParams()['showCount'];
        $showFrom = App::call()->request->getParams()['showFrom'];
        $addCatalog = App::call()->productRepository->getLimit($showFrom, $showCount);
        $response =  $this->renderTemplate('catalogList', ['catalog' => $addCatalog]);
        header("Content-type: text/html; charset=utf-8;");
        echo $response;
        exit;
    }

    public function actionChangeOrderStatus(){
        if(App::call()->userRepository->isAdmin()){
            $id = App::call()->request->getParams()['id'];
            $statusOrder = App::call()->request->getParams()['statusOrder'];
            $order = App::call()->orderRepository->getOne($id);
            $order->statusOrder = $statusOrder;
            App::call()->orderRepository->save($order);
            $response = [
                'result' => 1,
                'id' => $id,
                'status' => $statusOrder,
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    public function actionRegistration(){
        $newUserLogin = App::call()->request->getParams()['newUserLogin'];
        $newUserPass = App::call()->request->getParams()['newUserPass'];
        if($newUserLogin == '' or $newUserPass == ''){
            $status = 'Введите все поля';
        } elseif (App::call()->userRepository->existLogin($newUserLogin)){
            $status = "Пользователь с логином {$newUserLogin} уже существует";
        } else {
            $newUserPass = password_hash($newUserPass, PASSWORD_DEFAULT);
            App::call()->userRepository->save(new User(
                $newUserLogin,
                $newUserPass,
                ''
            ));
            $status = "Пользователь с логином  {$newUserLogin} успешно зарегистрирован!";
        }

        $response = [
            'result' => 1,
            'status' => $status,
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}