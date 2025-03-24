<?php
include './components/header.php';
?>

<!-- Main Content -->
<div class="main-content">
  <!-- Sección de Introducción Personal -->
  <section class="section">
    <div class="container">
      <h1>Sobre mi</h1>
      <p>
        Soy Eric Saez Escalona, un apasionado del desarrollo web y la tecnología.
        Actualmente estoy cursando el segundo año de Desarrollo de
        Aplicaciones Web (DAW) y me especializo en crear soluciones
        digitales innovadoras y eficientes. Mi interés por la inteligencia
        artificial y su aplicación en el desarrollo web me ha llevado a
        explorar nuevas formas de integrar tecnologías avanzadas en
        proyectos reales.
      </p>
    </div>
  </section>

  <!-- Sección de Formación -->
  <section class="section">
    <div class="container">
      <h2>Formación Profesional</h2>
      <div class="card-container">
        <!-- Card 1 -->
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalFormacion1">
          <div class="card-body">
            <h5 class="card-title">Grado Superior en DAW</h5>
            <p class="card-text">
              Actualmente cursando el segundo año de Desarrollo de
              Aplicaciones Web.
            </p>
          </div>
        </div>
        <!-- Card 2 -->
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalFormacion2">
          <div class="card-body">
            <h5 class="card-title">Curso de Inteligencia Artificial</h5>
            <p class="card-text">
              Exploré conceptos como machine learning y procesamiento de
              datos.
            </p>
          </div>
        </div>
        <!-- Card 3 -->
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalFormacion3">
          <div class="card-body">
            <h5 class="card-title">Habilidades Técnicas</h5>
            <p class="card-text">
              HTML, CSS, JavaScript, PHP, Python, React, Angular, Laravel,
              MySQL, MongoDB, Git, GitHub.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modales para Formación -->
  <!-- Modal 1: Grado Superior en DAW -->
  <div class="modal fade" id="modalFormacion1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Grado Superior en DAW
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>
            Información detallada sobre el Grado Superior en Desarrollo de
            Aplicaciones Web.
          </p>
          <ul>
            <li>Desarrollo Frontend y Backend</li>
            <li>Gestión de Bases de Datos</li>
            <li>Desarrollo de Aplicaciones Móviles</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-primary"
            data-bs-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2: Curso de Inteligencia Artificial -->
  <div class="modal fade" id="modalFormacion2" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Curso de Inteligencia Artificial
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>
            Información detallada sobre el Curso de Inteligencia Artificial.
          </p>
          <ul>
            <li>Introducción a la IA</li>
            <li>Redes Neuronales</li>
            <li>Aprendizaje Automático</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-primary"
            data-bs-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3: Habilidades Técnicas -->
  <div class="modal fade" id="modalFormacion3" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Habilidades Técnicas
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>
            Información detallada sobre las habilidades técnicas adquiridas.
          </p>
          <ul>
            <li>HTML, CSS, JavaScript, PHP, Python</li>
            <li>React, Angular, Laravel</li>
            <li>MySQL, MongoDB</li>
            <li>Git, GitHub</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-primary"
            data-bs-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Sección de Intereses y Enfoque Personal -->
  <section class="section">
    <div class="container">
      <h2>Intereses y Enfoque Personal</h2>
      <div class="intereses-card-container">
        <!-- Card 1 -->
        <div class="intereses-card">
          <div class="card-body">
            <h5 class="card-title">Desarrollo Full-Stack</h5>
            <p class="card-text">
              Combinando frontend y backend para crear soluciones completas.
            </p>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="intereses-card">
          <div class="card-body">
            <h5 class="card-title">Inteligencia Artificial</h5>
            <p class="card-text">
              Explorando cómo la IA puede mejorar la experiencia del
              usuario.
            </p>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="intereses-card">
          <div class="card-body">
            <h5 class="card-title">Diseño UX/UI</h5>
            <p class="card-text">
              Creación de interfaces intuitivas y atractivas.
            </p>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="intereses-card">
          <div class="card-body">
            <h5 class="card-title">Optimización SEO</h5>
            <p class="card-text">
              Mejora del posicionamiento en buscadores.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de Soft Skills -->
  <section class="soft-skills-section">
    <div class="container">
      <h2>Soft Skills</h2>
      <div class="soft-skills-list">
        <div class="soft-skills-item">
          <h5>Trabajo en Equipo</h5>
          <p>Colaboración efectiva para el éxito de los proyectos.</p>
        </div>
        <div class="soft-skills-item">
          <h5>Aprendizaje Rápido</h5>
          <p>Siempre dispuesto a aprender y adaptarme a nuevos desafíos.</p>
        </div>
        <div class="soft-skills-item">
          <h5>Resolución de Problemas</h5>
          <p>Enfoque creativo para resolver problemas complejos.</p>
        </div>
        <div class="soft-skills-item">
          <h5>Comunicación Efectiva</h5>
          <p>Claridad y precisión en la comunicación.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de Objetivos a Futuro -->
  <section class="objetivos-section">
    <div class="container">
      <h2>Objetivos a Futuro</h2>
      <div class="objetivos-list">
        <div class="objetivos-item">
          <h5>Corto Plazo</h5>
          <p>
            Ampliar mis conocimientos en desarrollo web e inteligencia
            artificial.
          </p>
        </div>
        <div class="objetivos-item">
          <h5>Largo Plazo</h5>
          <p>
            Liderar equipos de desarrollo y crear soluciones impactantes.
          </p>
        </div>
      </div>
    </div>
  </section>

  <?php
  include './components/footer.php';
  ?>