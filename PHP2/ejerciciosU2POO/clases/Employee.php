<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Person.php";

class Employee extends Person{
    public function __construct($name, $surname,$salary, $telephones){
        parent::__construct($name, $surname,$salary, $telephones);
    }
    

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getSurname()
    {
        return $this->surname;
    }
 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }
 
    public function getSalary()
    {
        return $this->salary;
    }

   
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

     
    public function getTelephones()
    {
        return $this->telephones;
    }

    
    public function setTelephones($telephones)
    {
        $this->telephones = $telephones;

        return $this;
    }


    public function __toString(): string {
    return $this->getFullName() . "<br>"  . "Sueldo: " . $this->salary;
}


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

    //Método para el sueldo de los empleados
    public function calculateSalary(){
        return $this->salary -  $this->payTaxes();
    }











}




?>