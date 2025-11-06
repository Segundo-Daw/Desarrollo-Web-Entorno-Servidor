<?php

class Empleade{
    private String $nombre;
    private String $apellidos;
    private float $sueldo = -1; // al poner -1 indicamos que su no recibe sueldo sale -1
    private array $telefonos;

    public function __construct($nombre, $apellidos, $telefonos, $sueldo = -1){
        $this -> nombre =  $nombre;
        $this -> apellidos = $apellidos;
        $this -> telefonos  = $telefonos;
        $this -> sueldo = $sueldo;
        
    }

    
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(){
        return $this->apellidos;
    }


    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getSueldo(){
        return $this->sueldo;
    }
 
    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;

        return $this;
    }

    public function getTelefonos(){
        return $this->telefonos;
    }

    public function setTelefono($telefonos){
        $this->telefonos = $telefonos;

        return $this;
    }

    public function __toString(){
        $ret = "| DATOS |" .  " - Nombre: " .  $this->nombre .  " - Apellido: " . $this->apellidos . " - Sueldo: " . $this->sueldo;
        return $ret;
    }

    //Crear método getNombreCompleto(): string, que devuelve (¡no imprime!) el nombre completo de le empleade (es decir, nombre y apellido)

    public function getNombreCompleto(){
        $ret = "Nombre: " .  $this->nombre . " - Apellido: " . $this->apellidos ;
        return $ret;
    }

    //Crea el método llamado pagarImpuestos(): float, que calcule la cantidad de impuestos que debe pagar de IRPF en función de su sueldo.
    public function pagarImpuestos(){
        if ($this->sueldo == -1){
            return -1;
        }

        $sueldo = $this->sueldo;

        $total = 0;
        
        if ($sueldo <= 12450) {
            $total = $sueldo * 0.19;
        } else if ($sueldo <= 20200) {
            $total = 12450 * 0.19 + ($sueldo - 12450) * 0.24;
        } else if ($sueldo <= 35200) {
            $total = 12450 * 0.19 + (20200 - 12450) * 0.24 + ($sueldo - 20200) * 0.30;
        } else {
            $total = 12450 * 0.19 + (20200 - 12450) * 0.24 + (35200 - 20200) * 0.30 + ($sueldo - 35200) * 0.37;
        }

        return $total;

    }


    public function anadirTelefono(string $telefono){
        $this->telefonos[] = $telefono;
    }

    // Mostrar los teléfonos
    public function mostrarTelefonos(){
        return $this->telefonos;
    }

    //listar todos los telefonos separados por comas
    public function listarTelefonos(){
        return implode($this->telefonos);  //con el implode se une todos los elementos del array
    }

    //Elimina todos los teléfonos del array
    public function vaciarTelefonos(){
        $this->telefonos = [];
    }

    //devuelve en un párrafo los datos de le empleade (nombre, apellidos, sueldo e impuestos), y a continuación dentro de una lista desordenada (<ul>) los números de teléfono (si tiene).

    public function toHtml(){
        $res = "<p>Nombre: " . $this->nombre . "Apellido" . $this->apellidos . "Sueldo: " . $this->sueldo;
        return $res;
    }


    






    
    
}