<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/PHP2/sports/Sport.php";

class Tennis extends Sport{

    public function __construct(
        private string $court,
        private $rackets, 
        $type, 
        $contact, 
        $numPlayers
    ){
        parent:: __construct($type, $contact, $numPlayers);
    }

    public function __toString(){
        $ret = "- Pista: " . $this->court . "- Raqueta: " . $this->rackets. " - " . parent:: __toString();
        return$ret;
    }
    public function play(): string{
        return "Estoy jugando al tenis";
    }

    public function addRacket(String $racket){
        $this ->rackets[] = $racket;
        return $this->rackets;

    }
}