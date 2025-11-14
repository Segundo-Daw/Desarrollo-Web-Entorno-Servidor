<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Person.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/PayLip.php";

class Employee extends Person implements Payslip{
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

    // Método obligatorio de la interfaz
    public function createPayslip(Employee $employee): string {
        return "Nómina del empleado " . $employee->getFullName() .
            ". Salario bruto: " . $employee->salary .
            ". Salario neto: " . $employee->calculateSalary() ;
    }
}

?>