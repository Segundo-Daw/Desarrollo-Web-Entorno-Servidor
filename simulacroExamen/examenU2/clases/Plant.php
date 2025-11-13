<?php

abstract class Plant{
    private string $species;
    private float $height;


    public function __construct($species, $height){
        $this->species = $species;
        $this->height = $height;
    }
    

    public function getHeight()
    {
        return $this->height;
    }

    public function __toString(){
        $ret = $this->species . ": altura" . $this->height . " cm.";
        return $ret;
    }

    //Método crecer

    public function crecer(float $cm){
        $this->height += $cm;
    }


    /**
     * Set the value of height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }
}



?>