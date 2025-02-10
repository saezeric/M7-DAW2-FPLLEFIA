<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Factory Method</h1>
    <a href="creacion.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el Factory Method?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El Factory Method delega la creación de objetos a subclases, permitiendo que una clase delegue la instanciación a clases hijas. Es útil para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Centralizar lógica de creación</li>
        <li>Extender tipos de objetos sin modificar código existente</li>
        <li>Reducir acoplamiento entre clases</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AW3sDesign_Abstract_Factory_Design_Pattern_UML.jpg&psig=AOvVaw19w7nI7LOwWGSqmdhgj-sT&ust=1739308733087000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKDNv4uEuosDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/W3sDesign_Abstract_Factory_Design_Pattern_UML.jpg" 
                 alt="Diagrama Factory Method" 
                 class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Jerarquía de creadores y productos | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">interface</span> <span class="text-yellow-400">Transporte</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">entregar</span>();<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Camion</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">Transporte</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">entregar</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-400">// Lógica de entrega por carretera</span><br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">abstract class</span> <span class="text-yellow-400">Logistica</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">abstract public function</span> <span class="text-green-400">crearTransporte</span>(): <span class="text-yellow-400">Transporte</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">planificarEntrega</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$transporte</span> = <span class="text-purple-400">$this</span>-><span class="text-green-400">crearTransporte</span>();<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$transporte</span>-><span class="text-green-400">entregar</span>();<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">LogisticaTerrestre</span> <span class="text-blue-400">extends</span> <span class="text-yellow-400">Logistica</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">crearTransporte</span>(): <span class="text-yellow-400">Transporte</span> {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return new</span> <span class="text-yellow-400">Camion</span>();<br>
        &nbsp;&nbsp;}<br>
        }
    </div>
</div>

<div class="flex justify-between gap-4 mt-12">
    <a href="?patron=singleton" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Singleton
    </a>
    
    <a href="?patron=builder"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Builder →
    </a>
</div>
</section>
</body>
</html>