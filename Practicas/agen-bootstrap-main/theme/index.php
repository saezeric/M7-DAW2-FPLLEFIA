<?php
include("./components/header.php");
$result = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC");

// Obtener las tres últimas noticias
$news_query = "SELECT * FROM NEWS ORDER BY new_date DESC LIMIT 3";
$news_result = $mysqli->query($news_query);
?>

<!-- banner -->

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">MYAI</h1>
          <h2 class="display-6 text-white font-weight-bold font-primary">La primera Academia Online Especializada en IA de España</h2>
        </div>
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
                    <a href="curso.php?url=' . $course['url'] . '" 
                       class="text-white h4">' . $course['title'] . '</a>
                    <a href="curso.php?url=' . $course['url'] . '">
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

<!-- about -->
<section class="section-lg position-relative bg-cover" data-background="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
  <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 col-md-8 col-sm-7 col-8">
        <h2 class="text-white mb-4">¿Quienes Somos?</h2>
        <p class="text-light mb-4" style="width: 75%">En MyAI, somos pioneros en la revolución educativa de la inteligencia artificial en España. Como la primera empresa especializada en cursos de IA, nuestro compromiso es liderar la formación en una de las tecnologías más transformadoras de nuestro tiempo.</p>
        <a href="sobre-nosotros.php" class="btn btn-primary">Leer más</a>
      </div>
      <div class="col-md-2 col-sm-4 col-4 text-right align-self-end">
      </div>
    </div>
  </div>
</section>
<!-- /about -->

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
<section class="section">
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

<!-- testimonial-slider -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-white mb-5">Nuestros Testimonios</h2>
      </div>
    </div>
    <div class="row bg-contain" data-background="images/banner/brush.png">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="slider" class="ui-card-slider bg-contain">
          <?php
          // Consulta SQL para obtener los testimonios
          $testimonials_query = "SELECT * FROM TESTIMONIALS";
          $result = $mysqli->query($testimonials_query);

          if ($result && $result->num_rows > 0) {
            while ($testimonial = $result->fetch_assoc()) {
              echo '
              <div class="slide">
                <div class="card text-center">
                  <div class="card-body px-5 py-4">
                    <img src="' . $testimonial['image'] . '" 
                         alt="' . $testimonial['name'] . ' ' . $testimonial['surname'] . '" 
                         class="img-fluid rounded-circle mb-4"
                         style="width: 100px; height: 100px; object-fit:cover;">
                    <h4 class="text-secondary">' . $testimonial['name'] . ' ' . $testimonial['surname'] . '</h4>
                    <p>“' . $testimonial['description'] . '”</p>
                  </div>
                </div>
              </div>';
            }
          } else {
            echo '<div class="col-12 text-center"><p>No hay testimonios disponibles en este momento.</p></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /testimonial-slider -->

<!-- latest news -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Últimas Noticias</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <?php while ($news = $news_result->fetch_assoc()): ?>
        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
          <article class="card h-100">
            <img src="<?= $news['image'] ?>" alt="post-thumb" class="card-img-top mb-2 img-fixed">
            <div class="card-body d-flex flex-column">
              <time><?= date("F j, Y", strtotime($news['new_date'])) ?></time>
              <a href="noticia.php?id=<?= $news['id'] ?>" class="h4 card-title d-block my-3 text-dark hover-text-underline">
                <?= $news['title'] ?>
              </a>
              <a href="noticia.php?id=<?= $news['id'] ?>" class="btn btn-transparent mt-auto">Leer más</a>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- /latest news -->

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

<!-- faqs -->
<section class="section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="accordion">
          <?php
          // Consulta SQL para obtener las FAQs
          $faqs_query = "SELECT * FROM FAQS";
          $result = $mysqli->query($faqs_query);

          // Verificar si hay resultados
          if ($result && $result->num_rows > 0) {
            $counter = 1; // Contador para los IDs de los acordeones
            while ($faq = $result->fetch_assoc()) {
              echo '
              <!-- accordion item -->
              <div class="card mb-4 rounded-0 border-0">
                <div class="card-header rounded-0 bg-white border p-0 border-0">
                  <a class="card-link h4 d-flex tex-dark mb-0 py-3 px-4 justify-content-between" data-toggle="collapse" href="#accordion' . $counter . '">
                    <span>' . $faq['question'] . '</span> <i class="ti-plus text-right"></i>
                  </a>
                </div>
                <div id="accordion' . $counter . '" class="collapse" data-parent="#accordion">
                  <div class="card-body font-secondary text-color">' . $faq['answer'] . '</div>
                </div>
              </div>';
              $counter++; // Incrementar el contador para el siguiente ID
            }
          } else {
            echo '<div class="col-12 text-center"><p>No hay preguntas frecuentes disponibles en este momento.</p></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /faqs -->

<?php

include("./components/footer.php");

?>