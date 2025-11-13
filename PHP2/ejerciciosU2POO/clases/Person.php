<?php

abstract class Person{
    protected string $name;
    protected string $surname;
    protected float $salary;
    protected array $telephones=[];

    public function __construct($name, $surname, $salary, $telephones){
        $this->name=$name;
        $this->surname=$surname;
        $this->salary=$salary;
        $this->telephones=$telephones;
    }

    public function getName()
    {
        return $this->name;
    }

  
    public function getSurname()
    {
        return $this->surname;
    }
 
 
    public function getSalary()
    {
        return $this->salary;
    }


    public abstract function calculateSalary();  
    
    
    //Método para obtener el nombre completo
    public function getFullName() : string{
        return $this->getName() . " " . $this->getSurname();
    }

    //Método para pagar las tasas
    public function payTaxes(): float{
        if ($this->salary == -1){
            return -1;
        }

        $salary = $this->salary;

        $total = 0;
        
        if ($salary <= 12450) {
            $total = $salary * 0.19;
        } else if ($salary <= 20200) {
            $total = 12450 * 0.19 + ($salary - 12450) * 0.24;
        } else if ($salary <= 35200) {
            $total = 12450 * 0.19 + (20200 - 12450) * 0.24 + ($salary - 20200) * 0.30;
        } else {
            $total = 12450 * 0.19 + (20200 - 12450) * 0.24 + (35200 - 20200) * 0.30 + ($salary - 35200) * 0.37;
        }

        return $total;
    }

    //Método para añadir teléfonos
    public function addTelephone(string $tel){
        $this->telephones[] = $tel;

        return $this->telephones;
    }

    //Método para listar los telefonos
    public function listTelephones(){
        return $this->telephones;
    }

    //Método para ver si un empleado tiene telefonos o no
    public function emptyTelephones(){
        return empty($this->telephones);
    }

    //Método HTML para mostrar toda la ifnromación
    public function toHtml(): string{
         $ret = "Empleado: " . $this->getName() . " " . $this->getSurname() . ". Sueldo: " . $this->salary . " ";

        // Si hay teléfonos
        if (!empty($this->telephones)) {
            $ret .= "<ul>";
            foreach ($this->telephones as $telefono) {
                $ret .= "<li>$telefono</li>";
            }
            $ret .= "</ul>";
        }

        return "<p>$ret</p>";

    }

}


?>