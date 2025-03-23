<?php
session_start();
require_once("./config.php");

// Verificar acceso de administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
} elseif ($_SESSION['user_rol'] !== 'admin') {
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Acceso Denegado</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body, html { height: 100%; margin: 0; }
        .centered-container { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f8f9fa; }
        .error-message { text-align: center; max-width: 600px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .error-message h1 { font-size: 2.5rem; color: #dc3545; }
        .error-message p { font-size: 1.2rem; color: #6c757d; }
        .error-message .btn { margin-top: 20px; }
      </style>
    </head>
    <body>
      <div class="centered-container">
        <div class="error-message">
          <h1>Acceso Denegado</h1>
          <p>No tienes permisos para acceder a esta página.</p>
          <a href="./index.php" class="btn btn-primary">Volver a la Página Principal</a>
        </div>
      </div>
    </body>
    </html>';
    exit();
}

// Obtener el nombre de la tabla desde la URL
if (!isset($_GET['table'])) {
    die("Tabla no especificada.");
}
$table = $_GET['table'];

// Procesar eliminación si se envía el parámetro delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $delete_query = "DELETE FROM $table WHERE id = $delete_id";
    if ($mysqli->query($delete_query)) {
        header("Location: manage_table.php?table=$table");
        exit();
    } else {
        $errors[] = "Error al eliminar en la base de datos: " . $mysqli->error;
    }
}

// Detectar modo edición
$edit_mode = false;
$edit_data = [];
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $edit_mode = true;
    $edit_id = intval($_GET['edit']);
    $edit_query = "SELECT * FROM $table WHERE id = $edit_id";
    $edit_result = $mysqli->query($edit_query);
    if ($edit_result && $edit_result->num_rows > 0) {
        $edit_data = $edit_result->fetch_assoc();
    } else {
        $edit_mode = false;
    }
}

// Consultar todos los registros
$query = "SELECT * FROM $table";
$result = $mysqli->query($query);
if (!$result) {
    die("Error al obtener los datos de la tabla: " . $mysqli->error);
}
$rows = $result->fetch_all(MYSQLI_ASSOC);

// Calcular próximo ID (modo añadir) o usar id actual (modo edición)
if (!$edit_mode) {
    $next_id_query = "SELECT MAX(id) + 1 AS next_id FROM $table";
    $next_id_result = $mysqli->query($next_id_query);
    $next_id_row = $next_id_result->fetch_assoc();
    $next_id = $next_id_row['next_id'] ?? 1;
} else {
    $next_id = $edit_data['id'];
}

// Definir la estructura del formulario según la tabla
$required_fields = [];
$form_fields = [];

switch ($table) {
    case 'USERS':
        $required_fields = ['name', 'surname', 'email', 'rol'];
        $form_fields = [
            'name'          => ['type' => 'text', 'label' => 'Nombre'],
            'surname'       => ['type' => 'text', 'label' => 'Apellido'],
            'email'         => ['type' => 'email', 'label' => 'Correo Electrónico'],
            'password'      => ['type' => 'password', 'label' => 'Contraseña (déjala en blanco para no cambiar)'],
            'rol'           => ['type' => 'text', 'label' => 'Rol'],
            'avatar'        => ['type' => 'file', 'label' => 'Avatar'], // Campo de archivo
            'age'           => ['type' => 'number', 'label' => 'Edad'],
            'date_register' => ['type' => 'date', 'label' => 'Fecha de Registro']
        ];
        break;
    case 'COURSES':
        $required_fields = ['title', 'url', 'description'];
        $form_fields = [
            'title'       => ['type' => 'text', 'label' => 'Título'],
            'url'         => ['type' => 'text', 'label' => 'URL'],
            'image'       => ['type' => 'file', 'label' => 'Imagen'], // Campo de archivo
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'precio'      => ['type' => 'number', 'label' => 'Precio', 'step' => '0.01']
        ];
        break;
    case 'NEWS':
        $required_fields = ['title', 'subtitle', 'description'];
        $form_fields = [
            'title'       => ['type' => 'text', 'label' => 'Título'],
            'subtitle'    => ['type' => 'text', 'label' => 'Subtítulo'],
            'image'       => ['type' => 'file', 'label' => 'Imagen'], // Campo de archivo
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'new_date'    => ['type' => 'date', 'label' => 'Fecha de la Noticia']
        ];
        break;
    case 'FAQS':
        $required_fields = ['question', 'answer'];
        $form_fields = [
            'question' => ['type' => 'text', 'label' => 'Pregunta'],
            'answer'   => ['type' => 'text', 'label' => 'Respuesta']
        ];
        break;
    case 'TESTIMONIALS':
        $required_fields = ['name', 'surname', 'description', 'rating'];
        $form_fields = [
            'name'        => ['type' => 'text', 'label' => 'Nombre'],
            'surname'     => ['type' => 'text', 'label' => 'Apellido'],
            'image'       => ['type' => 'file', 'label' => 'Imagen'], // Campo de archivo
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'rating'      => ['type' => 'number', 'label' => 'Calificación']
        ];
        break;
    case 'COMMENTS':
        $required_fields = ['user_id', 'new_id', 'description'];
        $form_fields = [
            'user_id'    => ['type' => 'number', 'label' => 'ID del Usuario'],
            'new_id'     => ['type' => 'number', 'label' => 'ID de la Noticia'],
            'comment_id' => ['type' => 'number', 'label' => 'ID del Comentario (opcional)'],
            'description'=> ['type' => 'text', 'label' => 'Descripción'],
            'data'       => ['type' => 'date', 'label' => 'Fecha']
        ];
        break;
}

// Procesar el formulario al enviar
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Primero, procesar campos tipo file
    foreach ($form_fields as $field => $field_data) {
        if (isset($field_data['type']) && $field_data['type'] === 'file') {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES[$field]['tmp_name'];
                $fileName = $_FILES[$field]['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'avif', 'webp', 'jfif'];
                if (in_array($fileExtension, $allowedExtensions)) {
                    // Definir carpeta destino según la tabla; usar rutas relativas a la carpeta admin
                    switch ($table) {
                        case 'USERS': $uploadDir = './uploads/avatars/'; break;
                        case 'COURSES': $uploadDir = './uploads/courses/'; break;
                        case 'NEWS': $uploadDir = './uploads/news/'; break;
                        case 'TESTIMONIALS': $uploadDir = './uploads/testimonials/'; break;
                        default: $uploadDir = './uploads/'; break;
                    }
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $dest_path = $uploadDir . $newFileName;
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST[$field] = $dest_path;
                    } else {
                        $errors[] = "Error al mover el archivo para $field.";
                    }
                } else {
                    $errors[] = "Extensión no permitida para $field. Solo se permiten: " . implode(", ", $allowedExtensions);
                }
            } else {
                // Si no se subió archivo: en edición conservar valor anterior; en añadir, dejar vacío
                if ($edit_mode) {
                    $_POST[$field] = $edit_data[$field];
                } else {
                    $_POST[$field] = "";
                }
            }
        }
    }
    // Validar campos obligatorios (para USERS, en edición la contraseña puede quedar vacía)
    foreach ($required_fields as $field) {
        if ($table === 'USERS' && $field === 'password' && $edit_mode) {
            continue;
        }
        if (empty($_POST[$field])) {
            $errors[] = "El campo '$field' es obligatorio.";
        }
    }

    if (empty($errors)) {
        if ($edit_mode) {
            // Modo edición: UPDATE
            $update_parts = [];
            foreach ($_POST as $key => $value) {
                if ($table === 'USERS' && $key === 'password') {
                    if (empty($value)) { continue; }
                    else { $value = password_hash($value, PASSWORD_DEFAULT); }
                }
                if ($table === 'COMMENTS' && $key === 'comment_id' && trim($value) === "") {
                    $update_parts[] = "$key = NULL";
                } else {
                    $escaped_value = $mysqli->real_escape_string($value);
                    $update_parts[] = "$key = '$escaped_value'";
                }
            }
            $update_sql = "UPDATE $table SET " . implode(", ", $update_parts) . " WHERE id = '" . intval($edit_data['id']) . "'";
            if ($mysqli->query($update_sql)) {
                header("Location: manage_table.php?table=$table");
                exit();
            } else {
                $errors[] = "Error al actualizar en la base de datos: " . $mysqli->error;
            }
        } else {
            // Modo añadir: INSERT
            if ($table === 'USERS' && isset($_POST['password']) && !empty($_POST['password'])) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $columns_arr = [];
            $values_arr = [];
            foreach ($_POST as $key => $value) {
                $columns_arr[] = $key;
                if ($table === 'COMMENTS' && $key === 'comment_id' && trim($value) === "") {
                    $values_arr[] = "NULL";
                } else {
                    $escaped_value = $mysqli->real_escape_string($value);
                    $values_arr[] = "'" . $escaped_value . "'";
                }
            }
            $insert_sql = "INSERT INTO $table (" . implode(", ", $columns_arr) . ") VALUES (" . implode(", ", $values_arr) . ")";
            if ($mysqli->query($insert_sql)) {
                header("Location: manage_table.php?table=$table");
                exit();
            } else {
                $errors[] = "Error al insertar en la base de datos: " . $mysqli->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Gestionar <?= ucfirst($table); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-name" content="agen" />
    <link rel="stylesheet" href="./plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./plugins/slick/slick.css">
    <link rel="stylesheet" href="./plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./plugins/venobox/venobox.css">
    <link rel="stylesheet" href="./plugins/card-slider/css/style.css">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <style>
        .custom-container { max-width: 1400px; margin: 0 auto; }
        .card { margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: none; border-radius: 10px; height: 100%; display: flex; flex-direction: column; }
        .card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
        .card-content { flex: 1; overflow-y: auto; }
        .card-title { font-size: 1.25rem; font-weight: bold; margin-bottom: 15px; }
        .card-text { font-size: 0.9rem; color: #6c757d; margin-bottom: 10px; }
        .action-buttons { margin-top: auto; display: flex; justify-content: flex-end; gap: 10px; }
        .form-container { background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
    </style>
</head>
<body>
    <section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.05);"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-1 text-white font-weight-bold font-primary">Panel de Administración</h1>
                    <h2 class="display-6 text-white font-weight-bold font-primary">Gestiona los contenidos de tu plataforma</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="custom-container mt-5">
        <h2 class="text-center mb-4">Gestionar <?= ucfirst($table); ?></h2>
        <div class="section-border"></div>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="row">
            <!-- Listado de registros -->
            <div class="col-md-8">
                <div class="row">
                    <?php foreach ($rows as $row): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                        if ($table === 'COURSES' || $table === 'NEWS') {
                                            echo $row['title'];
                                        } elseif ($table === 'USERS') {
                                            echo $row['name'] . ' ' . $row['surname'];
                                        } else {
                                            echo ucfirst($table) . ' #' . $row['id'];
                                        }
                                        ?>
                                    </h5>
                                    <div class="card-content">
                                        <?php foreach ($row as $key => $value): ?>
                                            <p class="card-text"><strong><?= ucfirst($key); ?>:</strong> <span><?= $value; ?></span></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="action-buttons">
                                        <!-- Botón de editar -->
                                        <a href="manage_table.php?table=<?= $table; ?>&edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <!-- Botón de eliminar con confirmación -->
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id']; ?>)">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Formulario (modo Añadir o Editar) -->
            <div class="col-md-4">
                <div class="form-container">
                    <h3><?= $edit_mode ? 'Editar' : 'Añadir Nuevo'; ?></h3>
                    <form action="manage_table.php?table=<?= $table; ?><?= $edit_mode ? "&edit=" . $edit_data['id'] : ""; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= $next_id; ?>" readonly>
                        </div>
                        <?php
                        if ($table === 'COMMENTS') {
                            echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';
                        }
                        foreach ($form_fields as $field => $field_data):
                            if ($table === 'COMMENTS' && $field === 'user_id') { continue; }
                            $value = "";
                            if ($edit_mode && isset($edit_data[$field]) && !($table === 'USERS' && $field === 'password')) {
                                $value = $edit_data[$field];
                            }
                        ?>
                            <div class="mb-3">
                                <label for="<?= $field; ?>" class="form-label"><?= $field_data['label']; ?></label>
                                <input type="<?= $field_data['type']; ?>" class="form-control" id="<?= $field; ?>" name="<?= $field; ?>" 
                                <?= ($field_data['type'] != 'file') ? 'value="' . htmlspecialchars($value) . '"' : '' ?>
                                <?= in_array($field, $required_fields) ? 'required' : ''; ?> 
                                <?= isset($field_data['step']) ? "step='{$field_data['step']}'" : ""; ?>>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary"><?= $edit_mode ? 'Guardar Cambios' : 'Añadir'; ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-sm text-center mt-4">
            <a href="admin.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver al Panel</a>
        </div>
    </div>
    
    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            ¿Estás seguro de que deseas eliminar este registro?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Sí, eliminar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function confirmDelete(id) {
          var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
          document.getElementById('confirmDeleteBtn').onclick = function() {
              window.location.href = "manage_table.php?table=<?= $table; ?>&delete=" + id;
          };
          deleteModal.show();
      }
      function toggleReplyForm(commentId) {
          var replyForm = document.getElementById("replyForm-" + commentId);
          replyForm.style.display = (replyForm.style.display === "none") ? "block" : "none";
      }
    </script>
</body>
</html>
