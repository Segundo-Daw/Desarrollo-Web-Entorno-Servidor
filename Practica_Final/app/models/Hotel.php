<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";


class Hotel {
    private string $nombre;
    private array $usuarios = []; 

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    // Método para añadir un usuario
    public function agregarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
    }

    // Eliminar un usuario (por objeto)
    public function eliminarUsuario(Usuario $usuario) {
        foreach ($this->usuarios as $index => $u) {
            if ($u === $usuario) {
                unset($this->usuarios[$index]);
                $this->usuarios = array_values($this->usuarios); // reindexa el array
                return true;
            }
        }
        return false;
    }

    // Método para mostrar información del hotel y sus usuarios
    public function mostrarInfoHotel(){
        echo "<p>Hotel: $this->nombre </p>";
        $totalUsuarios = count($this->usuarios);
        echo "<p>Total de usuarios: $totalUsuarios</p>";

        if ($totalUsuarios === 0) {
            echo "- Ningún usuario registrado\n";
        } else {
            foreach ($this->usuarios as $usuario) {
        
                echo "<p>$usuario</p>"; // llama al __toString() de Usuario
            }
        }
    }

    // Obtener todos los usuarios
    public function getUsuarios(){
        return $this->usuarios;
    }

    //Método para calcular los ingresos totales que tiene el Hotel
    public function calcularIngresosTotales() {
    $total = 0;
    foreach ($this->usuarios as $usuario) {
        foreach ($usuario->getMascotas() as $mascota) {
            $total += $mascota->calcularPrecioTotal();
        }
    }
    return "Ingresos totales: $total  €";
}


}




?>