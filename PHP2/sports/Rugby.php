<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/PHP2/sports/Sport.php";

final class Rugby extends Sport{
    private String $teamName;

    public function __construct($teamName, $type, $contact, $numPlayers){
        $this->teamName = $teamName;
        parent:: __construct($type, $contact, $numPlayers);

    }

    public function __toString(){
        $ret = "Equipo " . $this->teamName . " - " . parent:: __toString();
        return$ret;
    }


    public function play(): string{
        return "Estoy jugando al rugby";
    }


}