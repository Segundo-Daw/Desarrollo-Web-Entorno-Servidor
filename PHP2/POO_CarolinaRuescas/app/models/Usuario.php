<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";


class Usuario{

    public function __construct(
        private String $nameUser,
        private String $email,
        private String $password,
        private array $mascotas = [],
        private int $id = -1,

    ){}
   
    public function getNameUser(){
        return $this->nameUser;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function getMascotas(){
        return $this->mascotas;
    }

    public function setNameUser($nameUser){
        $this->nameUser = $nameUser;

        return $this;
    }

    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    public function __toString() {
        $ret = "<ul><li>Usuario: $this->nameUser " .  "|  Email: $this->email " .  " | Total de mascotas: " . count($this->mascotas) . " | Id: ". $this->id . "</li></ul>";

        return $ret;
    }

    // Añadir una mascota al usuario
    // ponemos Mascota y no string porque no quiero que me guarde un nombre de mascota, sino toda la informacion de esa mascota que hay en la clase
    public function agregarMascota(Mascota $mascota) {
        $this->mascotas[] = $mascota;
    }

    // Método para borrar mascota
    public function eliminarMascota(Mascota $mascota) {
    foreach ($this->mascotas as $index => $m) {
        if ($m === $mascota) { // compara si es exactamente el mismo objeto
            unset($this->mascotas[$index]); // elimina del array
            $this->mascotas = array_values($this->mascotas); // reindexa el array
            return true; // eliminación exitosa
            }
        }
        return false; // no se encontró la mascota
    }



    // Mostrar información del usuario y sus mascotas
    public function mostrarInfo() {
        echo "Usuario: {$this->nameUser}\n";
        echo "Email: {$this->email}\n";

        $totalMascotas = count($this->mascotas); // contar mascotas
        echo "Total de mascotas: {$totalMascotas}\n";

        echo "Mascotas:\n";
        if (empty($this->mascotas)) {
            echo "- Ninguna\n";
        } else {
            foreach ($this->mascotas as $mascota) {
                echo $mascota; // llama al __toString() de Mascota con toda su ifnormación
                echo "\n";
            }
        }
    }


}



?>