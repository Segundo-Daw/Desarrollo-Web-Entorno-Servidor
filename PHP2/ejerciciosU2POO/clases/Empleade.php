<?php

class Empleade{
    private String $nombre;
    private String $apellidos;
    private float $sueldo = -1; // al poner -1 indicamos que su no recibe sueldo sale -1

    public function __construct($nombre, $apellidos, $sueldo = -1){
        $this -> nombre =  $nombre;
        $this -> apellidos = $apellidos;
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

    public function __toString(){
        $ret = "- Nombre: " .  $this->nombre . " - Apellido: " . $this->apellidos . " - Sueldo: " . $this->sueldo;
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

        if ($sueldo >= 0 && $sueldo <=12450){
            $sueldo *= 0.19;
            return $sueldo;
        }else if ($sueldo > 12450 && $sueldo <= 20199){
            $primerTramo = $sueldo - 12450;
            $restoPrimerTramo = 12450 * 0.19;
            $restoSegundoTramo = $primerTramo * 0.24;
            $sueldoTotal = $restoPrimerTramo + $restoSegundoTramo;
            return $sueldoTotal;
        }else if($sueldo >= 20200){
            $primerTramo = $sueldo -12450;
            $restoPrimerTramo = 12450 * 0.19;
            if($primerTramo > 12450){
                $primerTramo *= 0.24;
                $sueldoFinal = $primerTramo + $restoPrimerTramo;
                return $sueldoFinal;
            }else if($primerTramo < 12450){
                $primerTramo*=0.19;
                $sueldoFinal = $primerTramo + $restoPrimerTramo;
                return $sueldoFinal;
            }
        }else if ($sueldo >= 35200){
            $primerTramo = $sueldo -12450;
            $restoPrimerTramo = 12450 * 0.19;
            if($primerTramo > 20200){
                $primerTramo *= 0.30;
                $sueldoFinal = $primerTramo + $restoPrimerTramo;
                return $sueldoFinal;
            }else if($primerTramo < 20200){
                if($primerTramo > 12450){
                    $primerTramo *= 0.24;
                    $sueldoFinal = $primerTramo + $restoPrimerTramo;
                    return $sueldoFinal;
                }else if($primerTramo < 12450){
                    $primerTramo*=0.19;
                    $sueldoFinal = $primerTramo + $restoPrimerTramo;
                    return $primerTramo;
                }
            }
        }
    }





}