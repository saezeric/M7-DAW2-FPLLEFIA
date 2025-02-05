<?php

class Libro
{
    public string $titol = "Titulo Ejemplo";
    public string $autor = "Autor Ejemplo";

    public function __construct(string $titol, string $autor)
    {
        $this->titol = $titol;
        $this->autor = $autor;
    }
    public function getTitol(): string
    {
        return $this->titol;
    }
    public function descripcion()
    {
        return "Esta es una descripcion del libro de ejemplo " . $this->titol;
    }
}

$libro = new Libro("Libro de ejemplo", "Autor de ejemplo");
echo $libro->descripcion(); // Accessible 

class Persona
{
    public string $nombre = "Anna";
    public int $edad = 25;
    public function __construct(string $nombre, int $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public function Saludar()
    {
        return "Hola, sóc " . $this->nombre . " i tinc " . $this->edad . " anys.";
    }
}

// if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
//     $nombre = $_POST["nombre"];
//     $edad = $_POST["edad"];

//     $persona1 = new Persona($nombre, $edad);
//     echo "<br>" . $persona1->Saludar();
// }

// echo $persona->edat; 
// Error: edat és privat 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pooAct1 - Saez Eric</title>
</head>

<body>
    <form method="POST">
        <br>
        <label>Nombre</label>
        <input type="text" name="nombre" size="40">
        <br>
        <label>Edad</label>
        <input type="number" name="edad">
        <br>
        <input type="submit" value="Enviar">
    </form>


    <?php

    class Producto
    {
        public string $producto;
        public int $precio;
        public function __construct($producto, $precio)
        {
            $this->producto = $producto;
            $this->precio = $precio;
        }
        public function mostrarPrecio()
        {
            return "El precio es " . $this->precio;
        }
    }

    class Calculadora
    {
        public function sumar($a, $b)
        {
            return $a + $b;
        }
        public function restar($a, $b)
        {
            return $a - $b;
        }
        public function multiplicar($a, $b)
        {
            return $a * $b;
        }
        public function dividir($a, $b)
        {
            if ($b == 0) {
                return "No se puede dividir entre 0";
            }
            return $a / $b;
        }
    }

    $producto1 = new Producto("Mesa", 200);
    $producto2 = new Producto("Silla", 100);
    $producto3 = new Producto("Sofa", 550);

    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $producto1->producto ?></td>
                <td><?= $producto1->precio ?></td>
            </tr>
            <tr>
                <td><?= $producto2->producto ?></td>
                <td><?= $producto2->precio ?></td>
            </tr>
            <tr>
                <td><?= $producto3->producto ?></td>
                <td><?= $producto3->precio ?></td>
            </tr>
        </tbody>
    </table>

    <h1>Formulario para Crear un Animal</h1>
    <form method="post">
        <label for="nombre">Nombre del animal:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="tipo">Tipo del animal:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <button type="submit">Crear Animal</button>
    </form>

    <?php

    class Animal
    {
        public string $nombre;
        public string $tipo;
        public function __construct(string $nombre, string $tipo)
        {
            $this->nombre = $nombre;
            $this->tipo = $tipo;
        }
        public function describir()
        {
            return "Tu animal es " . $this->nombre . ", y el tipo de animal es " . $this->tipo;
        }
    }

    // Procesamiento del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];

        // Crear una instancia de la clase Animal
        $animal = new Animal($nombre, $tipo);

        // Mostrar la descripción del animal
        echo "<h2>Descripción del Animal</h2>";
        echo "<p>" . $animal->describir() . "</p>";
    }

    ?>

</body>

</html>