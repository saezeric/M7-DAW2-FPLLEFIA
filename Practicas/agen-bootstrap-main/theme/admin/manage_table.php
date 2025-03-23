<?php
session_start();
require_once("../config.php");

// Verificar si el usuario está logueado y tiene rol de administrador
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: ../login.php");
    exit();
} elseif ($_SESSION['user_rol'] !== 'admin') {
    // Si no es administrador, mostrar un mensaje de error
    die("
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Acceso Denegado</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body, html {
                    height: 100%;
                    margin: 0;
                }
                .centered-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh; /* 100% del viewport height */
                    background-color: #f8f9fa; /* Fondo claro */
                }
                .error-message {
                    text-align: center;
                    max-width: 600px;
                    padding: 20px;
                    background-color: white;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
                }
                .error-message h1 {
                    font-size: 2.5rem;
                    color: #dc3545; /* Rojo de Bootstrap */
                }
                .error-message p {
                    font-size: 1.2rem;
                    color: #6c757d; /* Gris de Bootstrap */
                }
                .error-message .btn {
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='centered-container'>
                <div class='error-message'>
                    <h1>Acceso Denegado</h1>
                    <p>No tienes permisos para acceder a esta página.</p>
                    <a href='../index.php' class='btn btn-primary'>Volver a la Página Principal</a>
                </div>
            </div>
        </body>
        </html>
    ");
}

// Obtener el nombre de la tabla desde la URL
if (!isset($_GET['table'])) {
    die("Tabla no especificada.");
}
$table = $_GET['table'];

// Conectar a la base de datos y obtener los datos de la tabla
$query = "SELECT * FROM $table";
$result = $mysqli->query($query);

if (!$result) {
    die("Error al obtener los datos de la tabla: " . $mysqli->error);
}
$rows = $result->fetch_all(MYSQLI_ASSOC);

// Obtener el próximo ID disponible
$next_id_query = "SELECT MAX(id) + 1 AS next_id FROM $table";
$next_id_result = $mysqli->query($next_id_query);
$next_id_row = $next_id_result->fetch_assoc();
$next_id = $next_id_row['next_id'] ?? 1; // Si no hay registros, empezar con 1

// Definir campos obligatorios y estructura del formulario para cada tabla
$required_fields = [];
$form_fields = [];

switch ($table) {
    case 'USERS':
        $required_fields = ['name', 'surname', 'email', 'password', 'rol'];
        $form_fields = [
            'name' => ['type' => 'text', 'label' => 'Nombre'],
            'surname' => ['type' => 'text', 'label' => 'Apellido'],
            'email' => ['type' => 'email', 'label' => 'Correo Electrónico'],
            'password' => ['type' => 'password', 'label' => 'Contraseña'],
            'rol' => ['type' => 'text', 'label' => 'Rol'],
            'avatar' => ['type' => 'text', 'label' => 'Avatar (URL)'],
            'age' => ['type' => 'number', 'label' => 'Edad'],
            'date_register' => ['type' => 'date', 'label' => 'Fecha de Registro']
        ];
        break;
    case 'COURSES':
        $required_fields = ['title', 'url', 'description'];
        $form_fields = [
            'title' => ['type' => 'text', 'label' => 'Título'],
            'url' => ['type' => 'text', 'label' => 'URL'],
            'image' => ['type' => 'text', 'label' => 'Imagen (URL)'],
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'precio' => ['type' => 'number', 'label' => 'Precio']
        ];
        break;
    case 'NEWS':
        $required_fields = ['title', 'subtitle', 'description'];
        $form_fields = [
            'title' => ['type' => 'text', 'label' => 'Título'],
            'subtitle' => ['type' => 'text', 'label' => 'Subtítulo'],
            'image' => ['type' => 'text', 'label' => 'Imagen (URL)'],
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'new_date' => ['type' => 'date', 'label' => 'Fecha de la Noticia']
        ];
        break;
    case 'FAQS':
        $required_fields = ['question', 'answer'];
        $form_fields = [
            'question' => ['type' => 'text', 'label' => 'Pregunta'],
            'answer' => ['type' => 'text', 'label' => 'Respuesta']
        ];
        break;
    case 'TESTIMONIALS':
        $required_fields = ['name', 'surname', 'description', 'rating'];
        $form_fields = [
            'name' => ['type' => 'text', 'label' => 'Nombre'],
            'surname' => ['type' => 'text', 'label' => 'Apellido'],
            'image' => ['type' => 'text', 'label' => 'Imagen (URL)'],
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'rating' => ['type' => 'number', 'label' => 'Calificación']
        ];
        break;
    case 'COMMENTS':
        $required_fields = ['user_id', 'new_id', 'description'];
        $form_fields = [
            'user_id' => ['type' => 'number', 'label' => 'ID del Usuario'],
            'new_id' => ['type' => 'number', 'label' => 'ID de la Noticia'],
            'comment_id' => ['type' => 'number', 'label' => 'ID del Comentario (opcional)'],
            'description' => ['type' => 'text', 'label' => 'Descripción'],
            'data' => ['type' => 'date', 'label' => 'Fecha']
        ];
        break;
}

// Procesar el formulario de añadir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar campos obligatorios
    $errors = [];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "El campo '$field' es obligatorio.";
        }
    }

    if (empty($errors)) {
        // Construir la consulta SQL para insertar
        $columns = implode(", ", array_keys($_POST));
        $values = "'" . implode("', '", array_values($_POST)) . "'";
        $insert_query = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($mysqli->query($insert_query)) {
            // Redirigir para evitar reenvío del formulario
            header("Location: manage_table.php?table=$table");
            exit();
        } else {
            $errors[] = "Error al insertar en la base de datos: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Gestionar <?php echo ucfirst($table); ?></title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="agen" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="../plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="../plugins/themify-icons/themify-icons.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="../plugins/venobox/venobox.css">
    <!-- card slider -->
    <link rel="stylesheet" href="../plugins/card-slider/css/style.css">

    <!-- Main Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos personalizados -->
    <style>
        .custom-container {
            max-width: 1400px; /* Ancho personalizado */
            margin: 0 auto; /* Centrar el contenedor */
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            height: 100%; /* Altura fija para todas las cards */
            display: flex;
            flex-direction: column;
        }
        .card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .card-content {
            flex: 1;
            overflow-y: auto; /* Scroll interno si el contenido es muy grande */
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 10px;
        }
        .action-buttons {
            margin-top: auto; /* Empuja los botones hacia abajo */
            display: flex; /* Botones en línea */
            justify-content: flex-end; /* Alinear a la derecha */
            gap: 10px; /* Espacio entre botones */
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Espacio debajo del formulario en móvil/tablet */
        }
    </style>
</head>
<body>
    <!-- page-title -->
    <section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
        <div class="container">
            <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-1 text-white font-weight-bold font-primary">Panel de Administración</h1>
                <h2 class="display-6 text-white font-weight-bold font-primary">Gestiona los contenidos de tu plataforma</h2>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /page-title -->

    <div class="custom-container mt-5">
        <h2 class="text-center mb-4">Gestionar <?php echo ucfirst($table); ?></h2>
        <div class="section-border"></div>

        <!-- Mostrar errores si los hay -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Cards para mostrar los elementos -->
            <div class="col-md-8">
                <div class="row">
                    <?php foreach ($rows as $row): ?>
                        <div class="col-md-6 mb-4"> <!-- 2 cards por fila en PC y Tablet -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">
                                        <?php
                                        // Mostrar el nombre referencial (por ejemplo, el título del curso)
                                        if ($table === 'COURSES') {
                                            echo $row['title'];
                                        } elseif ($table === 'NEWS') {
                                            echo $row['title'];
                                        } elseif ($table === 'USERS') {
                                            echo $row['name'] . ' ' . $row['surname'];
                                        } else {
                                            echo ucfirst($table) . ' #' . $row['id'];
                                        }
                                        ?>
                                    </h5>

                                    <!-- Contenido de la card -->
                                    <div class="card-content">
                                        <?php foreach ($row as $key => $value): ?>
                                            <p class="card-text">
                                                <strong><?php echo ucfirst($key); ?>:</strong>
                                                <span><?php echo $value; ?></span>
                                            </p>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Botones de acción -->
                                    <div class="action-buttons">
                                        <!-- Botón para editar -->
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <!-- Botón para eliminar -->
                                        <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Formulario para añadir o editar -->
            <div class="col-md-4">
                <div class="form-container">
                    <h3><?php echo isset($_GET['edit']) ? 'Editar' : 'Añadir Nuevo'; ?></h3>
                    <form action="#" method="POST">
                        <!-- Campo ID (autocompletado) -->
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $next_id; ?>" readonly>
                        </div>

                        <?php
                        // Generar campos del formulario dinámicamente según la tabla
                        foreach ($form_fields as $field => $field_data): ?>
                            <div class="mb-3">
                                <label for="<?php echo $field; ?>" class="form-label"><?php echo $field_data['label']; ?></label>
                                <input type="<?php echo $field_data['type']; ?>" class="form-control" id="<?php echo $field; ?>" name="<?php echo $field; ?>" <?php echo in_array($field, $required_fields) ? 'required' : ''; ?>>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary">
                            <?php echo isset($_GET['edit']) ? 'Guardar Cambios' : 'Añadir'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Botón para volver al panel de administración -->
        <div class="section-sm text-center mt-4">
            <a href="admin.php" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver al Panel
            </a>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>