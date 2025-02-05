<?php

class Carta
{
    public $palo;
    public $numero;
    public $index;

    public function __construct($palo, $numero, $index)
    {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta()
    {
        echo '
            <img src="./cartas_uno/' . $this->numero . '_' . $this->palo . '.png" alt="' . $this->numero . '_' . $this->palo . '">
        ';
    }

    public function pinta_carta_link()
    {
        echo '
            <a href="index.php?palo=' . $this->palo . '&numero=' . $this->numero . '&index=' . $this->index . '">
                <img src="./cartas_uno/' . $this->numero . '_' . $this->palo . '.png" alt="' . $this->numero . '_' . $this->palo . '">
            </a>
        ';
    }

    public function pinta_carta_girada()
    {
        echo '
            <img src="./cartas_uno/carta_girada.png" alt="cartaGirada">
        ';
    }
}
