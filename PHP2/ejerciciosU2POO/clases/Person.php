<?php

abstract class Person{
    protected string $name;
    protected string $surname;
    protected float $salary;
    protected array $telephones=[];

    public function __construct($name, $surname, $salary, $telephones){
        $this->name=$name;
        $this->surname=$surname;
        $this->salary=$salary;
        $this->telephones=$telephones;
    }

    public abstract function calculateSalary();   
}


?>