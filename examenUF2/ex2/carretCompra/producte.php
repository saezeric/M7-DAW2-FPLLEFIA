<?php

class Producte
{
    public $nom;
    public $preu;

    public function __construct($nom, $preu)
    {
        $this->$nom = $nom;
        $this->preu = $preu;
    }
}
