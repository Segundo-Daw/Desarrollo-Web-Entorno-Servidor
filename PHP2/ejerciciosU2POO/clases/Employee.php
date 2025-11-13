<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Person.php";

class Employee extends Person{
    public function __construct($name, $surname,$salary, $telephones){
        parent::__construct($name, $surname,$salary, $telephones);
    }
    

    public function __toString(): string {
    return $this->getFullName() . "<br>"  . "Sueldo: " . $this->salary;
    }

    //Método para el sueldo de los empleados
    public function calculateSalary(){
        return $this->salary -  $this->payTaxes();
    }
}

?>