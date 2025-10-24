<?php

class Cat
{
    //atrivutos
    private string $name;
    private string $color = 'color not know';
    private $age; //mo es obligatorio poner el tipo el valor de inisialisacion ;

    //.constructor
    public function __construct($name, $color, $age = -1)
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
    //Getersr y seters

    public function getName(){
        return $this->name;
    }
     public function setName($name){
         $this->name = $name;
    }
    /*
     public function getColor(){
        return $this->color;
    }
      public function setColor($color){
          $this->color = $color;
    }
    */
    //metodos
    public function miaw(){
        return "miau";
    }
}