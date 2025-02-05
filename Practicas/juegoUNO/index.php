<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNO - Saez Escalona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <main>
        <video class="video-background" autoplay loop muted>
            <source src="./cartas_uno/video_fondo_uno.mp4" type="video/mp4">
            Tu navegador no soporta el formato de video.
        </video>
        <section class="bg-light position-absolute top-50 start-50 translate-middle w-50 p-5 rounded content">
            <div class="text-center mb-5">
                <h1>El juego del UNO</h1>
                <h2>Selecciona el numero de jugadores y cartas</h2>
            </div>

            <form method="POST" action="juegoUno.php">
                <div class="d-flex justify-content-center">
                    <select name="jugadores" id="jugadores" class="form-select mx-1" aria-label="Numero de jugadores">
                        <option selected>Numero de jugadores</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select name="cartas" id="cartas" class="form-select mx-1" aria-label="Numero de cartas">
                        <option selected>Numero de cartas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-5 mx-1">Jugar</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>