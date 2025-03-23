<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Sobre Nosotros</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- Sección 1: Misión -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h2 class="mb-4 text-center">Nuestra Misión</h2>
        <p class="lead">
          En <strong>MyAI</strong>, nuestra misión es democratizar el acceso a la inteligencia artificial, ofreciendo cursos de alta calidad que empoderen a personas y empresas para aprovechar al máximo esta tecnología transformadora.
        </p>
        <p>
          Creemos que la IA no es solo para expertos, sino una herramienta que todos pueden dominar para mejorar su productividad, innovar en sus proyectos y alcanzar sus metas profesionales.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /Sección 1: Misión -->

<!-- Sección 2: Valores -->
<section class="section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="mb-5">Nuestros Valores</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card border-0 text-center p-4 shadow-sm">
          <i class="ti-light-bulb icon-lg text-primary mb-3"></i>
          <h4 class="mb-3">Innovación</h4>
          <p class="text-muted">
            Nos esforzamos por estar a la vanguardia de la tecnología, ofreciendo contenido actualizado y relevante.
          </p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 text-center p-4 shadow-sm">
          <i class="ti-heart icon-lg text-primary mb-3"></i>
          <h4 class="mb-3">Compromiso</h4>
          <p class="text-muted">
            Estamos comprometidos con el éxito de nuestros estudiantes, brindando soporte y recursos para su crecimiento.
          </p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 text-center p-4 shadow-sm">
          <i class="ti-world icon-lg text-primary mb-3"></i>
          <h4 class="mb-3">Accesibilidad</h4>
          <p class="text-muted">
            Queremos que la IA sea accesible para todos, independientemente de su nivel de experiencia o recursos.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Sección 2: Valores -->

<!-- call to action -->
<section class="section">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="https://images.pexels.com/photos/313690/pexels-photo-313690.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
    <div class="row">
      <div class="col-lg-8 offset-lg-1">
        <h2 class="text-gradient-primary">Comienza tu Curso Ahora!</h2>
        <p class="h4 font-weight-bold text-white mb-4">Investiga mas acerca de nuestros cursos de IA</p>
        <a href="cursos.php" class="btn btn-lg btn-primary">Ver más</a>
      </div>
    </div>
  </div>
</section>
<!-- /call to action -->

<!-- team -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Nuestros Profesores</h2>
        <p>Un equipo de trabajo preparado para sacar lo mejor de cada alumno</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row no-gutters">
      <?php
      // Consulta SQL para obtener los usuarios con rol "profesor"
      $professors_query = "SELECT id, name, surname, avatar FROM USERS WHERE rol = 'profesor'";
      $result = $mysqli->query($professors_query);

      if ($result && $result->num_rows > 0) {
        while ($professor = $result->fetch_assoc()) {
          echo '
              <div class="col-lg-3 col-sm-6">
                <div class="card hover-shadow">
                  <a href="profesor.php?id=' . $professor['id'] . '">
                    <img src="' . $professor['avatar'] . '" 
                         alt="' . $professor['name'] . ' ' . $professor['surname'] . '" 
                         class="card-img-top"
                         style="object-fit: cover; height: 400px">
                  </a>
                  <div class="card-body text-center position-relative zindex-1">
                    <h4><a class="text-dark" href="profesor.php?id=' . $professor['id'] . '">'
            . $professor['name'] . ' ' . $professor['surname'] . '</a></h4>
                  </div>
                </div>
              </div>';
        }
      } else {
        echo '<div class="col-12 text-center"><p>No hay profesores disponibles en este momento.</p></div>';
      }
      ?>
    </div>
  </div>
</section>
<!-- /team -->

<!-- call to action -->
<section class="section">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
    <div class="row">
      <div class="col-lg-8 offset-lg-1">
        <h2 class="text-gradient-primary">Estamos contigo</h2>
        <p class="h4 font-weight-bold text-white mb-4">Contacta con nosotros para obtener cualquier tipo de información</p>
        <a href="contact.php" class="btn btn-lg btn-primary">Contactar</a>
      </div>
    </div>
  </div>
</section>
<!-- /call to action -->

<?php
include("./components/footer.php");
?>