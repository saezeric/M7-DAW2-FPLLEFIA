<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Portfolio</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- project -->
<section id="portfolio" class="section">
  <div class="container-fluid px-0">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Nuestros Cursos</h2>
        <div class="section-border"></div>
      </div>
    </div>

    <div class="row no-gutters shuffle-wrapper">
      <?php
      // Definimos la consulta SQL
      $courses_query = "SELECT id, title, url, image FROM COURSES";

      // Ejecutamos la consulta usando MySQLi
      $result = $mysqli->query($courses_query);

      // Verificamos si hay resultados
      if ($result && $result->num_rows > 0) {
        // Recorremos cada curso
        while ($course = $result->fetch_assoc()) {
          echo '
              <div class="col-lg-4 col-md-6 shuffle-item">
                <div class="project-item">
                  <img src="' . $course['image'] . '" 
                       alt="' . $course['title'] . '" 
                       class="img-fluid w-100"
                        style="height: 300px; object-fit: cover;">
                  <div class="project-hover bg-secondary px-4 py-3">
                    <a href="' . $course['url'] . '" 
                       class="text-white h4">' . $course['title'] . '</a>
                    <a href="' . $course['url'] . '">
                      <i class="ti-link icon-xs text-white"></i>
                    </a>
                  </div>
                </div>
              </div>';
        }
      } else {
        echo '<div class="col-12 text-center py-5">
                  <p class="text-muted">Próximamente nuevos cursos</p>
                </div>';
      }
      ?>
    </div>
  </div>
</section>
<!-- /project -->

<!-- call to action -->
<section class="mb-5">
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

<!-- clients -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="client-logo-slider d-flex align-items-center">
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /clients -->
<?php

include("./components/footer.php");

?>