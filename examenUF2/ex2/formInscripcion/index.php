<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción</title>
</head>

<body>

    <section>
        <form id="formularioUsuarios" method="POST" action="usuario.php">
            <label for="nom">Nombre: </label>
            <input id="nom" name="nom" type="text">
            <br>
            <br>
            <label for="edat">Edad: </label>
            <input id="edat" name="edat" type="number">
            <br>
            <br>
            <label for="correu">Correo Electronico: </label>
            <input id="correu" name="correu" type="text">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </section>

</body>

</html>