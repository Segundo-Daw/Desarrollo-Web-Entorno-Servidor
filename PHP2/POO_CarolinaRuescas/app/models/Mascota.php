<?php 

abstract class Mascota{
  

    public function __construct(
        private String $name,
        private int $age,
        private int $numberDays,  /* dias que se quedan hospedados los animales*/ 
        protected String $type,   /* si es perro, gato o ave*/
        private array $servicios = [],
        private int $id = -1
    ){}
    

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
            "Costo total: " . ($this->calcularPrecioTotal()) . "€\n" . 
            "ID: {$this->id}";

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


    
    //Todas las clases hijas tienen implementado este método
    abstract public static function getTarifaBaseDia();


    //En Mascota no se sabe calcular el plus, porque depende de las subclases, al declararlo abstracto se obliga a implementearlo
    abstract public function calcularPlus();
    
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




    //metodo para mostrar los servicios que tiene cada mascota
    public function mostrarServiciosMascota(){
        if (!empty($this->servicios)) {
            $info = "Servicios contratados:\n";
            foreach ($this->servicios as $servicio) {
                    $info .= "  - {$servicio->getNameService()} ({$servicio->getPrecio()}€)\n";
                }
        } else {
            $info = "Servicios contratados: Ninguno\n";
        }
        return $info;
    }

    //Método para mostrar si tiene algun descuento aplicado
    public function mostrarSiHayDescuento(){
        if (count($this->servicios) >= 3) {
                $info = "Descuento aplicado por 3 o más servicios: 20%\n";
        }else{
            $info = "Sin desceunto aplicado.";
        }
        return $info;

    }


    //Método para mostrar toda la información detallada de cada mascota
    public function mostrarInfoCompleta(): string {
        $info = "Nombre: $this->name\n";
        $info .= "Edad: $this->age años\n";
        $info .= "Tipo: $this->type \n";
        $info .= "Número de días: $this->numberDays\n";

        $info  .= $this->mostrarServiciosMascota();
        $info .= $this->mostrarSiHayDescuento();

        // Mostrar plus
        $plus = $this->calcularPlus();
        $info .= "Plus por características especiales: {$plus}€\n";

        // **Aquí usamos directamente calcularPrecioTotal()**
        $info .= "PRECIO TOTAL: {$this->calcularPrecioTotal()}€\n";

        return $info;
    }


    








        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Get the value of numberDays
         */ 
        public function getNumberDays()
        {
                return $this->numberDays;
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}



   
?>

