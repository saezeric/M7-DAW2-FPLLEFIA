<?php
require_once("habitacio.php");

class Hotel
{
    public $habitacions = [];

    public function __construct()
    {
        // Inicialitzem l'hotel amb algunes habitacions
        $this->habitacions[] = new Habitacio("Individual", 57);
        $this->habitacions[] = new Habitacio("Individual", 68);
        $this->habitacions[] = new Habitacio("Doble", 82);
        $this->habitacions[] = new Habitacio("Doble", 106);
        $this->habitacions[] = new Habitacio("Suite", 156);
    }

    public function llistarHabitacions()
    {
        echo "<h3>Habitacions Disponibles:</h3>";
        foreach ($this->habitacions as $habitacio) {
            if ($habitacio->disponible) {
                echo '<p>' . $habitacio->mostrarInfo() . '</p>';
            }
        }
    }

    public function reservarHabitacio($tipus)
    {
        foreach ($this->habitacions as $habitacio) {
            if ($habitacio->tipus == $tipus && $habitacio->disponible) {
                $habitacio->disponible = false;
                echo '<p>Habitación ' . $tipus . ' reservada con exito.</p>';
                return;
            }
        }
        echo '<p>No hay habitaciones disponibles de el tipo' . $tipus . '</p>';
    }

    public function mostrarDisponibilitat()
    {
        echo "<h3>Disponibilitat actual:</h3>";
        foreach ($this->habitacions as $habitacio) {
            echo "<p>{$habitacio->mostrarInfo()}</p>";
        }
    }
}
