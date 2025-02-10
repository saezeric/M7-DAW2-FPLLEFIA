<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Diseño</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-7xl min-h-[800px] flex flex-col justify-center">
        <h1 class="text-3xl font-bold text-center mb-8">¿Qué es un patrón de diseño?</h1>
        <p class="text-lg text-gray-700 text-justify mb-12">
            Los patrones de diseño son soluciones probadas y reutilizables para problemas comunes en el desarrollo de software. 
            Estos patrones no son código específico, sino guías que ayudan a estructurar el diseño de sistemas de manera eficiente, 
            mejorando la mantenibilidad, escalabilidad y claridad del código. Se dividen en tres categorías principales: 
            <strong>Estructurales</strong>, que organizan clases y objetos; <strong>Creacionales</strong>, que gestionan la creación de objetos; 
            y <strong>Comportamiento</strong>, que definen la interacción entre objetos.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card para Patrones Estructurales -->
            <div class="bg-gray-50 rounded-lg shadow-2xl hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow">
                    <h2 class="text-xl font-semibold mb-4">Patrones Estructurales</h2>
                    <p class="text-gray-600 text-justify">
                        Los patrones estructurales se centran en cómo se componen los objetos y clases para formar estructuras más grandes y flexibles. 
                        Ejemplos comunes incluyen el patrón <strong>Adapter</strong>, que permite la colaboración entre interfaces incompatibles, 
                        y el patrón <strong>Composite</strong>, que trata objetos individuales y compuestos de manera uniforme.
                    </p>
                </div>
                <div class="p-4 bg-gray-100 rounded-b-lg">
                    <a href="estructurales.php" class="block text-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">
                        Ver más
                    </a>
                </div>
            </div>

            <!-- Card para Patrones de Creación -->
            <div class="bg-gray-50 rounded-lg shadow-2xl hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow">
                    <h2 class="text-xl font-semibold mb-4">Patrones de Creación</h2>
                    <p class="text-gray-600 text-justify">
                        Los patrones de creación proporcionan mecanismos para crear objetos de manera controlada, 
                        evitando acoplamientos innecesarios. Ejemplos destacados son el patrón <strong>Singleton</strong>, 
                        que garantiza una única instancia de una clase, y el patrón <strong>Factory</strong>, 
                        que delega la creación de objetos a subclases.
                    </p>
                </div>
                <div class="p-4 bg-gray-100 rounded-b-lg">
                    <a href="creacion.php" class="block text-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">
                        Ver más
                    </a>
                </div>
            </div>

            <!-- Card para Patrones de Comportamiento -->
            <div class="bg-gray-50 rounded-lg shadow-2xl hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow">
                    <h2 class="text-xl font-semibold mb-4">Patrones de Comportamiento</h2>
                    <p class="text-gray-600 text-justify">
                        Los patrones de comportamiento definen cómo los objetos interactúan y se reparten responsabilidades. 
                        Ejemplos clave son el patrón <strong>Observer</strong>, que notifica cambios a múltiples objetos, 
                        y el patrón <strong>Strategy</strong>, que permite intercambiar algoritmos en tiempo de ejecución.
                    </p>
                </div>
                <div class="p-4 bg-gray-100 rounded-b-lg">
                    <a href="comportamiento.php" class="block text-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">
                        Ver más
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>