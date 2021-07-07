<?php


namespace app\models\repositories;

use app\models\entities\Basket;
use app\models\Repository;
use app\engine\App;


class BasketRepository extends Repository
{

    public function getTableName() {
        return 'basket';
    }

    public function getBasket($session)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, b.itemPrice FROM basket b, products p WHERE b.product_id = p.id AND session_id = :session";
        return App::call()->db->queryAll($sql, ['session'=> $session]);
    }

    public function getTotalBasket($session)
    {
        $sql = "SELECT sum(itemPrice) as total FROM  products, basket WHERE basket.product_id = products.id AND session_id = :session";
        return App::call()->db->queryOne($sql, ['session'=> $session])['total'];
    }


    public function getEntityClass()
    {
        return Basket::class;
    }
}

