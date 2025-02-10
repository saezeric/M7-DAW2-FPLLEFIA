    <!-- Título y navegación -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Decorator</h1>
        <a href="../estructurales.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
            ← Volver
        </a>
    </div>

    <!-- Descripción del patrón -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Decorator?</h2>
        <p class="text-lg text-gray-700 text-justify mb-6">
            El patrón Decorator permite añadir funcionalidades a objetos de manera dinámica, 
            proporcionando una alternativa flexible a la herencia. Es ideal para:
        </p>
        <ul class="list-disc pl-8 space-y-3 text-gray-600">
            <li>Extender funcionalidades sin modificar clases base</li>
            <li>Combinar comportamientos en tiempo de ejecución</li>
            <li>Evitar la explosión de subclases</li>
        </ul>
    </div>

    <!-- Diagrama conceptual -->
    <div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
        <div class="text-center">
            <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3ADecoratior_pattern_UML_Diagram.png&psig=AOvVaw0hJwRJJhrVu77KrCtHofrK&ust=1739306492317000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCLCVlN_7uYsDFQAAAAAdAAAAABAr" target="_blank" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Decoratior_pattern_UML_Diagram.png" alt="Diagrama Decorator" class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
            </a>
            <p class="text-sm text-gray-600 mt-2">Objeto base envuelto por decoradores | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
        </div>
    </div>

    <!-- Ejemplo de código -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
        <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
            <span class="text-blue-400">interface</span> <span class="text-yellow-400">Componente</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>();<br>
            }<br><br>

            <span class="text-blue-400">class</span> <span class="text-yellow-400">DecoradorBase</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Componente</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">protected</span> <span class="text-purple-400">$componente</span>;<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>(<span class="text-yellow-400">Componente</span> <span class="text-purple-400">$componente</span>) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->componente = <span class="text-purple-400">$componente</span>;<br>
            &nbsp;&nbsp;}<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->componente-><span class="text-green-400">operacion</span>();<br>
            &nbsp;&nbsp;}<br>
            }<br><br>

            <span class="text-blue-400">class</span> <span class="text-yellow-400">DecoradorConcreto</span> <span class="text-blue-400">extends</span> <span class="text-yellow-400">DecoradorBase</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">parent::</span><span class="text-green-400">operacion</span>();<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-400">// Nueva funcionalidad añadida</span><br>
            &nbsp;&nbsp;}<br>
            }
        </div>
    </div>

    <div class="flex justify-between gap-4 mt-12">
        <a href="?patron=composite" 
        class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
            ← Composite
        </a>
        
        <a href="../creacion.php"
        class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
            Patrones de Creacion →
        </a>
    </div>
    </section>
</body>
</html>