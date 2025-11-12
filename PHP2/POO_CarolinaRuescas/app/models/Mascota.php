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

    // Añadir un servicio, evitando duplicados
    public function anadirServicio(Servicio $servicio){
        foreach ($this->servicios as $s) {
            if ($s->getNameService() === $servicio->getNameService()) {
                // ya existe, no añadimos
                return;
            }
        }
        $this->servicios[] = $servicio;
    }

    // Eliminar un servicio por nombre
    public function eliminarServicio(string $nombreServicio): bool {
        foreach ($this->servicios as $key => $s) {
            if ($s->getNameService() === $nombreServicio) {
                unset($this->servicios[$key]);
                $this->servicios = array_values($this->servicios); // reindexa el array
                return true;
            }
        }
        return false;
    }

    //Método para mostrar los servicios que hay disponibles
    public function mostrarServiciosDisponibles(){
        Servicio::mostrarServiciosDisponibles();
    }

    
   // Método para calcular el precio total de los días dependiendo de si tiene servicios contratados o no

    public function calcularPrecioTotal(){
         // Accede a la constante de la subclase
        $tarifaBase = static::getTarifaBaseDia();
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
        // Calcula el plus específico de la subclase
        $plus = $this->calcularPlus();
        return ($tarifaBase * $this->numberDays) + $totalServicios + $plus;
    }





    //Método para mostrar toda la información detallada de cada mascota
    public function mostrarInfoCompleta(): string {
        $info = "Nombre: $this->name\n";
        $info .= "Edad: $this->age años\n";
        $info .= "Tipo: $this->type \n";
        $info .= "Número de días: $this->numberDays\n";

        // Mostrar servicios
        if (!empty($this->servicios)) {
            $info .= "Servicios contratados:\n";
            foreach ($this->servicios as $servicio) {
                    $info .= "  - {$servicio->getNameService()} ({$servicio->getPrecio()}€)\n";
                }
            
            if (count($this->servicios) >= 3) {
                $info .= "Descuento aplicado por 3 o más servicios: 20%\n";
            }
        } else {
            $info .= "Servicios contratados: Ninguno\n";
        }

        // Mostrar plus
        $plus = $this->calcularPlus();
        $info .= "Plus por características especiales: {$plus}€\n";

        // **Aquí usamos directamente calcularPrecioTotal()**
        $info .= "PRECIO TOTAL: {$this->calcularPrecioTotal()}€\n";

        return $info;
    }


    







}



   
?>

