<?php

class Coche{
    public string $marca;
    public string $modelo;
    public function __construct(string $marca = "BMW", string $modelo = "IX"){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
    public function descripcion(){
        return "Marca: " . $this->marca . " | Modelo:" . $this->modelo;
    }
}

$coche = new Coche();
echo $coche->descripcion() . "<br>";

$coche1 = new Coche("Toyota", "Yaris");
echo $coche1->descripcion();

class Persona{
    public function __construct(string $nombre, int $edad){
        $this->nombre=$nombre;
        $this->edad=$edad;
    }
    public function bienvenida():string{
        return "<br>Hola ". $this->nombre .", tienes ". $this->edad . " años.<br>";
    }
}

$persona1 = new Persona("Eric", 20);
echo $persona1->bienvenida();
    $persona2 = new Persona("Luis", 21);
echo $persona2->bienvenida();

class Calculadora{
    public function sumar($a, $b){
        return $a + $b;
    }
}

$calculo1 = new Calculadora();
echo $calculo1->sumar(3,4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pooAct2 - Saez Eric</title>
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

// Procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['edad'];
    $persona = new Persona($nombre, $tipo);
    echo "<p>" . $persona->bienvenida() . "</p>";
}

class Animal{
    public string $nombre;
    public string $tipo;
    public function __construct(string $nombre, string $tipo){
        $this->nombre=$nombre;
        $this->tipo=$tipo;
    }
    public function saludar(){
        return "Hola, sóc un " . $this->nombre ." i em dic " . $this->tipo;
    }
}

$animal = new Animal("Luis","Lopez Puig");
echo $animal->saludar();

class Producto{
    public string $nombre;
    public int $precio;
    public function __construct(string $nombre, int $precio){
        $this->nombre=$nombre;
        $this->precio=$precio;
    }
}

$producto1 = new Producto("Mesa",200);
$producto2 = new Producto("Silla",100);
$producto3 = new Producto("Sofa",550);

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
            <td><?= $producto1->nombre ?></td>
            <td><?= $producto1->precio ?></td>
        </tr>
        <tr>
            <td><?= $producto2->nombre ?></td>
            <td><?= $producto2->precio ?></td>
        </tr>
        <tr>
            <td><?= $producto3->nombre ?></td>
            <td><?= $producto3->precio ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>