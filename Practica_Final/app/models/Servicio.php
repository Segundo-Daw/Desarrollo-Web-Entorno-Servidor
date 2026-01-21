<?php 

class Servicio{
    private String $nameService;
    private float $precio;


    public function __construct($nameService, $precio){
        $this->nameService = $nameService;
        $this->precio = $precio;
    }
    

    public function getNameService()
    {
        return $this->nameService;
    }


    public function getPrecio()
    {
        return $this->precio;
    }

    public function __toString(){
        return $this->nameService . ": " .  $this->precio . "€";
    }

     // Lista de servicios disponibles (como un catálogo general)
    private static array $serviciosDisponibles;

    public static function initServicios() {
        self::$serviciosDisponibles = [
            new Servicio("Baño", 10),
            new Servicio("Corte de pelo", 15),
            new Servicio("Paseo", 5),
            new Servicio("Entrenamiento", 25),
            new Servicio("Spa", 30),
            new Servicio("Corte de uñas", 7),
            new Servicio("Retoque plumas", 6),
            new Servicio("Cepillado", 12)
        ];
    }


     // Mostrar en pantalla los servicios con formato
    public static function mostrarServiciosDisponibles(){
        echo "🐾 Servicios disponibles: <br>";
        foreach (self::$serviciosDisponibles as $servicio) {
            echo "- " . $servicio->__toString() . "<br>";
        }
    }

    // Método para buscar un servicio por nombre
    public  static function obtenerPorNombre(string $nombreServicio){
        foreach (self::$serviciosDisponibles as $servicio) {
            if (strcasecmp($servicio->getNameService(), $nombreServicio) === 0) { // compara sin distinguir mayúsculas
                return $servicio;
            }
        }
        return null; // si no existe
    }

    // Obtener precio de un servicio específico
    public static function obtenerPrecio(string $nombreServicio): ?float {
        $servicio = self::obtenerPorNombre($nombreServicio);
        return $servicio ? $servicio->getPrecio() : null;
    }


    // Método para borrar un servicio del CATALOGO (no de la mascota)
    public static function eliminarServicioDelCatalogo(string $nombreServicio): bool {
        foreach (self::$serviciosDisponibles as $key => $servicio) {
            if (strcasecmp($servicio->getNameService(), $nombreServicio) === 0) {
                unset(self::$serviciosDisponibles[$key]);
                self::$serviciosDisponibles = array_values(self::$serviciosDisponibles);
                return true;
            }
        }
        return false;
    }



}

?>