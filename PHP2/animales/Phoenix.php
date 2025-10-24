<?php
class Phoenix{
    //1. Atributos (estados)
    private string $name;
    private $age = -1;   //si ponemos menos uno es poner que no sabemos la edad

    //2. Constructor , getter y setter
    public function __construct(string $name, $age){
        $this->name = $name;
        $this ->age = $age;
    }

     public function getName(){
        return $this->name;
    }

   
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
        return $this;
    }
    
    

    //Función happyBirthday que sume 1 año al animal y devuelva su edad final.
    //Si tenía -1, que devuelva false. 

    public function happyBirthday($age){
        if ($this->age < 0){
            return false;
        }else{
        $this->age++;
        return $this->age;
        }
    }




}
