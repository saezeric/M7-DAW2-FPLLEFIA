    <!-- Título y navegación -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Composite</h1>
        <a href="estructurales.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
            ← Volver
        </a>
    </div>

    <!-- Descripción del patrón -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Composite?</h2>
        <p class="text-lg text-gray-700 text-justify mb-6">
            El patrón Composite permite tratar objetos individuales y compuestos de manera uniforme, 
            creando estructuras jerárquicas en forma de árbol. Es ideal para:
        </p>
        <ul class="list-disc pl-8 space-y-3 text-gray-600">
            <li>Representar jerarquías de objetos</li>
            <li>Simplificar operaciones sobre estructuras complejas</li>
            <li>Permitir recursividad en estructuras de datos</li>
        </ul>
    </div>

    <!-- Diagrama conceptual -->
    <div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
        <div class="text-center">
            <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AW3sDesign_Composite_Design_Pattern_Type_Safety_UML.jpg&psig=AOvVaw1zCs0e3sH-9TwbziPozjFb&ust=1739305990717000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCKj96vD5uYsDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/W3sDesign_Composite_Design_Pattern_Type_Safety_UML.jpg" alt="Diagrama Composite" class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
            </a>
            <p class="text-sm text-gray-600 mt-2">Estructura jerárquica de objetos individuales y compuestos | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
        </div>
    </div>

    <!-- Ejemplo de código -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
        <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
            <span class="text-blue-400">interface</span> <span class="text-yellow-400">Componente</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>();<br>
            }<br><br>

            <span class="text-blue-400">class</span> <span class="text-yellow-400">Hoja</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Componente</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-400">// Lógica de la hoja</span><br>
            &nbsp;&nbsp;}<br>
            }<br><br>

            <span class="text-blue-400">class</span> <span class="text-yellow-400">Compuesto</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Componente</span> {<br>
            &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$hijos</span> = [];<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">agregar</span>(<span class="text-yellow-400">Componente</span> <span class="text-purple-400">$componente</span>) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->hijos[] = <span class="text-purple-400">$componente</span>;<br>
            &nbsp;&nbsp;}<br><br>

            &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">operacion</span>() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">foreach</span> (<span class="text-purple-400">$this</span>->hijos <span class="text-blue-400">as</span> <span class="text-purple-400">$hijo</span>) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$hijo</span>-><span class="text-green-400">operacion</span>();<br>
            &nbsp;&nbsp;&nbsp;&nbsp;}<br>
            &nbsp;&nbsp;}<br>
            }
        </div>
    </div>

    <div class="flex justify-between gap-4 mt-12">
    <a href="?patron=adapter" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Adapter
    </a>
    
    <a href="?patron=decorator"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Decorator →
    </a>
</div>
</section>
</body>
</html>