<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Command</h1>
    <a href="comportamiento.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Command?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El patrón Command encapsula una solicitud como un objeto, permitiendo parametrizar operaciones, hacer colas de peticiones, o implementar funciones de deshacer/rehacer. Es clave para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Desacoplar el emisor de una solicitud de su ejecutor</li>
        <li>Crear operaciones reversibles</li>
        <li>Implementar sistemas de historial de acciones</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3ACommand_Design_Pattern_Class_Diagram.svg&psig=AOvVaw1JuMpyaMdMPAorgeLeTjr1&ust=1739310325498000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIjc9YKKuosDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/Command_Design_Pattern_Class_Diagram.svg" alt="Diagrama Command" class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Estructura Command | <a target="_blank" href="https://commons.wikimedia.org">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">interface</span> <span class="text-yellow-400">Command</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">execute</span>();<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">LightOnCommand</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Command</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$light</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>(<span class="text-yellow-400">Light</span> <span class="text-purple-400">$light</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->light = <span class="text-purple-400">$light</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">execute</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->light-><span class="text-green-400">turnOn</span>();<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">RemoteControl</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$command</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">setCommand</span>(<span class="text-yellow-400">Command</span> <span class="text-purple-400">$command</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->command = <span class="text-purple-400">$command</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">pressButton</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->command-><span class="text-green-400">execute</span>();<br>
        &nbsp;&nbsp;}<br>
        }
    </div>
</div>

<!-- Botones de navegación -->
<div class="flex justify-between gap-4 mt-12">
    <!-- Botón Anterior -->
    <a href="?patron=strategy" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Strategy
    </a>
    
    <!-- Botón Siguiente -->
    <a href="index.php"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Volver al Inicio →
    </a>
</div>
</section>
</body>
</html>