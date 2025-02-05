<?php
session_start();
//session_destroy();
require_once("partida.class.php");
require_once("baraja.class.php");

// ########################################################################
//                                SESSIONS
// ########################################################################

if (isset($_SESSION['partida'])) {
    //var_dump($_SESSION['partida']);
    if (isset($_GET['palo']) && isset($_GET['numero']) && isset($_GET['index']) || isset($_GET['robar'])) {
        echo "Serializo ";
        $partida = $_SESSION['partida'];
        $_SESSION['partida'] = serialize($partida);
        $partida = $_SESSION['partida'];
    }
    if ($partida === false) {
        die("Error al deserializar la partida.");
    }
    echo "Unserializo";
    $partida = unserialize($_SESSION['partida']);
    $_SESSION['partida'] = $partida;
} else {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!isset($_POST['jugadores']) || !isset($_POST['cartas'])) {
            die("Error: Faltan datos del formulario.");
        }

        $numero_jugadores = $_POST['jugadores'];
        $numero_cartas = $_POST['cartas'];

        // Crear baraja y partida
        $baraja = new Baraja();
        $baraja->crea_baraja();
        $baraja->mezclar();

        $partida = new Partida($numero_jugadores, $numero_cartas, $baraja);
        $_SESSION['partida'] = serialize($partida);
        $partida = $_SESSION['partida'];
        header("Location: juegoUno.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del UNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <main>
        <video class="video-background" autoplay loop muted>
            <source src="./cartas_uno/video_fondo_uno.mp4" type="video/mp4">
            Tu navegador no soporta el formato de video.
        </video>
        <section class="bg-light position-absolute top-50 start-50 translate-middle w-75 p-5 rounded content">
            <div class="text-center">
                <h1>Juego del UNO</h1>
                <?php
                if (is_object($partida) && method_exists($partida, 'jugar')) {
                    $partida->jugar();
                } else {
                    die("Error con partidajugar");
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>