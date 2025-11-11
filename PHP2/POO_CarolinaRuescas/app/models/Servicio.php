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
        return "{$this->nameService} ({$this->precio} €)";
    }

     // Lista de servicios disponibles (como un catálogo general)
    public static function getServiciosDisponibles(): array {
        return [
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
    public static function mostrarServiciosDisponibles() {
        echo "🐾 Servicios disponibles:\n";
        foreach (self::getServiciosDisponibles() as $servicio) {
            echo "- " . $servicio->__toString() . "\n";
        }
    }

    // Método para buscar un servicio por nombre
    public  static function obtenerPorNombre(string $nombre){
        foreach (self::getServiciosDisponibles() as $servicio) {
            if (strcasecmp($servicio->getNombre(), $nombre) === 0) { // compara sin distinguir mayúsculas
                return $servicio;
            }
        }
        return null; // si no existe
    }

    // Obtener precio de un servicio específico
    public static function obtenerPrecio(string $nombre): ?float {
        return self::$serviciosDisponibles[$nombre] ?? null;
    }


    // Método para borrar un servicio del CATALOGO (no de la mascota)
    public static function eliminarServicioDelCatalogo(string $nombre): bool {
        if (isset(self::$serviciosDisponibles[$nombre])) {
            unset(self::$serviciosDisponibles[$nombre]); // elimina el servicio
            return true; // eliminación exitosa
        }
        return false; // el servicio no existía
    }



}

?>