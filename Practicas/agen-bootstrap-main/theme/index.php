<?php
include("./components/header.php");
$result = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC");

// Obtener las tres últimas noticias
$news_query = "SELECT * FROM NEWS ORDER BY new_date DESC LIMIT 3";
$news_result = $mysqli->query($news_query);
?>

<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="images/banner/banner2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">MYAI</h1>
        <h2 class="display-6 text-white font-weight-bold font-primary">La primera Academia Online Especializada en IA de España</h2>
      </div>
    </div>
  </div>
</section>
<!-- /banner -->

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
<section>
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="https://images.pexels.com/photos/313690/pexels-photo-313690.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
    <div class="row">
      <div class="col-lg-8 offset-lg-1">
        <h2 class="text-gradient-primary">Comienza tu Curso Ahora!</h2>
        <p class="h4 font-weight-bold text-white mb-4">Investiga mas acerca de nuestros cursos de IA</p>
        <a href="works.php" class="btn btn-lg btn-primary">Ver más</a>
      </div>
    </div>
  </div>
</section>
<!-- /call to action -->

<!-- service -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2 class="section-title">Cards</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4 active">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-palette mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-palette"></i>
            </div>
            <h4 class="mb-4">Design</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-dashboard mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-dashboard"></i>
            </div>
            <h4 class="mb-4">Development</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-announcement mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-announcement"></i>
            </div>
            <h4 class="mb-4">Marketing</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /service -->

<!-- team -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Nuestros Profesores</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
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
                    <h4><a class="text-dark" href="team-single.php?id=' . $professor['id'] . '">'
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

<!-- about -->
<section class="section-lg position-relative bg-cover" data-background="images/backgrounds/about-bg.jpg">
  <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 col-md-8 col-sm-7 col-8">
        <h2 class="text-white mb-4">¿Quienes Somos?</h2>
        <p class="text-light mb-4" style="width: 75%">En MyAI, somos pioneros en la revolución educativa de la inteligencia artificial en España. Como la primera empresa especializada en cursos de IA, nuestro compromiso es liderar la formación en una de las tecnologías más transformadoras de nuestro tiempo.</p>
        <a href="about.php" class="btn btn-primary">Leer más</a>
      </div>
      <div class="col-md-2 col-sm-4 col-4 text-right align-self-end">
        <a class="venobox" data-autoplay="true" data-vbtype="video"
          href="https://www.youtube.com/watch?v=jrkvirglgaQ"><i
            class="text-center icon-sm icon-box rounded-circle text-white bg-gradient-primary d-block ti-control-play"></i></a>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<!-- pricing -->
<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Our Smart Pricing Table</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Basic</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Basic</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Basic</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /pricing -->

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
              <a href="blog-single.php?id=<?= $news['id'] ?>" class="h4 card-title d-block my-3 text-dark hover-text-underline">
                <?= $news['title'] ?>
              </a>
              <a href="blog-single.php?id=<?= $news['id'] ?>" class="btn btn-transparent mt-auto">Leer más</a>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- /latest news -->

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

<?php

include("./components/footer.php");

?>