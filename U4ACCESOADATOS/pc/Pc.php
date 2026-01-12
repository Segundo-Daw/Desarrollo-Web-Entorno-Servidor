<?php
class Pc{
    
    function __construct(
        private string $id,
        private string $owner,
        private string $brand,
        private float $price,
        private array $components = []
        
    ){}

    public function __toString(){
        //return "Id del PC: $this->id $this->owner $this->brand $this->price  - Components: " . implode(",", $this->components);


        return "<ul>
                        <li>Id del PC: $this->id</li>
                        <li>Propietario: $this->owner</li>
                        <li>Marca: $this->brand</li>
                        <li>Precio: $this->price</li>
                        <li>Components: ". implode("<br> ", $this->components) . "</li>
                </ul>";
       
    }


    



    public function addComponent($c){
        $this->components[] = $c;
    }


        public function getId()
        {
                return $this->id;
        }

        
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getOwner()
        {
                return $this->owner;
        }

        public function setOwner($owner)
        {
                $this->owner = $owner;

                return $this;
        }

        public function getBrand()
        {
                return $this->brand;
        }

      
        public function setBrand($brand)
        {
                $this->brand = $brand;

                return $this;
        }

       
        public function getPrice()
        {
                return $this->price;
        }

      
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }


        public function getComponents()
        {
                return $this->components;
        }

        
        public function setComponents($components)
        {
                $this->components = $components;

                return $this;
        }
}