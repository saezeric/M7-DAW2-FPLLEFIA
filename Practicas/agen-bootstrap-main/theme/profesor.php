<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/3184423/pexels-photo-3184423.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Nuestro Equipo</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<?php
// Verificar si se ha recibido la ID del profesor
if (isset($_GET['id'])) {
  $professor_id = intval($_GET['id']); // Sanitizar la entrada

  // Consulta SQL para obtener los datos del profesor
  $professor_query = "SELECT id, name, surname, email, avatar, age, date_register FROM USERS WHERE id = $professor_id AND rol = 'profesor'";
  $result = $mysqli->query($professor_query);

  if ($result && $result->num_rows > 0) {
    $professor = $result->fetch_assoc();
  } else {
    // Si no se encuentra el profesor, redirigir o mostrar un mensaje
    die("Profesor no encontrado.");
  }
} else {
  die("ID de profesor no proporcionada.");
}
?>

<!-- team single -->
<section>
  <div class="container">
    <div class="row mb-100">
      <!-- Columna izquierda: Información del profesor -->
      <div class="col-lg-4 col-md-6">
        <div class="bg-secondary p-4 text-center">
          <div class="img-thumb-circle mx-auto mb-3">
            <img src="<?= $professor['avatar'] ?>"
              alt="<?= $professor['name'] . ' ' . $professor['surname'] ?>"
              class="img-fluid"
              style="height: 200px; width: 200px; border-radius: 100px; object-fit: cover;">
          </div>
          <h2 class="text-white"><?= $professor['name'] . ' ' . $professor['surname'] ?></h2>
          <p class="text-gradient-primary h4">Profesor</p>
          <p>Experiencia en enseñanza desde <?= date("Y", strtotime($professor['date_register'])) ?>.</p>
          <a href="#" class="btn btn-primary">Descargar CV</a>
        </div>
      </div>

      <!-- Columna derecha: Habilidades -->
      <div class="col-lg-7 offset-lg-1 col-md-6">
        <div class="pt-5">
          <h2>Habilidades de Trabajo</h2>
          <p class="mb-5">Especialidad en diversas áreas de la inteligencia artificial y la enseñanza.</p>
          <div class="progress-block">
            <h6 class="text-uppercase">Inteligencia Artificial</h6>
            <div class="progress">
              <div class="progress-bar" data-percent="85">
                <span class="skill-number text-dark font-weight-bold"><span class="count">85</span>%</span>
              </div>
            </div>
          </div>
          <div class="progress-block">
            <h6 class="text-uppercase">Machine Learning</h6>
            <div class="progress">
              <div class="progress-bar" data-percent="95">
                <span class="skill-number text-dark font-weight-bold"><span class="count">95</span>%</span>
              </div>
            </div>
          </div>
          <div class="progress-block">
            <h6 class="text-uppercase">Python</h6>
            <div class="progress">
              <div class="progress-bar" data-percent="79">
                <span class="skill-number text-dark font-weight-bold"><span class="count">79</span>%</span>
              </div>
            </div>
          </div>
          <div class="progress-block">
            <h6 class="text-uppercase">Investigación</h6>
            <div class="progress">
              <div class="progress-bar" data-percent="90">
                <span class="skill-number text-dark font-weight-bold"><span class="count">90</span>%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Información de contacto y redes sociales -->
    <div class="row">
      <div class="col-lg-8">
        <div class="row border-bottom mb-4">
          <div class="col-sm-6">
            <h4 class="mb-4">Información de Contacto</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><i class="ti-email mr-3"></i><?= $professor['email'] ?></li>
              <li class="mb-3"><i class="ti-calendar mr-3"></i>Edad: <?= $professor['age'] ?> años</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h4 class="mb-4">Sígueme</h4>
            <ul class="list-inline social-icons">
              <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Estadísticas -->
      <div class="col-lg-4">
        <div class="bg-secondary p-4">
          <ul class="list-unstyled">
            <li class="mb-4">
              <p class="text-white mb-1">Proyectos Realizados</p>
              <strong class="text-white">32</strong>
            </li>
            <li class="mb-4">
              <p class="text-white mb-1">Tasa de Éxito</p>
              <strong class="text-white">92%</strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /team -->

<!-- team -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Un equipo dispuesto a hacerte aprender</h2>
        <p>Nuestros profesores especializados en el sector de la inteligencia artificial te acompañaran en cada paso.</p>
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
                  <img src="' . $professor['avatar'] . '" 
                       alt="' . $professor['name'] . ' ' . $professor['surname'] . '" 
                       class="card-img-top"
                       style="object-fit: cover; height: 400px">
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
<?php

include("./components/footer.php");

?>