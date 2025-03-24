<?php
include './components/header.php';
?>

<!-- Main Content -->
<div class="main-content">
  <!-- Encabezado -->
  <section class="container mt-5">
    <h1 class="text-center mb-4">Eric Sáez</h1>
    <h2 class="text-center mb-4">Full Stack | Especialista en IA</h2>
  </section>

  <!-- Perfil Profesional -->
  <section class="container mt-5">
    <h2>Perfil Profesional</h2>
    <p>
      Soy un desarrollador Full Stack con especialización en Inteligencia
      Artificial. Actualmente curso un Máster en IA y un Grado Superior en
      Desarrollo de Aplicaciones Web. Me considero una persona segura,
      responsable y perseverante, con alta capacidad de aprendizaje y
      liderazgo. Tengo experiencia en el desarrollo de aplicaciones web,
      automatización con IA y creación de contenidos SEO. Busco
      oportunidades para seguir creciendo profesionalmente y contribuir en
      proyectos innovadores.
    </p>
  </section>

  <!-- Competencias Digitales -->
  <section class="container mt-5">
    <h2>Competencias Digitales</h2>
    <table class="table table-dark">
      <thead>
        <tr>
          <th>Competencia</th>
          <th>Nivel</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Alfabetización en información y datos</td>
          <td>Avanzado</td>
        </tr>
        <tr>
          <td>Comunicación y colaboración</td>
          <td>Avanzado</td>
        </tr>
        <tr>
          <td>Creación de contenidos digitales</td>
          <td>Avanzado</td>
        </tr>
        <tr>
          <td>Seguridad</td>
          <td>Avanzado</td>
        </tr>
        <tr>
          <td>Resolución de problemas</td>
          <td>Avanzado</td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- Experiencia Laboral -->
  <section class="container mt-5">
    <h2>Experiencia Laboral</h2>
    <div class="card-container">
      <div
        class="card"
        data-bs-toggle="modal"
        data-bs-target="#modalExperiencia1">
        <div class="card-body">
          <h5 class="card-title">Técnico en Mantenimiento de Maquinaria</h5>
          <p class="card-text">RC Sepúlveda, 2021</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal para Experiencia Laboral -->
  <div class="modal fade" id="modalExperiencia1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Técnico en Mantenimiento de Maquinaria
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>RC Sepúlveda, 2021</p>
          <ul>
            <li>Mantenimiento de hardware y sistemas informáticos.</li>
            <li>
              Atención al cliente y comercialización de material
              informático.
            </li>
            <li>Instalación de sistemas y asesoramiento técnico.</li>
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

  <!-- Formación Académica -->
  <section class="container mt-5">
    <h2>Formación Académica</h2>
    <div class="card-container" id="formacion-academica">
      <div
        class="card"
        data-bs-toggle="modal"
        data-bs-target="#modalFormacion1">
        <div class="card-body">
          <h5 class="card-title">Máster en Inteligencia Artificial</h5>
          <p class="card-text">BigSchool (cursando actualmente)</p>
        </div>
      </div>
      <div
        class="card"
        data-bs-toggle="modal"
        data-bs-target="#modalFormacion2">
        <div class="card-body">
          <h5 class="card-title">
            Técnico Superior en Desarrollo de Aplicaciones Web
          </h5>
          <p class="card-text">CFP Llefià (cursando actualmente)</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal para Formación Académica -->
  <div class="modal fade" id="modalFormacion1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Máster en Inteligencia Artificial
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>BigSchool (cursando actualmente)</p>
          <ul>
            <li>
              Especialización en IA generativa, automatización, SEO y
              codificación asistida.
            </li>
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

  <div class="modal fade" id="modalFormacion2" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Técnico Superior en Desarrollo de Aplicaciones Web
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>CFP Llefià (cursando actualmente)</p>
          <ul>
            <li>Lenguajes: Java, C#, Python, JavaScript, PHP, SQL.</li>
            <li>Frameworks: Django, Bootstrap 5.</li>
            <li>
              Entornos de desarrollo: Visual Studio, VS Code, NetBeans.
            </li>
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

  <!-- Habilidades Técnicas -->
  <section class="container mt-5">
    <h2>Habilidades Técnicas</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Lenguajes de Programación</h5>
          <p class="card-text">
            Java, C#, C++, Python, JavaScript, PHP, SQL.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Frameworks</h5>
          <p class="card-text">Django, Bootstrap 5.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Entornos de Desarrollo</h5>
          <p class="card-text">Visual Studio, VS Code, NetBeans.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Proyectos Destacados -->
  <section class="container mt-5">
    <h2>Proyectos Destacados</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Prototipo de tienda online con WordPress
          </h5>
          <p class="card-text">
            Desarrollo de una tienda online integrada con Amazon Affiliates.
          </p>
          <a href="proyecto.php" class="btn btn-primary">Ver Proyecto</a>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Automatización con IA</h5>
          <p class="card-text">
            Creación de asistentes virtuales automatizados.
          </p>
          <a href="proyecto.php" class="btn btn-primary">Ver Proyecto</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Competencias Personales -->
  <section class="container mt-5">
    <h2>Competencias Personales</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-comments fa-2x mb-3"></i>
          <h5 class="card-title">Alta capacidad de comunicación</h5>
          <p class="card-text">
            Habilidad para comunicar ideas de manera clara y efectiva.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-users fa-2x mb-3"></i>
          <h5 class="card-title">Trabajo en equipo</h5>
          <p class="card-text">
            Colaboración efectiva en entornos grupales.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-hand-holding-heart fa-2x mb-3"></i>
          <h5 class="card-title">Empatía y confianza</h5>
          <p class="card-text">
            Capacidad para entender y conectar con los demás.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-brain fa-2x mb-3"></i>
          <h5 class="card-title">Optimismo y perseverancia</h5>
          <p class="card-text">
            Enfoque positivo y determinación para superar desafíos.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Idiomas -->
  <section class="container mt-5">
    <h2>Idiomas</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-language fa-2x mb-3"></i>
          <h5 class="card-title">Castellano</h5>
          <p class="card-text">Nativo</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-language fa-2x mb-3"></i>
          <h5 class="card-title">Catalán</h5>
          <p class="card-text">Nativo</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-language fa-2x mb-3"></i>
          <h5 class="card-title">Inglés</h5>
          <p class="card-text">Alto</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Certificaciones y Cursos Adicionales -->
  <section class="container mt-5">
    <h2>Certificaciones y Cursos Adicionales</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-certificate fa-2x mb-3"></i>
          <h5 class="card-title">WordPress Básico y Elementor Pro</h5>
          <p class="card-text">
            Certificación en diseño y desarrollo con WordPress.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-certificate fa-2x mb-3"></i>
          <h5 class="card-title">
            Cursos de IA generativa y automatización
          </h5>
          <p class="card-text">
            Especialización en IA generativa y automatización de tareas.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Intereses y Hobbies -->
  <section class="container mt-5">
    <h2>Intereses y Hobbies</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-gamepad fa-2x mb-3"></i>
          <h5 class="card-title">Desarrollo de videojuegos con Unity</h5>
          <p class="card-text">
            Creación de videojuegos y experiencias interactivas.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-code fa-2x mb-3"></i>
          <h5 class="card-title">Participación en hackathones</h5>
          <p class="card-text">
            Competencias de programación y desarrollo de soluciones
            innovadoras.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <i class="fas text-white fa-camera fa-2x mb-3"></i>
          <h5 class="card-title">Fotografía digital</h5>
          <p class="card-text">Captura y edición de imágenes digitales.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Descarga del CV -->
  <section class="container mt-5 text-center">
    <a href="cv.pdf" class="btn btn-primary" download>Descargar CV</a>
  </section>

  <?php
  include './components/footer.php';
  ?>