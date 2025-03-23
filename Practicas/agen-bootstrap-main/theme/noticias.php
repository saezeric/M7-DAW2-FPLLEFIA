<?php
include("./components/header.php");

// Configuración de paginación
$limit = 9; // Noticias por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$page = max($page, 1); // Asegurarse de que la página mínima sea 1
$offset = ($page - 1) * $limit; // Calcular el OFFSET

// Obtener el total de noticias
$total_query = "SELECT COUNT(*) as total FROM NEWS";
$total_result = $mysqli->query($total_query);
$total_news = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_news / $limit); // Redondear hacia arriba

// Consulta con paginación
$query = "SELECT * FROM NEWS ORDER BY new_date DESC LIMIT $limit OFFSET $offset";
$result = $mysqli->query($query);
?>

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/518543/pexels-photo-518543.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Últimas Noticias sobre la Inteligencia Artificial</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <?php while ($news = $result->fetch_assoc()): ?>
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

    <!-- Paginación -->
    <nav>
      <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?= $page - 1 ?>">Anterior</a>
          </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?= $page + 1 ?>">Siguiente</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</section>
<!-- /blog -->

<?php include("./components/footer.php"); ?>