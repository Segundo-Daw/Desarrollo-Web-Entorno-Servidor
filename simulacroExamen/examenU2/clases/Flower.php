<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Plant.php";

final class Flower extends Plant{
    private string $floweringMonth;

    public function __construct($species, $height, $floweringMonth){
        parent::__construct($species,$height);
        $this->floweringMonth = $floweringMonth;

    }

     public function getFloweringMonth()
    {
        return $this->floweringMonth;
    }

    public function __toString(){
        $ret = parent:: __toString();
        $ret .= "Su mes de floración es " . $this->floweringMonth;
        
        return $ret; 
    
    }




}

?>
