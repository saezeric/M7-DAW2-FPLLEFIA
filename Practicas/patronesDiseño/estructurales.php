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
            case 'adapter':
                $ruta_patron = 'patrones/adapter.php';
                break;
            case 'composite':
                $ruta_patron = 'patrones/composite.php';
                break;
            case 'decorator':
                $ruta_patron = 'patrones/decorator.php';
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
        <h1 class="text-3xl font-bold text-center mb-8">Patrones Estructurales</h1>
        
        <!-- Sección Introductoria Mejorada -->
        <div class="mb-12">
            <p class="text-lg text-gray-700 text-justify mb-6">
                Los patrones estructurales son soluciones que permiten organizar objetos y clases en estructuras complejas 
                manteniendo flexibilidad y eficiencia. Actúan como "pegamento" entre componentes del sistema para:
            </p>
            <ul class="list-disc pl-8 space-y-3 text-gray-600 mb-6">
                <li>Simplificar relaciones entre entidades</li>
                <li>Reducir acoplamiento entre clases</li>
                <li>Permitir composiciones dinámicas de objetos</li>
                <li>Adaptar interfaces incompatibles</li>
            </ul>
        </div>

        <!-- Tarjeta de Características Principales -->
        <div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Características Clave</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg">
                    <h3 class="font-semibold mb-2">🎯 Objetivos</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Gestionar jerarquías complejas</li>
                        <li>Optimizar uso de recursos</li>
                        <li>Facilitar la reutilización</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded-lg">
                    <h3 class="font-semibold mb-2">🚀 Ventajas</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Mayor mantenibilidad</li>
                        <li>Estructuras más comprensibles</li>
                        <li>Extensible sin modificar código base</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Ejemplo Práctico -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Ejemplo de Aplicación</h2>
            <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
                <span class="text-blue-400">class</span> <span class="text-yellow-400">Adaptador</span> {<br>
                &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">request</span>() {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-400">// Convertir interfaz antigua a nueva</span><br>
                &nbsp;&nbsp;}<br>
                }
            </div>
        </div>

        <!-- Selector de Patrones -->
        <form action="" method="GET" class="flex flex-col items-center">
            <div class="bg-gray-50 rounded-lg shadow-2xl p-6 w-full max-w-lg">
                <select name="patron" class="w-full bg-white border border-gray-300 text-gray-700 text-lg rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Selecciona un patrón estructural</option>
                    <option value="adapter">Adapter - Conexión entre interfaces</option>
                    <option value="composite">Composite - Jerarquías recursivas</option>
                    <option value="decorator">Decorator - Funcionalidad dinámica</option>
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