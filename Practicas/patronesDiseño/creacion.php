<?php 
include 'header.php';
include 'nav.php'; 


?>

<section class="bg-gray-100 flex items-center justify-center my-5 p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-7xl min-h-[800px] flex flex-col justify-center">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['patron'])) {
        $patron = htmlspecialchars($_GET['patron']);
        
        // Validación y sanitización del input
        $ruta_patron = '';
        
        switch ($patron) {
            case 'singleton':
                $ruta_patron = 'patrones/singleton.php';
                break;
            case 'factory':
                $ruta_patron = 'patrones/factory.php';
                break;
            case 'builder':
                $ruta_patron = 'patrones/builder.php';
                break;
            default:
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        Patrón no encontrado
                    </div>';
                break;
        }
        
        if (!empty($ruta_patron) && file_exists($ruta_patron)) {
            include $ruta_patron;
        }
    } else {
    ?>
        <h1 class="text-3xl font-bold text-center mb-8">Patrones de Creación</h1>
        
        <!-- Sección Introductoria Mejorada -->
        <div class="mb-12">
            <p class="text-lg text-gray-700 text-justify mb-6">
                Los patrones de creación se centran en mecanismos para crear objetos de manera controlada, 
                evitando acoplamientos innecesarios y promoviendo la reutilización del código. Estos patrones 
                son esenciales para:
            </p>
            <ul class="list-disc pl-8 space-y-3 text-gray-600 mb-6">
                <li>Gestionar la creación de objetos complejos</li>
                <li>Evitar dependencias rígidas entre clases</li>
                <li>Facilitar la configuración de objetos</li>
                <li>Optimizar el uso de recursos</li>
            </ul>
        </div>

        <!-- Tarjeta de Características Principales -->
        <div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Características Clave</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg">
                    <h3 class="font-semibold mb-2">🎯 Objetivos</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Desacoplar la lógica de creación</li>
                        <li>Centralizar la creación de objetos</li>
                        <li>Permitir configuraciones flexibles</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded-lg">
                    <h3 class="font-semibold mb-2">🚀 Ventajas</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Mayor flexibilidad en la creación de objetos</li>
                        <li>Reducción de código duplicado</li>
                        <li>Facilita pruebas unitarias</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Ejemplo Práctico -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Ejemplo de Aplicación</h2>
            <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
                <span class="text-blue-400">class</span> <span class="text-yellow-400">Factory</span> {<br>
                &nbsp;&nbsp;<span class="text-blue-400">public static function</span> <span class="text-green-400">create</span>(<span class="text-purple-400">$type</span>) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return new</span> <span class="text-yellow-400">$type</span>();<br>
                &nbsp;&nbsp;}<br>
                }
            </div>
        </div>

        <!-- Selector de Patrones -->
        <form action="" method="GET" class="flex flex-col items-center">
            <div class="bg-gray-50 rounded-lg shadow-2xl p-6 w-full max-w-lg">
                <select name="patron" class="w-full bg-white border border-gray-300 text-gray-700 text-lg rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Selecciona un patrón de creación</option>
                    <option value="singleton">Singleton - Instancia única</option>
                    <option value="factory">Factory - Creación centralizada</option>
                    <option value="builder">Builder - Construcción paso a paso</option>
                </select>
                <button type="submit" class="w-full mt-4 bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors duration-300 font-semibold">
                    Explorar Patrón
                </button>
            </div>
        </form>
        <?php } ?>
    </div>
    </section>
</body>
</html>