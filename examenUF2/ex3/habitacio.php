<?php

class Habitacio
{
    public $tipus;
    public $preu;
    public $disponible;

    public function __construct($tipus, $preu, $disponible = true)
    {
        $this->tipus = $tipus;
        $this->preu = $preu;
        $this->disponible = $disponible;
    }

    public function mostrarInfo()
    {
        $disponibilitat = $this->disponible ? "Disponible" : "No disponible";
        return 'Tipus: ' . $this->tipus . ', Preu: ' . $this->preu . '€, ' . $disponibilitat . '';
    }
}
