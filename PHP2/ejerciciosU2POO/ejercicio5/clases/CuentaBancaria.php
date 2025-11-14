<?php
abstract class CuentaBancaria{
    private string $titular;
    private float $saldo;
    private array $movimientos = [];

    public function __construct($titular, $saldo, $movimientos){
        $this->titular = $titular;
        $this->saldo = $saldo;
        $this->movimientos = $movimientos;

    }

    //Aumenta el saldo y agrega movimiento
    public function depositar(float $monto){

        $this->saldo += $monto;
        $this->movimientos[] = $monto;

    }

    //Método retirar, disminuye saldo si hay fondos; registra movimeinto;
    public function retirar(float $monto){
        if ($this->saldo >= $monto){
            $this->saldo -= $monto;
            $this->movimientos[] = $monto;
        }else{
            echo "No hay saldo suficiente";
        }
    }

    //Método para obtener saldo
    public function obtenerSaldo(){
        return $this->saldo;
    }

    //Metodo para obtener movimientos
    public function obtenerMovimientos(){
        return $this->movimientos;
    }



   
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getTitular()
    {
        return $this->titular;
    }
}

?>