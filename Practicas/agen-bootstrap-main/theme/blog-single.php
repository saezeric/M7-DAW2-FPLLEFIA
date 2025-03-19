<?php
include("./components/header.php");

// Obtener el ID de la noticia desde la URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Consultar la noticia en la base de datos
$sql = "SELECT * FROM NEWS WHERE id = $id";
$result = mysqli_query($mysqli, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
?>

  <!-- Título de la noticia -->
  <section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary"><?php echo $row['title']; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido de la noticia -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h3 class="font-tertiary mb-5"><?php echo $row['subtitle']; ?></h3>
          <img src="<?php echo $row['image']; ?>" alt="post-thumb" class="img-fluid w-100 mb-3">
          <p class="float-left mr-4">Publicado el <?php echo date("F j, Y", strtotime($row['new_date'])); ?></p>
          <div class="content">
            <p><?php echo $row['description']; ?></p>
          </div>
          <div class="additional-content">
            <p><?php echo $row['full_text']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
} else {
  echo "<p class='text-center'>Noticia no encontrada.</p>";
}

include("./components/footer.php");
?>