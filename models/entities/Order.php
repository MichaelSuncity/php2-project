<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class Order extends DataEntity
{
    public $id;
    public $session_id;
    public $clientName;
    public $phone;
    public $statusOrder;
    public $total;
    public $user_id;

    public function __construct($session_id = null, $clientName = null, $phone = null, $statusOrder = null, $total = null, $user_id = null)
    {
        $this->session_id = $session_id;
        $this->clientName = $clientName;
        $this->phone = $phone;
        $this->statusOrder = $statusOrder;
        $this->total = $total;
        $this->user_id = $user_id;
    }

}