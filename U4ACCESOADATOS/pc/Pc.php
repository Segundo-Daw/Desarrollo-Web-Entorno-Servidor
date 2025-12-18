<?php
class Pc{
    
    function __construct(
        private int $id,
        private string $owner,
        private string $brand,
        private float $price,
        private array $components
        
    ){}


}