<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container-fluid w-75 d-flex justify-content-center">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Ultimas Noticias sobre la Inteligencia Artificial</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <?php
      // Asumimos que ya tienes configurada la conexión a la base de datos en $mysqli
      $query = "SELECT * FROM NEWS ORDER BY new_date DESC";
      $result = $mysqli->query($query);

      while ($news = $result->fetch_assoc()):
        // Formateamos la fecha para mostrarla de forma legible, por ejemplo: January 15, 2018
        $formattedDate = date("F j, Y", strtotime($news['new_date']));
      ?>
        <!-- Usamos "d-flex align-items-stretch" en la columna para que todas tengan la misma altura -->
        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
          <!-- Agregamos "h-100" a la card para que ocupe todo el alto disponible -->
          <article class="card h-100">
            <img src="<?= htmlspecialchars($news['image']) ?>" alt="post-thumb" class="card-img-top mb-2 img-fixed">
            <!-- Convertimos el card-body en un contenedor flex vertical -->
            <div class="card-body d-flex flex-column">
              <time><?= $formattedDate ?></time>
              <a href="blog-single.php?id=<?= $news['id'] ?>" class="h4 card-title d-block my-3 text-dark hover-text-underline">
                <?= htmlspecialchars($news['title']) ?>
              </a>
              <!-- Con "mt-auto" el botón se posiciona siempre al final del card-body -->
              <a href="blog-single.php?id=<?= $news['id'] ?>" class="btn btn-transparent mt-auto">Leer más</a>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- /blog -->
<?php

include("./components/footer.php");

?>