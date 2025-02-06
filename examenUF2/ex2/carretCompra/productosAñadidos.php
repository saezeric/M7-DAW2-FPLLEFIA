<?php
session_start();
require_once("carretCompra.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $producte = $_POST['producte'];
    $preu = $_POST['preu'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = new CarretCompra();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Añadidos</title>
</head>

<body>

</body>

</html>