<?php

class CarretCompra
{
    public $producte;

    public function __construct($producte)
    {
        $this->producte = $producte;
    }

    public function afegirProductes($producte, $preu) {}

    public function calcularTotal($preu) {}
}
