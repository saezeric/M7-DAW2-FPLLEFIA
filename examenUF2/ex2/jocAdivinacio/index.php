<?php
session_start();
//session_destroy();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $_SESSION['numero'] = $_POST['numero'];
}

if (!isset($_SESSION['jocAdivinacio'])) {
    $_SESSION['jocAdivinacio'] = new JocAdivinacio();
}




class JocAdivinacio
{
    public $numeroAleatori;
    public $intents;

    public function __construct()
    {
        $this->numeroAleatori = rand(1, 20);
        $this->intents = 0;
    }

    public function comprovar($num)
    {
        if ($num < $this->numeroAleatori) {
            echo "<br>El numero que has de adivinar es mas grande";
            $this->intents++;
        }

        if ($num > $this->numeroAleatori) {
            echo "<br>El numero que has de adivinar es mas pequeño";
            $this->intents++;
        }

        if ($num == $this->numeroAleatori) {
            echo "<br>Has acertado el numero!! Enorabuena";
            $this->intents++;
            session_destroy();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

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