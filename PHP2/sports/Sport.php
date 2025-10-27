<?php
abstract class Sport{
    public function __construct(
        protected String $type,
        protected bool $contact,
        private int $numPlayers
    ){}

    /* Lo de arriba equivale a esto:

    protected String $type;
    protected bool $contact;
    private int $numPlayers;
    public function __construct($type, $contact,$numPlayers
    )
    {
        $this->type = $type;
        $this->contact = $contact;
        $this->numPlayers = $numPlayers;
    }
    */

    public function __toString(){
        $ret = "Tipo: " .  $this->type . " - Contacto: ";
        if ($this->contact){
            $ret .= "Sí";
        }else{
            $ret .= "No ";
        }
            
        $ret .= " -Número de jugadores: " . $this->numPlayers;
        return $ret;
    }

    public function addPlayers(int $num):int{
        $this->numPlayers += $num;
        return $this -> numPlayers;
    }

    // No se le ponen llaves porque es abstracto, por eso termina en ;
    public abstract function play(): string;

}