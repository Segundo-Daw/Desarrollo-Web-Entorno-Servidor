<?php

class Minotauro{

    //Se pueden crear atributos extra si queremos (es un poco raro)
    private float $percentage;

    //Los atributos están declarados dentro del constructor
    public function __construct(
        private string $name, 
        private int $age = -1
    ){}
        public function getName()
        {
                return $this->name;
        }

        
        public function getAge()
        {
                return $this->age;
        }

        
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

   
        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }

        public function __tostring(){
            return $this->name . " tiene " . $this->age . "años";
        }
}