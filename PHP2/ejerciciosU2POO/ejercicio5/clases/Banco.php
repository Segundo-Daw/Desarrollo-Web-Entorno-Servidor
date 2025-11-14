<?php

class Banco{
    private array $cuentas = [];

    public function agregarCuenta(CuentaBancaria $cuenta) {
        $this->cuentas[] = $cuenta;
    }

    public function buscarCuentaPorTitular(string $nombre): ?CuentaBancaria {
        foreach ($this->cuentas as $cuenta) {
            if ($cuenta->titular === $nombre) { 
                return $cuenta;
            }
        }
        return null;
    }

    public function calcularTotalDepositos(): float {
        $total = 0;
        foreach ($this->cuentas as $cuenta) {
            $total += $cuenta->obtenerSaldo();
        }
        return $total;
    }
    
}


?>
