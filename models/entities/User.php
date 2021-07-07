<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class User extends DataEntity
{
    public $id;
    public $login;
    public $pass;
    public $hash;


    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }
}