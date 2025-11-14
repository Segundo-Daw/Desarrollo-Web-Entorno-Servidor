<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/CuentaBancaria.php";
class CuentaAhorro extends CuentaBancaria{
    private float $interes;

    public function __construct($titular, $saldo, $movimientos, $interes){
        parent::__construct($titular,$saldo,$movimientos);
        $this->interes = $interes;
    }

    public function aplicarInteres(){
        $ganancia = $this->getSaldo() * $this->interes;
        $this->depositar($ganancia);



    }
}

?>