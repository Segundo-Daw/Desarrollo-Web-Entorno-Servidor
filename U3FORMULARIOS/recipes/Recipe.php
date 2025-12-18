<?php
class Recipe{
    public function __construct(
        private string $email,
        private string $name,
        private string $comida,
        private string $gluten,
        private int $time,
        private string $colorFavorito,
    ){

    }

    public function __toString(){

        $ret = "<p>Email: " . $this->email . "</p>";
        $ret .= "<p>Nombre: " . $this->name . "</p>";
        $ret .= "<p>Tipo de comida: " . $this->comida . "</p>";
        $ret .= "<p>¿Con o sin gluten?: " . $this->gluten . "</p>";
        $ret .= "<p>Tiempo de la receta: " . $this->time . "</p>";
        $ret .= "<p>Color favortio seleccionado: " . $this->colorFavorito . "</p>";

        return $ret;
    }
   
}