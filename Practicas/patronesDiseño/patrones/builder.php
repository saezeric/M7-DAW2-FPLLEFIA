<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Builder</h1>
    <a href="../creacion.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
        ← Volver
    </a>
</div>

<!-- Descripción del patrón -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">¿Qué es el patrón Builder?</h2>
    <p class="text-lg text-gray-700 text-justify mb-6">
        El Builder separa la construcción de un objeto complejo de su representación, permitiendo que el mismo proceso de construcción cree diferentes representaciones. Es útil para:
    </p>
    <ul class="list-disc pl-8 space-y-3 text-gray-600">
        <li>Crear objetos con múltiples atributos opcionales</li>
        <li>Simplificar la creación de objetos complejos</li>
        <li>Permitir variaciones en la representación final</li>
    </ul>
</div>

<!-- Diagrama conceptual -->
<div class="bg-blue-50 rounded-xl p-6 mb-12 shadow-md">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Diagrama Conceptual</h2>
    <div class="text-center">
        <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AW3sDesign_Builder_Design_Pattern_UML.jpg&psig=AOvVaw1FB0nBq7-VKm4sFFYjyVri&ust=1739309172910000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCNi4n92FuosDFQAAAAAdAAAAABAE" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Builder_UML_class_diagram.svg" 
                 alt="Diagrama Builder" 
                 class="mx-auto rounded-lg shadow-sm max-w-full h-auto">
        </a>
        <p class="text-sm text-gray-600 mt-2">Separación entre director y builder | <a target="_blank" href="https://commons.wikimedia.org/wiki/Main_Page">@Wikimedia Commons</a></p>
    </div>
</div>

<!-- Ejemplo de código -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Implementación en PHP</h2>
    <div class="bg-gray-800 rounded-lg p-6 text-gray-100 font-mono text-sm">
        <span class="text-blue-400">class</span> <span class="text-yellow-400">Pizza</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$masa</span>;<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$salsa</span>;<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$relleno</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">setMasa</span>(<span class="text-purple-400">$masa</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->masa = <span class="text-purple-400">$masa</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">setSalsa</span>(<span class="text-purple-400">$salsa</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->salsa = <span class="text-purple-400">$salsa</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">setRelleno</span>(<span class="text-purple-400">$relleno</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->relleno = <span class="text-purple-400">$relleno</span>;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">interface</span> <span class="text-yellow-400">PizzaBuilder</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildMasa</span>();<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildSalsa</span>();<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildRelleno</span>();<br>
        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">getPizza</span>(): <span class="text-yellow-400">Pizza</span>;<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">HawaianaBuilder</span> <span class="text-blue-400">implements</span> <span class="text-yellow-400">PizzaBuilder</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$pizza</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">__construct</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizza = <span class="text-blue-400">new</span> <span class="text-yellow-400">Pizza</span>();<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildMasa</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizza-><span class="text-green-400">setMasa</span>(<span class="text-yellow-400">'fina'</span>);<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildSalsa</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizza-><span class="text-green-400">setSalsa</span>(<span class="text-yellow-400">'tomate'</span>);<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">buildRelleno</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizza-><span class="text-green-400">setRelleno</span>(<span class="text-yellow-400">'jamón y piña'</span>);<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">getPizza</span>(): <span class="text-yellow-400">Pizza</span> {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-purple-400">$this</span>->pizza;<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-blue-400">class</span> <span class="text-yellow-400">Cocinero</span> {<br>
        &nbsp;&nbsp;<span class="text-blue-400">private</span> <span class="text-purple-400">$pizzaBuilder</span>;<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">setPizzaBuilder</span>(<span class="text-yellow-400">PizzaBuilder</span> <span class="text-purple-400">$builder</span>) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizzaBuilder = <span class="text-purple-400">$builder</span>;<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">getPizza</span>(): <span class="text-yellow-400">Pizza</span> {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">return</span> <span class="text-purple-400">$this</span>->pizzaBuilder-><span class="text-green-400">getPizza</span>();<br>
        &nbsp;&nbsp;}<br><br>

        &nbsp;&nbsp;<span class="text-blue-400">public function</span> <span class="text-green-400">construirPizza</span>() {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizzaBuilder-><span class="text-green-400">buildMasa</span>();<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizzaBuilder-><span class="text-green-400">buildSalsa</span>();<br>
        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$this</span>->pizzaBuilder-><span class="text-green-400">buildRelleno</span>();<br>
        &nbsp;&nbsp;}<br>
        }<br><br>

        <span class="text-gray-400">// Uso:</span><br>
        <span class="text-purple-400">$cocinero</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">Cocinero</span>();<br>
        <span class="text-purple-400">$hawaianaBuilder</span> = <span class="text-blue-400">new</span> <span class="text-yellow-400">HawaianaBuilder</span>();<br>
        <span class="text-purple-400">$cocinero</span>-><span class="text-green-400">setPizzaBuilder</span>(<span class="text-purple-400">$hawaianaBuilder</span>);<br>
        <span class="text-purple-400">$cocinero</span>-><span class="text-green-400">construirPizza</span>();<br>
        <span class="text-purple-400">$pizza</span> = <span class="text-purple-400">$cocinero</span>-><span class="text-green-400">getPizza</span>();<br>
    </div>
</div>

<div class="flex justify-between gap-4 mt-12">
    <a href="?patron=factory" 
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        ← Factory
    </a>
    
    <a href="../comportamiento.php"
       class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
        Patrones de Comportamiento →
    </a>
</div>
</section>
</body>
</html>