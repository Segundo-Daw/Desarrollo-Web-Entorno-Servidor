<?php
class Producto {
    private string $nombre;
    private float $precio;
    private float $iva;

    public function __construct(string $nombre, float $precio, float $iva) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->iva = $iva;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getIVA(): float {
        return $this->iva;
    }

    public function precioConIVA(): float {
        return $this->precio + ($this->precio * $this->iva / 100);
    }

    public function rebajar(float $porcentaje): void {
        $this->precio -= $this->precio * ($porcentaje / 100);
    }

    public function __toString(): string {
        return $this->nombre . ". Precio: " . $this->precio .  "€  IVA: ". $this->iva . "%  Final: " .
               number_format($this->precioConIVA(), 2) . " €";
    }
}