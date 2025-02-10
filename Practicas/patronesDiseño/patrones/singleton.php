<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Singleton</h1>
    <a href="creacion.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Singleton?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El Singleton garantiza que una clase tenga una única instancia y proporciona un punto de acceso global a ella. Es ideal para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Gestionar conexiones a bases de datos</li>
        <li>Controlar acceso a recursos compartidos</li>
        <li>Limitar instanciación costosa</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3ASingletonUML.png&psig=AOvVaw0eGg7s_rQwurFAa_D1Fm6I&ust=1739308622368000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCLDtmteDuosDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Singleton_UML_class_diagram.svg" 
                 alt="Diagrama Singleton" 
                 class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Instancia única accesible globalmente | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">class</span> <span class="text-yellow-400">DatabaseConnection</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private static</span> <span class="text-purple-400">$instance</span> = <span class="text-blue-400">null</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">private function</span> <span class="text-green-400">__construct</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-gray-400">// Constructor privado</span><br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public static function</span> <span class="text-green-400">getInstance</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">if</span> (<span class="text-blue-400">self::</span><span class="text-purple-400">$instance</span> === <span class="text-blue-400">null</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">self::</span><span class="text-purple-400">$instance</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">self</span>();<br>
        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-blue-400">self::</span><span class="text-purple-400">$instance</span>;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-gray-400">// Uso:</span><br>
        <span class="text-purple-400">$db1</span> = <span class="text-yellow-400">DatabaseConnection</span>::<span class="text-green-400">getInstance</span>();<br>
        <span class="text-purple-400">$db2</span> = <span class="text-yellow-400">DatabaseConnection</span>::<span class="text-green-400">getInstance</span>();<br>
        <span class="text-gray-400">// $db1 === $db2 → true</span>
    </div>
</div>

<div class="flex justify-between gap-4 mt-12">
    <a href="creacion.php" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Patrones de Creación
    </a>
    
    <a href="?patron=factory"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Factory →
    </a>
</div>
</section>
</body>
</html>