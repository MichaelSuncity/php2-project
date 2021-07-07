<?php


namespace app\models;


abstract class Models 
{
    protected $changedProperties =[];

    public function __get($property)
    {
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if(property_exists($this, $property)&& $property !== 'id'){
            $this->$property = $value;
            $this->changedProperties[] = $property;
        }
    }

}