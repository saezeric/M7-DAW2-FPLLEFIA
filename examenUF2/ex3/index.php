<?php
session_start();
require_once("hotel.php");

if (!isset($_SESSION['hotel'])) {
    $_SESSION['hotel'] = new Hotel();
}

$hotel = $_SESSION['hotel'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipus = $_POST['tipus'];
    $hotel->reservarHabitacio($tipus);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reservar un Hotel</title>
</head>

<body>
    <h1>Reservar un Hotel</h1>
    <form method="post">
        <label for="tipus">Tipos de habitación</label>
        <select name="tipus" id="tipus">
            <option value="Individual">Individual</option>
            <option value="Doble">Doble</option>
            <option value="Suite">Suite</option>
            <option value="Presidencial">Presidencial</option>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <?php
    $hotel->mostrarDisponibilitat();
    ?>
</body>

</html>