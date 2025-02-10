<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Strategy</h1>
    <a href="../comportamiento.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Strategy?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El patrón Strategy permite definir una familia de algoritmos, encapsular cada uno de ellos y hacerlos intercambiables. 
        Esto permite que el algoritmo varíe independientemente de los clientes que lo usan. Es útil para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Intercambiar algoritmos en tiempo de ejecución</li>
        <li>Evitar condicionales complejos</li>
        <li>Facilitar la extensión de funcionalidades</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AStrategyPatternClassDiagram.svg&psig=AOvVaw2ZtL5U6fQCxdBeDoEdkTLA&ust=1739309699864000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCOD_u9iHuosDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/StrategyPatternClassDiagram.svg" 
                 alt="Diagrama Strategy" 
                 class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Intercambio de estrategias | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">interface</span> <span class="text-yellow-400">Estrategia</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">ejecutar</span>(<span class="text-purple-400">$a</span>, <span class="text-purple-400">$b</span>);<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Suma</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Estrategia</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">ejecutar</span>(<span class="text-purple-400">$a</span>, <span class="text-purple-400">$b</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-purple-400">$a</span> + <span class="text-purple-400">$b</span>;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Resta</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Estrategia</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">ejecutar</span>(<span class="text-purple-400">$a</span>, <span class="text-purple-400">$b</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-purple-400">$a</span> - <span class="text-purple-400">$b</span>;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Contexto</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$estrategia</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>(<span class="text-yellow-400">Estrategia</span> <span class="text-purple-400">$estrategia</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->estrategia = <span class="text-purple-400">$estrategia</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">ejecutarEstrategia</span>(<span class="text-purple-400">$a</span>, <span class="text-purple-400">$b</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-purple-400">$this</span>->estrategia-><span class="text-green-400">ejecutar</span>(<span class="text-purple-400">$a</span>, <span class="text-purple-400">$b</span>);<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-gray-400">// Uso:</span><br>
        <span class="text-purple-400">$contexto</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Contexto</span>(<span class="text-blue-400">new</span> <span class="text-yellow-400">Suma</span>());<br>
        <span class="text-blue-400">echo</span> <span class="text-purple-400">$contexto</span>-><span class="text-green-400">ejecutarEstrategia</span>(<span class="text-purple-400">5</span>, <span class="text-purple-400">3</span>); <span class="text-gray-400">// 8</span><br>
        <span class="text-purple-400">$contexto</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Contexto</span>(<span class="text-blue-400">new</span> <span class="text-yellow-400">Resta</span>());<br>
        <span class="text-blue-400">echo</span> <span class="text-purple-400">$contexto</span>-><span class="text-green-400">ejecutarEstrategia</span>(<span class="text-purple-400">5</span>, <span class="text-purple-400">3</span>); <span class="text-gray-400">// 2</span><br>
    </div>
</div>

<!-- Botones de navegación -->
<div class="flex justify-between gap-4 mt-12">
    <!-- Botón Anterior -->
    <a href="?patron=observer" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Observer
    </a>
    
    <!-- Botón Siguiente -->
    <a href="?patron=command"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Command →
    </a>
</div>
</section>
</body>
</html>