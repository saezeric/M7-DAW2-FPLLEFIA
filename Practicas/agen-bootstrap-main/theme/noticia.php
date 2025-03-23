<?php
ob_start();
include("./components/header.php");

// Procesar la inserción de comentarios/respuestas si se envía el formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_id = isset($_POST['new_id']) ? (int) $_POST['new_id'] : 0;
    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;
    $description = isset($_POST['description']) ? trim($_POST['description']) : "";
    // Para respuestas, se envía comment_id; para comentarios de nivel superior, se deja vacío
    $comment_id = (isset($_POST['comment_id']) && !empty($_POST['comment_id'])) ? (int) $_POST['comment_id'] : null;

    if ($new_id > 0 && $user_id > 0 && !empty($description)) {
        if ($comment_id === null) {
            // Comentario de nivel superior
            $sql_insert = "INSERT INTO COMMENTS (user_id, new_id, description, data) VALUES (?, ?, ?, NOW())";
            $stmt = $mysqli->prepare($sql_insert);
            $stmt->bind_param("iis", $user_id, $new_id, $description);
        } else {
            // Respuesta a un comentario
            $sql_insert = "INSERT INTO COMMENTS (user_id, new_id, comment_id, description, data) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $mysqli->prepare($sql_insert);
            $stmt->bind_param("iiis", $user_id, $new_id, $comment_id, $description);
        }
        $stmt->execute();
        $stmt->close();
    }
    // Redirigir inmediatamente para evitar reenvío del formulario
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Obtener el ID de la noticia desde la URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Consultar la noticia en la base de datos
$sql = "SELECT * FROM NEWS WHERE id = $id";
$result = mysqli_query($mysqli, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
?>
  <!-- page-title -->
  <section class="page-title bg-cover position-relative" style="background-image: url('<?php echo $row['image']; ?>');">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary"><?php echo $row['title']; ?></h1>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

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

  <!-- Sección de Comentarios -->
  <section class="section">
    <div class="container">
      <h2 class="mb-4">Comentarios</h2>
      <?php
      // Consultar los comentarios de nivel superior para esta noticia
      $comments_query = "SELECT C.*, U.name, U.surname, U.avatar 
                         FROM COMMENTS C 
                         LEFT JOIN USERS U ON C.user_id = U.id 
                         WHERE C.new_id = $id AND C.comment_id IS NULL 
                         ORDER BY C.data ASC";
      $comments_result = mysqli_query($mysqli, $comments_query);
      if ($comments_result && mysqli_num_rows($comments_result) > 0) {
          while ($comment = mysqli_fetch_assoc($comments_result)) {
      ?>
            <div class="mb-4 p-3" style="border: 1px solid #ddd; border-radius: 5px;">
              <div class="d-flex align-items-center mb-2">
                <img src="<?php echo $comment['avatar']; ?>" alt="Avatar" style="width:50px; height:50px; border-radius:50%; object-fit: cover; margin-right:10px;">
                <strong><?php echo $comment['name'] . ' ' . $comment['surname']; ?></strong>
                <small class="text-muted ms-2"><?php echo date("F j, Y", strtotime($comment['data'])); ?></small>
              </div>
              <p><?php echo $comment['description']; ?></p>
              
              <!-- Listado de respuestas -->
              <?php
              $reply_query = "SELECT C.*, U.name, U.surname, U.avatar 
                              FROM COMMENTS C 
                              LEFT JOIN USERS U ON C.user_id = U.id 
                              WHERE C.comment_id = " . $comment['id'] . " 
                              ORDER BY C.data ASC";
              $reply_result = mysqli_query($mysqli, $reply_query);
              if ($reply_result && mysqli_num_rows($reply_result) > 0) {
                  while ($reply = mysqli_fetch_assoc($reply_result)) {
              ?>
                      <div class="ms-5 mb-2 p-2" style="border-left: 2px solid #ccc;">
                        <div class="d-flex align-items-center mb-1">
                          <img src="<?php echo $reply['avatar']; ?>" alt="Avatar" style="width:40px; height:40px; border-radius:50%; object-fit: cover; margin-right:10px;">
                          <strong><?php echo $reply['name'] . ' ' . $reply['surname']; ?></strong>
                          <small class="text-muted ms-2"><?php echo date("F j, Y", strtotime($reply['data'])); ?></small>
                        </div>
                        <p><?php echo $reply['description']; ?></p>
                      </div>
              <?php
                  }
              }
              ?>
              <!-- Botón para mostrar/ocultar el formulario de respuesta -->
              <button class="btn btn-link btn-sm" onclick="toggleReplyForm(<?php echo $comment['id']; ?>)">Responder</button>
              <div id="replyForm-<?php echo $comment['id']; ?>" style="display: none;" class="ms-5">
                <form method="POST" action="">
                  <!-- Campos ocultos para relacionar la respuesta con el comentario y la noticia -->
                  <input type="hidden" name="new_id" value="<?php echo $id; ?>">
                  <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <div class="mb-2">
                    <textarea name="description" class="form-control" placeholder="Escribe tu respuesta..." required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Enviar Respuesta</button>
                </form>
              </div>
            </div>
      <?php
          }
      } else {
          echo "<p>No hay comentarios para esta noticia.</p>";
      }
      ?>
      
      <!-- Formulario para añadir un nuevo comentario de nivel superior -->
      <div class="mt-5">
        <h3>Deja tu comentario</h3>
        <form method="POST" action="">
          <input type="hidden" name="new_id" value="<?php echo $id; ?>">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <!-- Para comentarios de nivel superior, no se envía comment_id -->
          <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Escribe tu comentario..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar Comentario</button>
        </form>
      </div>
      
    </div>
  </section>

<?php
} else {
  echo "<p class='text-center'>Noticia no encontrada.</p>";
}

include("./components/footer.php");
?>

<!-- Script para mostrar/ocultar el formulario de respuesta -->
<script>
function toggleReplyForm(commentId) {
    var replyForm = document.getElementById("replyForm-" + commentId);
    replyForm.style.display = (replyForm.style.display === "none") ? "block" : "none";
}
</script>
