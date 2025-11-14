<?php

abstract class Vehiculo{
    private string $matricula;
    private string $modelo;
    private int $capacidadMaxima;
    private float $kmRecorridos;


    public function __construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos){
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->capacidadMaxima = $capacidadMaxima;
        $this->kmRecorridos = $kmRecorridos;
    }

    public function __toString(){
        $ret = "Matricula del vehículo: " . $this->matricula . "<br>";
        $ret .= "Modelo: " . $this->modelo . "<br>";
        $ret .= "Capacidad máxima de personas: " . $this->capacidadMaxima ."<br>";
        $ret .= "Kilometros que ha recorrido: " . $this->kmRecorridos . "<br>";

        return $ret;

    }

    public abstract function calcularCosteMantenimiento();


   
    public function getKmRecorridos()
    {
        return $this->kmRecorridos;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    //Metodo para registrar un viaje y sumar km
    public function registrarKmNuevos($km){
        return $this->kmRecorridos += $km;
    }


    //Metodo para saber si necesita revision
    public function necesitaRevision(): bool {
        return $this->kmRecorridos > 50000;
    }

    //Devolver la información en un listado de HTML
    public function toHtml(){
        return "<ul>
                    <li>Matricula: $this->matricula</li>
                    <li>Modelo: $this->modelo</li>
                    <li>Capacidad Máxima: $this->capacidadMaxima</li>
                    <li>Kilómetro recorridos: $this->kmRecorridos</li>
                    <li>Coste de mantenimiento: " . number_format($this->calcularCosteMantenimiento(), 2) . " </li>
                    <li>¿Necesita revisión?: " . ($this->necesitaRevision() ? "Si la necesita" : "No la necesita") . " </li>
        </ul>";
    }


   
    
}




?>