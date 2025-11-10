<?php 

abstract class Mascota{
    private String $name;
    private int $age;
    private int $numberDays;  /* dias que se quedan hospedados los animales*/ 
    private array $servicios = [];
    protected String $type;   /* si es perro, gato o ave*/

    public function __construct($name, $age, $numberDays, $servicios){
        $this -> name = $name;
        $this -> age = $age;
        $this -> numberDays = $numberDays;
        $this->servicios = $servicios;
    }

    //Este lo he hecho para poder hacer el metodo en Hotel de ingresos por mascotas
    public function getName(){
        return $this->name;
    }


    public function __toString(){
        $serviciosAsStr = empty($this->servicios) ? 'Ninguno' : implode(', ', $this->servicios);


        $ret = 
            "Nombre mascota:  {$this->name}\n" . 
            "Edad: {$this->age}\n" . 
            "Días que se queda en el hotel: {$this->numberDays}\n" . 
            "Tipo de mascota: {$this->type}\n" . 
            "Servicios: {$serviciosAsStr}\n" . 
            "Costo total: " . ($this->calcularPrecioTotal()) . "€\n";

        return $ret;  
    }

    /* 
    Método para añadir servicios a las mascota
    He puesto un if para evitar duplicados. 
     */ 

    public function anadirServicio(string $servicio){
        if (!in_array($servicio, $this->servicios)) {
            $this -> servicios [] = $servicio;
        }
    }

    // Método para borrar un servicio asignado a una mascota

    public function eliminarServicio(string $servicio): bool {
    foreach ($this->servicios as $key => $s) {
        if ($s === $servicio) { // compara si es exactamente el mismo objeto
            unset($this->servicios[$key]); //elimina del aray
            $this->servicios = array_values($this->servicios); //reindexa el array
            return true;  //lo elimina de forma exitosa
        }
    }
    return false;  // no se encontró la mascot
}



    //Método para mostrar los servicios que hay disponibles
    public function mostrarServiciosDisponibles(){
        Servicio::mostrarServiciosDisponibles();
    }

    
   // Método para calcular el precio total de los días dependiendo de si tiene servicios contratados o no
    
    public function calcularPrecioTotal(){
         // Accede a la constante de la subclase
        $tarifaBase = static::TARIFA_BASE_DIA;
        $totalServicios = 0;

        // Recorre los servicios contratados por esta mascota
        foreach ($this->servicios as $nombreServicio) {
            $servicio = Servicio::obtenerPorNombre($nombreServicio);
            if ($servicio !== null) {
                $totalServicios += $servicio->getPrecio();
            }
        }

        // Aplica 20% de descuento si hay 3 o más servicios contratados
        if (count($this->servicios) >= 3) {
         $totalServicios *= 0.8; // equivalente a 20% de descuento (100%-20%)
         }
        return ($tarifaBase * $this->numberDays) + $totalServicios;
    }



}



   
?>

