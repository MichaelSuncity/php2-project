<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class Product extends DataEntity
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

  
    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}