<?php
class User{
    public function __construct(
        private string $name,
        private string $password,
        private string $email,
        private int $age,
        private array $studies = [],  //DAW, DAM, ASIR (checkboxes)
    ){

    }

    public function __toString(){

        $ret = "<p>Nombre usuario: " . $this->name . "</p>";
        $ret .= "<p>Contraseña: " . $this->password . "</p>";
        $ret .= "<p>Email: " . $this->email . "</p>";
        $ret .= "<p>Cursos: " . implode(", " , $this->studies) . "</p>";

        return $ret;
    }
   
}