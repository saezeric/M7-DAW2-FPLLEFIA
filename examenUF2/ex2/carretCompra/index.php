<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Productos</title>
</head>

<body>
    <section>
        <form id="formularioCarrito" method="POST" action="productosAñadidos.php">
            <h2>Formulario para carrito de compra</h2>
            <label for="producte">Añade un producto</label>
            <input id="producte" name="producte" type="text">
            <br>
            <br>
            <label for="peru">Añade un precio</label>
            <input id="preu" name="preu" type="numeric">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </section>
</body>

</html>