<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Observer</h1>
    <a href="comportamiento.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Observer?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El Observer define una dependencia uno-a-muchos entre objetos, de modo que cuando un objeto cambia de estado, 
        todos sus dependientes son notificados y actualizados automáticamente. Es útil para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Notificar cambios en tiempo real</li>
        <li>Desacoplar sujetos y observadores</li>
        <li>Implementar sistemas de eventos</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AEstructuraPatronObservador.png&psig=AOvVaw0tv6U77p6zZ1jtlMmN6sZn&ust=1739309628669000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCMikxbaHuosDFQAAAAAdAAAAABAf" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Observer.svg" 
                 alt="Diagrama Observer" 
                 class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Relación entre sujeto y observadores | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">interface</span> <span class="text-yellow-400">Observer</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">update</span>(<span class="text-purple-400">$mensaje</span>);<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Usuario</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Observer</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$nombre</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>(<span class="text-purple-400">$nombre</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->nombre = <span class="text-purple-400">$nombre</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">update</span>(<span class="text-purple-400">$mensaje</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-400">"$this->nombre recibió: $mensaje\n"</span>;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Sujeto</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$observers</span> = [];<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">attach</span>(<span class="text-yellow-400">Observer</span> <span class="text-purple-400">$observer</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->observers[] = <span class="text-purple-400">$observer</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">notify</span>(<span class="text-purple-400">$mensaje</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">foreach</span> (<span class="text-purple-400">$this</span>->observers <span class="text-blue-400">as</span> <span class="text-purple-400">$observer</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$observer</span>-><span class="text-green-400">update</span>(<span class="text-purple-400">$mensaje</span>);<br>
        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-gray-400">// Uso:</span><br>
        <span class="text-purple-400">$sujeto</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Sujeto</span>();<br>
        <span class="text-purple-400">$usuario1</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Usuario</span>(<span class="text-yellow-400">'Alice'</span>);<br>
        <span class="text-purple-400">$usuario2</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Usuario</span>(<span class="text-yellow-400">'Bob'</span>);<br>
        <span class="text-purple-400">$sujeto</span>-><span class="text-green-400">attach</span>(<span class="text-purple-400">$usuario1</span>);<br>
        <span class="text-purple-400">$sujeto</span>-><span class="text-green-400">attach</span>(<span class="text-purple-400">$usuario2</span>);<br>
        <span class="text-purple-400">$sujeto</span>-><span class="text-green-400">notify</span>(<span class="text-yellow-400">'Nueva actualización disponible'</span>);<br>
    </div>
</div>

<!-- Botones de navegación -->
<div class="flex justify-between gap-4 mt-12">
    <!-- Botón Anterior -->
    <a href="comportamiento.php" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Patrones de Comportamiento
    </a>
    
    <!-- Botón Siguiente -->
    <a href="?patron=strategy"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Strategy →
    </a>
</div>
</section>
</body>
</html>