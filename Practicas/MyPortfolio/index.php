<?php
include './components/header.php';
?>

<!-- Main Content -->
<div class="main-content">
  <!-- Banner -->
  <section class="banner">
    <div class="container">
      <div class="banner-text">
        <h1>¡Hola, soy Eric Saez Escalona!</h1>
        <p class="lead">
          Diseñador web y desarrollador con pasión por crear experiencias
          digitales únicas.
        </p>
        <a href="quien-soy.php" class="btn btn-primary">Conóceme más</a>
      </div>
      <img
        src="https://img.freepik.com/foto-gratis/apuesto-hombre-apuntando-lateral_1368-5182.jpg?t=st=1742176104~exp=1742179704~hmac=3bb3f8b3ef80be9a821d21ea05f770616729e269fb019462cfc883c052f60f51&w=740"
        alt="Tu Nombre" />
    </div>
  </section>

  <!-- Resumen Personal -->
  <section class="resumen-personal">
    <div class="container">
      <h2>¿Quién soy?</h2>
      <p>
        Soy un apasionado del desarrollo web y la tecnología, con
        experiencia en la creación de soluciones digitales innovadoras. Mi
        enfoque se centra en ofrecer experiencias de usuario excepcionales y
        en construir proyectos que marquen la diferencia.
      </p>
    </div>
  </section>

  <!-- Sección de Información Relevante -->
  <section class="curriculum">
    <div class="container">
      <h2>Información Relevante</h2>
      <div class="informacion-relevante-container">
        <!-- Card 1 -->
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalExperiencia1">
          <div class="card-body">
            <h5 class="card-title">Desarrollador Web en Empresa X</h5>
            <p class="card-text">2020 a 2023</p>
            <p class="card-text">
              Desarrollo y mantenimiento de aplicaciones web y móviles.
            </p>
          </div>
        </div>
        <!-- Card 2 -->
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalEducacion1">
          <div class="card-body">
            <h5 class="card-title">
              Grado Superior en Desarrollo de Aplicaciones Web
            </h5>
            <p class="card-text">2018 a 2020</p>
            <p class="card-text">
              Formación especializada en desarrollo frontend y backend.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modales para Información Relevante -->
  <!-- Modal 1: Experiencia -->
  <div class="modal fade" id="modalExperiencia1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Desarrollador Web en Empresa X
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>
            Información detallada sobre la experiencia como Desarrollador
            Web en Empresa X.
          </p>
          <ul>
            <li>Desarrollo de aplicaciones web y móviles.</li>
            <li>Colaboración en proyectos de equipo.</li>
            <li>Optimización de rendimiento y seguridad.</li>
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

  <!-- Modal 2: Educación -->
  <div class="modal fade" id="modalEducacion1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Grado Superior en Desarrollo de Aplicaciones Web
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
            <li>Desarrollo Frontend y Backend.</li>
            <li>Gestión de Bases de Datos.</li>
            <li>Desarrollo de Aplicaciones Móviles.</li>
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

  <!-- Sección de proyectos destacados -->
  <section class="section">
    <div class="container">
      <h2 class="text-center mb-4">Proyectos Destacados</h2>
      <div class="card-container">
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Proyecto 1" />
          <div class="card-body">
            <h5 class="card-title">Proyecto 1</h5>
            <p class="card-text">Descripción breve del proyecto.</p>
            <a href="proyecto.php" class="btn btn-primary">Ver detalles</a>
          </div>
        </div>
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Proyecto 2" />
          <div class="card-body">
            <h5 class="card-title">Proyecto 2</h5>
            <p class="card-text">Descripción breve del proyecto.</p>
            <a href="proyecto.php" class="btn btn-primary">Ver detalles</a>
          </div>
        </div>
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Proyecto 3" />
          <div class="card-body">
            <h5 class="card-title">Proyecto 3</h5>
            <p class="card-text">Descripción breve del proyecto.</p>
            <a href="proyecto.php" class="btn btn-primary">Ver detalles</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de titulaciones oficiales -->
  <section class="section skills-section">
    <div class="container">
      <h2 class="text-center mb-4">Titulaciones Oficiales</h2>
      <div class="titulaciones-container">
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalTitulo1">
          <div class="card-body">
            <h5 class="card-title">
              Grado Superior en Desarrollo y Aplicaciones Web
            </h5>
            <p class="card-text">Haz clic para ver más detalles.</p>
          </div>
        </div>
        <div
          class="card"
          data-bs-toggle="modal"
          data-bs-target="#modalTitulo2">
          <div class="card-body">
            <h5 class="card-title">Curso de Inteligencia Artificial</h5>
            <p class="card-text">Haz clic para ver más detalles.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modales para titulaciones -->
  <!-- Modal 1 -->
  <div class="modal fade" id="modalTitulo1" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #000">
            Grado Superior en Desarrollo y Aplicaciones Web
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="color: #000">
          <p>
            Información detallada sobre el Grado Superior en Desarrollo y
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

  <!-- Modal 2 -->
  <div class="modal fade" id="modalTitulo2" tabindex="-1">
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

  <!-- Sección de últimas entradas del blog -->
  <section class="blog">
    <div class="container">
      <h2 class="text-center mb-4">Últimas Entradas del Blog</h2>
      <div class="card-container">
        <!-- Card 1 -->
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Blog 1" />
          <div class="card-body">
            <h5 class="card-title">Entrada 1</h5>
            <p class="card-text">
              Descripción breve de la entrada del blog.
            </p>
            <a href="noticia.php" class="btn btn-primary">Leer más</a>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Blog 2" />
          <div class="card-body">
            <h5 class="card-title">Entrada 2</h5>
            <p class="card-text">
              Descripción breve de la entrada del blog.
            </p>
            <a href="noticia.php" class="btn btn-primary">Leer más</a>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="card">
          <img
            src="https://via.placeholder.com/300x200"
            class="card-img-top"
            alt="Blog 3" />
          <div class="card-body">
            <h5 class="card-title">Entrada 3</h5>
            <p class="card-text">
              Descripción breve de la entrada del blog.
            </p>
            <a href="noticia.php" class="btn btn-primary">Leer más</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include './components/footer.php';
  ?>