<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Plant.php";

class Tree extends Plant{
    private bool $perennial;

    public function __construct($species, $height, $perennial){
        parent::__construct($species,$height);
        $this->perennial = $perennial;

    }

    public function __toString(){
        $ret = parent::__toString();
        $ret .= $this->perennial ? "Sí es perenne." : " No es perenne.";

        return $ret;
    }
    



    

}


?>