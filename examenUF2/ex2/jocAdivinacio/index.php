<?php
session_start();
//session_destroy();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_SESSION['numero'] = $_POST['numero'];
    $joc = $_SESSION['jocAdivinacio'];
    $_SESSION['jocAdivinacio'] = serialize($joc);
    echo "He entrado en recibir metodo post";
}

if (!isset($_SESSION['numeroSecret']) && !isset($_SESSION['intents'])) {
    $_SESSION['intents'] = 0;
    $_SESSION['numeroSecret'] = rand(1, 20);
    $intents = $_SESSION['intents'];
    $numeroSecret = $_SESSION['intents'];

    $_SESSION['jocAdivinacio'] = new jocAdivinacio($numeroSecret, $intents);

    $joc = $_SESSION['jocAdivinacio'];
    $_SESSION['jocAdivinacio'] = serialize($joc);
    echo "He entrado en crear Sesion y serializarla";
} else {
    $joc = unserialize($_SESSION['jocAdivinacio']);
    $_SESSION['jocAdivinacio'] = $joc;
    echo "He entrado en unserializar sesion";
}




class jocAdivinacio
{
    public $numeroAleatori;
    public $intents;

    public function __construct($numeroSecret, $intents)
    {
        $this->numeroAleatori = $numeroSecret;
        $this->intents = $intents;
    }

    public function comprovar($num)
    {
        if ($num < $this->numeroAleatori) {
            echo "El numero que has de adivinar es mas grande";
            $this->intents++;
        }

        if ($num > $this->numeroAleatori) {
            echo "El numero que has de adivinar es mas pequeño";
            $this->intents++;
        }

        if ($num == $this->numeroAleatori) {
            echo "Has acertado el numero!! Enorabuena";
            $this->intents++;
            session_destroy();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc Adivinació</title>
</head>

<body>
    <section>
        <form method="POST" action="index.php">
            <label for="numero">Introduzca un numero entre 1 y 20</label>
            <input id="numero" name="numero" type="number">
            <button type="submit">Enviar</button>
            <?php
            $numero = $_SESSION['numero'];
            $joc = $_SESSION['jocAdivinacio'];
            //if (is_object($joc) && method_exists($joc, 'comprovar')) {}
            $joc->comprovar($numero);
            ?>
        </form>
    </section>
</body>

</html>