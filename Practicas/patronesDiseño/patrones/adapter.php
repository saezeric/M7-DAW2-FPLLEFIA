    <!-- Título y navegación -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Adapter</h1>
        <a href="estructurales.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
            ← Volver
        </a>
    </div>

    <!-- Descripción del patrón -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Adapter?</h2>
        <p class="text-lg text-gray-700 text-justify mb-6">
            El patrón Adapter actúa como un puente entre dos interfaces incompatibles, permitiendo que trabajen juntas sin modificar su código fuente. Es ideal para:
        </p>
        <ul class="list-disc pl-8 space-y-3 text-gray-600">
            <li>Integrar sistemas legacy con nuevas implementaciones</li>
            <li>Reutilizar clases existentes con interfaces diferentes</li>
            <li>Reducir acoplamiento entre componentes</li>
        </ul>
    </div>

    <!-- Diagrama conceptual -->
    <div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
        <div class="text-center">
            <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AW3sDesign_Adapter_Design_Pattern_UML.jpg&psig=AOvVaw1FDMzbafFknpDCMxF2wDlT&ust=1739306314612000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCODznor7uYsDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/W3sDesign_Adapter_Design_Pattern_UML.jpg" alt="Diagrama Adapter" class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
            </a>
            <p class="text-sm text-gray-600 mt-2">Interfaces incompatibles conectadas a través de un adaptador | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
        </div>
    </div>

    <!-- Ejemplo de código -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
        <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
            <span class="text-blue-400">interface</span> <span class="text-yellow-400">NuevaInterfaz</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">request</span>();<br>
            }<br><br>

            <span class="text-blue-400">class</span> <span class="text-yellow-400">Adaptador</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">NuevaInterfaz</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$servicioLegacy</span>;<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>(<span class="text-yellow-400">ServicioLegacy</span> <span class="text-purple-400">$servicio</span>) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->servicioLegacy = <span class="text-purple-400">$servicio</span>;<br>
            &nbsp;&nbsp;}<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">request</span>() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->servicioLegacy-><span class="text-green-400">metodoEspecifico</span>();<br>
            &nbsp;&nbsp;}<br>
            }
        </div>
    </div>

    <!-- Botones de navegación -->
    <div class="flex justify-between gap-4 mt-12">
        <a href="estructurales.php" 
        class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
            ← Patrones Estructurales
        </a>
        
        <a href="?patron=composite"
        class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
            Composite →
        </a>
    </div>
    </section>
</body>
</html>