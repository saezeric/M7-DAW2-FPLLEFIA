<?php
session_start();
//session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $edat = $_POST['edat'];
    $correu = $_POST['correu'];

    $usuario = new Usuario($nom, $edat, $correu);
    $errores = $usuario->validarDatos();

    if (empty($errores)) {
        $_SESSION['usuario'] = $usuario;
        echo "Usuario registrado con exito!!";
    } else {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    }
}

class Usuario
{
    public $nom;
    public $edat;
    public $correu;

    public function __construct($nom, $edat, $correu)
    {
        $this->nom = $nom;
        $this->edat = $edat;
        $this->correu = $correu;
    }

    public function validarDatos()
    {
        $errores = [];

        if (!is_numeric($this->edat) || $this->edat < 0) {
            $errores[] = '' . $this->nom . ' no ha introducido un numero para edad valido';
        }

        if (!strpos($this->correu, '@') || !strpos($this->correu, '.')) {
            $errores[] = '' . $this->nom . ' no ha introducido un correo valido';
        }

        return $errores;
    }
}
