<?php
class CuentaBancaria {
    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldoInicial) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }


    public function ingresar(float $cantidad): void {
        $this->saldo += $cantidad;
    }


    public function retirar(float $cantidad): bool {
        if ($cantidad > $this->saldo) {
            return false;
        }
        $this->saldo -= $cantidad;
        return true;
    }

    public function obtenerSaldo(): float {
        return $this->saldo;
    }

    
    public function __toString(): string {
        return "Cuenta de " . $this->titular . " Saldo: " . $this->saldo . "€";
    }
}