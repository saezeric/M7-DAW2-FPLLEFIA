<nav class="bg-gray-400 text-white py-3 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Botón Inicio -->
        <a href="index.php" class="text-lg font-semibold hover:text-blue-200">🏠 Inicio</a>
        
        <!-- Dropdowns por categoría -->
        <div class="flex space-x-4">
            <!-- Dropdown Estructurales -->
            <div class="relative group">
                <a href="estructurales.php" class="text-lg font-semibold hover:text-blue-200 flex items-center gap-1">
                    🏗️ Estructurales
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white text-gray-700 rounded-lg shadow-xl py-2">
                    <a href="?patron=adapter" class="block px-4 py-2 hover:bg-gray-200">Adapter</a>
                    <a href="?patron=composite" class="block px-4 py-2 hover:bg-gray-200">Composite</a>
                    <a href="?patron=decorator" class="block px-4 py-2 hover:bg-gray-200">Decorator</a>
                </div>
            </div>

            <!-- Dropdown Creación -->
            <div class="relative group">
                <a href="creacion.php" class="text-lg font-semibold hover:text-blue-200 flex items-center gap-1">
                    🛠️ Creación
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white text-gray-700 rounded-lg shadow-xl py-2">
                    <a href="?patron=singleton" class="block px-4 py-2 hover:bg-gray-200">Singleton</a>
                    <a href="?patron=factory" class="block px-4 py-2 hover:bg-gray-200">Factory</a>
                    <a href="?patron=builder" class="block px-4 py-2 hover:bg-gray-200">Builder</a>
                </div>
            </div>

            <!-- Dropdown Comportamiento -->
            <div class="relative group">
                <a href="comportamiento.php" class="text-lg font-semibold hover:text-blue-200 flex items-center gap-1">
                    🧠 Comportamiento
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white text-gray-700 rounded-lg shadow-xl py-2">
                    <a href="?patron=observer" class="block px-4 py-2 hover:bg-gray-200">Observer</a>
                    <a href="?patron=strategy" class="block px-4 py-2 hover:bg-gray-200">Strategy</a>
                    <a href="?patron=command" class="block px-4 py-2 hover:bg-gray-200">Command</a>
                </div>
            </div>
        </div>
    </div>
</nav>