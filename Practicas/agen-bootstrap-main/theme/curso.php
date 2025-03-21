<?php
include("./components/header.php");

// Conexión a la base de datos (asumiendo que ya está configurada en header.php o en otro archivo)
// $mysqli es la variable de conexión a la base de datos

// Verificar si se ha pasado el parámetro 'url' en la URL
if (isset($_GET['url'])) {
  $course_url = $_GET['url'];

  // Consulta SQL para obtener los datos del curso basado en la URL
  $sql = "SELECT * FROM COURSES WHERE url = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $course_url);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows > 0) {
    $course = $result->fetch_assoc();

    // Redirigir a la URL almacenada en la base de datos
    $new_url = $course['url'];
    if ($new_url !== $course_url) {
      header("Location: curso.php?url=$new_url");
      exit(); // Asegurarse de que el script se detenga después de la redirección
    }
  } else {
    // Si no se encuentra el curso, redirigir o mostrar un mensaje de error
    die("Curso no encontrado.");
  }
} else {
  // Si no se proporciona la URL, redirigir o mostrar un mensaje de error
  die("URL del curso no proporcionada.");
}
?>

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('<?= $course['image']; ?>');">
  <!-- Overlay oscuro con opacidad -->
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
  <div class="container-fluid w-75 d-flex justify-content-center position-relative" style="z-index: 1;">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary"><?= $course['title']; ?></h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- pricing -->
<section class="section pb-0">
  <div class="container">
    <div class="row justify-content-center"> <!-- Centrar el contenido -->
      <div class="col-lg-6 col-sm-8 text-center"> <!-- Ajustar el ancho y centrar -->
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body">
            <h4 class="text-white"><?= $course['title']; ?></h4>
            <p class="text-light mb-4"><?= $course['description']; ?></p>
            <p class="text-white mb-4"><span class="display-3 font-weight-bold vertical-align-middle"><?= $course['precio']; ?></span>€</p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Acceso completo al curso</li>
              <li class="text-white mb-3">Material descargable</li>
              <li class="text-white mb-3">Certificado de finalización</li>
              <li class="text-white mb-3">Soporte 24/7</li>
              <li class="text-white mb-3">Acceso a actualizaciones futuras</li>
              <li class="text-white mb-3">Proyectos prácticos incluidos</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Comprar ahora</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /pricing -->

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