<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Person.php";

class Manager extends Person{
    private int $seniority = 0;

    public function __construct($name, $surname,$salary, $telephones, $seniority = 0){
        parent::__construct($name, $surname,$salary, $telephones);
        $this->seniority = $seniority;
    }

    public function getSeniority()
    {
        return $this->seniority;
    }

    public function __toString(): string {
    return $this->getFullName() . "<br>" . "Sueldo: " . $this->salary;
    }


    //Método para el sueldo de los managers
    public function calculateSalary(){
        $ret =  ($this->getSalary() -  $this->payTaxes()) + 50 * $this->getSeniority();

        return $ret;
    }
}

?>