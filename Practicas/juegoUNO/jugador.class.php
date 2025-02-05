<?php
require_once 'carta.class.php';

class Jugador
{
    public $mano;
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
        $this->mano = [];
    }

    public function afegir_carta($carta)
    {
        // array_push($this->mano[], $carta);
        $this->mano[] = $carta;
    }

    public function eliminar_carta($carta)
    {
        if (isset($this->mano[$carta])) {
            unset($this->mano[$carta]);
            $this->mano = array_values($this->mano);
        }
    }

    public function mostrar_ma()
    {
        // Contenedor principal del jugador con estilos de Bootstrap
        echo '
        <div class="card shadow my-2 p-3 col-md-3">
            <h5 class="card-title mb-3">Jugador ' . $this->id . '</h5>
        <div class="d-flex flex-wrap gap-3">
        ';

        // Mostrar cada carta como un enlace interactivo
        foreach ($this->mano as $carta) {
            $carta->pinta_carta_link();
        }

        echo '</div></div>';
    }

    public function mostrar_ma_girada()
    {
        // Contenedor principal del jugador con estilos de Bootstrap
        echo '
        <div class="card shadow my-2 p-3 col-md-3">
            <h5 class="card-title mb-3">Jugador ' . $this->id . '</h5>
        <div class="d-flex flex-wrap gap-3">
        ';

        // Mostrar cada carta como un enlace interactivo
        foreach ($this->mano as $carta) {
            $carta->pinta_carta_girada();
        }

        echo '</div></div>';
    }
}
