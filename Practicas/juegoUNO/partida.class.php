<?php
session_start();
// session_destroy();
require_once "carta.class.php";
require_once "baraja.class.php";
require_once "jugador.class.php";

class Partida
{
    public $numero_jugadores;
    public $numero_cartas;
    public $turno;
    public $baraja;
    public $carta_en_mesa;
    public $array_jugadores;
    public $constante_sentido = 1;

    public function __construct($numero_jugadores, $numero_cartas, $baraja)
    {
        $this->numero_jugadores = $numero_jugadores;
        $this->numero_cartas = $numero_cartas;
        $this->turno = 0;
        $this->baraja = $baraja;
        $this->array_jugadores = [];
        $this->constante_sentido = 1;
        $this->inicializar_jugadores();
        $this->inicializar_partida();
    }

    private function inicializar_jugadores()
    {
        for ($i = 1; $i <= $this->numero_jugadores; $i++) {
            $jugador = new Jugador($i); // Crear un nuevo jugador
            for ($j = 0; $j < $this->numero_cartas; $j++) {
                $carta = array_shift($this->baraja->conjunto_cartas); // Repartir cartas
                $jugador->afegir_carta($carta);
            }
            $this->array_jugadores[] = $jugador; // Añadir jugador al array
        }
    }

    // #####################################################
    // MÉTODO PARA INICIALIZAR LA PARTIDA
    // #####################################################

    private function inicializar_partida()
    {
        // Sacar la primera carta de la baraja y asignarla a carta_en_mesa
        $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);

        // Si la carta en mesa al comenzar la partida es especial, se hace un bucle hasta que la carta que aparezca sea una carta normal
        if ($this->carta_en_mesa->numero === "reverse" || $this->carta_en_mesa->numero === "skip" || $this->carta_en_mesa->numero === "picker") {
            while ($this->carta_en_mesa->numero === "reverse" || $this->carta_en_mesa->numero === "skip" || $this->carta_en_mesa->numero === "picker") {
                $this->carta_en_mesa = array_push($this->baraja->conjunto_cartas);
                $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);
            }
        }
    }

    // #####################################################
    // MÉTODO PARA CAMBIAR DE SENTIDO
    // #####################################################

    public function cambiar_sentido()
    {
        $this->constante_sentido *= -1; // Cambiar entre 1 (horario) y -1 (antihorario)
    }

    // #####################################################
    // MÉTODO PARA CAMBIAR TURNO
    // #####################################################

    // Método para cambiar el turno al siguiente jugador
    public function cambiar_turno()
    {
        // Calcular el siguiente turnos
        $this->turno = $this->turno + $this->constante_sentido;

        // Ajustar el turno para que esté dentro del rango de jugadores
        if ($this->turno < 0) {
            $this->turno += $this->numero_jugadores; // Ajustar si es negativo
        } elseif ($this->turno >= $this->numero_jugadores) {
            $this->turno -= $this->numero_jugadores; // Ajustar si excede el número de jugadores
        }
    }

    // #####################################################
    // MÉTODO PARA APLICAR LAS NORMAS DEL UNO
    // #####################################################

    public function normas_uno($carta_jugada)
    {
        switch ($carta_jugada) {
            case 'reverse':
                $this->cambiar_sentido(); // Cambiar el sentido del juego
                break;
            case 'skip':
                $this->cambiar_turno();   // Saltar el turno del siguiente jugador
                break;
            case 'picker':
                $this->cambiar_turno();   // Cambiar al siguiente jugador
                $jugador_actual = $this->array_jugadores[$this->turno];
                for ($i = 0; $i < 2; $i++) {
                    $carta = array_shift($this->baraja->conjunto_cartas); // Robar 2 cartas
                    $jugador_actual->afegir_carta($carta);
                }
                break;
            default:
                $this->cambiar_turno();
                break;
        }
    }

    // #####################################################
    // MÉTODO PARA CONTROLAR EL FUNCIONAMIENTO DEL JUEGO
    // #####################################################

    public function jugar()
    {

        $palo = $_GET['palo'];
        $numero = $_GET['numero'];
        $index = $_GET['index'];

        if ($palo === $this->carta_en_mesa->palo || $numero === $this->carta_en_mesa->numero) {
            $this->carta_en_mesa = new Carta($palo, $numero, $index);
            $this->normas_uno($this->carta_en_mesa);
            echo $this->turno;
        }

        echo '
           <div class="container-fluid">
            ' . $this->carta_en_mesa->pinta_carta() . '
            <div class="row d-flex flex-wrap gap-3 justify-content-center">';

        // Mostrar manos de los jugadores
        foreach ($this->array_jugadores as $index => $jugador) {
            if ($index == $this->turno) {
                echo $jugador->mostrar_ma(); // Muestra cartas del jugador actual
            } else {
                echo $jugador->mostrar_ma_girada();
            }
        }
        echo '<a href="index.php?robar" type="submit" class="btn btn-success mb-3">ROBAR</a>
            </div>
           </div>';

        // Obtener el jugador actual
        $jugador_actual = $this->array_jugadores[$this->turno];

        // Verificar si el jugador puede jugar una carta
        $puede_jugar = false;
        foreach ($jugador_actual->mano as $carta) {
            if ($carta->palo === $this->carta_en_mesa->palo || $carta->numero === $this->carta_en_mesa->numero) {
                $puede_jugar = true;
                break;
            }
        }

        if ($puede_jugar) {
            echo "<h3>El jugador {$jugador_actual->id} puede jugar una carta.</h3>";
        } else {
            echo "<h3>El jugador {$jugador_actual->id} no puede jugar. Roba una carta.</h3>";
            $carta_robada = array_shift($this->baraja->conjunto_cartas);
            $jugador_actual->afegir_carta($carta_robada);
        }

        // Verificar si un jugador ha ganado
        if (count($jugador_actual->mano) === 0) {
            echo "<h2>¡El jugador {$jugador_actual->id} ha ganado!</h2>";
            return;
        }

        // Cambiar el turno al siguiente jugador
        $this->cambiar_turno();
    }
}
