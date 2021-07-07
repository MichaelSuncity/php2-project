<?php


namespace app\models\entities;

use app\models\entities\DataEntity;

class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;
    public $itemPrice;

    public function __construct($session_id = null, $product_id = null, $itemPrice = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->itemPrice = $itemPrice;
    }

}