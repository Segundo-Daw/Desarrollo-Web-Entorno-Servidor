<?php
class Component{
    
    function __construct(
        private string $name,
        private string $brand,
        private string $model,
        private int $id = -1,  //para que sea opcional
    ){}

    public function __tostring(){
        return "ID: " . $this->id . 
                ", Nombre: " . $this->name . 
                ", Marca: " . $this->brand . 
                ", Modelo: " . $this->model;
    }

    


     
    public function getName(){
            return $this->name;
    }

       
    public function getBrand(){
        return $this->brand;
    }

         
    public function getModel(){
        return $this->model;
    }

        
    public function setId($id){
        $this->id = $id;
        return $this;
    }

     
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setBrand($brand){
        $this->brand = $brand;
        return $this;
    }

    public function setModel($model){
        $this->model = $model;
        return $this;
    }

    
    public function getId(){
        return $this->id;
    }
}