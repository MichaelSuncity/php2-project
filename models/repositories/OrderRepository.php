<?php


namespace app\models\repositories;

use app\models\entities\Order;
use app\models\Repository;
use app\engine\App;


class OrderRepository extends Repository
{

    public function getTableName()
    {
        return 'orders';
    }

    public function getOrders()
    {
        if ($_SESSION['login'] == 'admin')
        $sql = "SELECT * FROM orders";
        return App::call()->db->queryAll($sql);
    }

    public function getEntityClass()
    {
        return Order::class;
    }
}