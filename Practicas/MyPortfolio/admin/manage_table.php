<?php
session_start();
require_once("../config.php");

// Verificación de sesión y rol de administrador
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
} elseif ($_SESSION['user_rol'] !== 'admin') {
    die("
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Acceso Denegado</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap' rel='stylesheet'>
            <style>
                body, html { height: 100%; margin: 0; font-family: 'Montserrat', sans-serif; }
                .centered-container { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(135deg, #1a0b2e 0%, #3a1d6e 100%); }
                .error-message { text-align: center; max-width: 600px; padding: 40px; background: rgba(255,255,255,0.95); border-radius: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.2); }
                h1 { color: #1a0b2e; font-weight: 600; margin-bottom: 20px; }
                .btn-primary { background-color: #6e3aff; border: none; padding: 10px 25px; border-radius: 50px; font-weight: 600; transition: all 0.3s; }
                .btn-primary:hover { background-color: #5a2ad4; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(110,58,255,0.3); }
            </style>
        </head>
        <body>
            <div class='centered-container'>
                <div class='error-message'>
                    <h1>Acceso Denegado</h1>
                    <p>No tienes permisos para acceder a esta página.</p>
                    <a href='../index.php' class='btn btn-primary'>Volver al Inicio</a>
                </div>
            </div>
        </body>
        </html>
    ");
}

// Obtener el nombre de la tabla desde la URL y convertir a mayúsculas
if (!isset($_GET['table'])) {
    die("Tabla no especificada.");
}
$table = strtoupper($_GET['table']);

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

// Consultar todos los registros de la tabla
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
        // Asegúrate de incluir 'password' en required_fields
        $required_fields = ['first_name', 'last_name', 'email', 'role', 'password'];
    
        $form_fields = [
            'first_name' => ['type' => 'text', 'label' => 'Nombre'],
            'last_name'  => ['type' => 'text', 'label' => 'Apellido'],
            'email'      => ['type' => 'email', 'label' => 'Correo Electrónico'],
            'password'   => ['type' => 'password', 'label' => 'Contraseña'],
            'role'       => [
                'type' => 'select',
                'label' => 'Rol',
                'options' => ['admin' => 'Administrador', 'user' => 'Usuario']
            ],
            'avatar'     => ['type' => 'file', 'label' => 'Avatar']
        ];
        break;    
    case 'EXPERIENCE':
        $required_fields = ['job_title', 'company', 'start_date', 'job_responsibilities'];
        $form_fields = [
            'job_title'            => ['type' => 'text', 'label' => 'Puesto de trabajo'],
            'company'              => ['type' => 'text', 'label' => 'Empresa'],
            'start_date'           => ['type' => 'date', 'label' => 'Fecha de inicio'],
            'end_date'             => ['type' => 'date', 'label' => 'Fecha de fin'],
            'job_responsibilities' => ['type' => 'textarea', 'label' => 'Responsabilidades']
        ];
        break;
    case 'PROJECTS':
        $required_fields = ['project_title', 'url', 'short_description'];
        $form_fields = [
            'project_title'      => ['type' => 'text', 'label' => 'Título del proyecto'],
            'url'                => ['type' => 'text', 'label' => 'URL del proyecto'],
            'repository'         => ['type' => 'text', 'label' => 'Repositorio'],
            'deployment_link'    => ['type' => 'text', 'label' => 'Enlace de despliegue'],
            'short_description'  => ['type' => 'textarea', 'label' => 'Descripción corta'],
            'detail_title1'      => ['type' => 'text', 'label' => 'Título detalle 1'],
            'detail_description1'=> ['type' => 'textarea', 'label' => 'Descripción detalle 1'],
            'detail_title2'      => ['type' => 'text', 'label' => 'Título detalle 2'],
            'detail_description2'=> ['type' => 'textarea', 'label' => 'Descripción detalle 2'],
            'image'              => ['type' => 'file', 'label' => 'Imagen del proyecto']
        ];
        break;
    case 'NEWS':
        $required_fields = ['title', 'short_description', 'publication_date'];
        $form_fields = [
            'title'               => ['type' => 'text', 'label' => 'Título'],
            'short_description'   => ['type' => 'textarea', 'label' => 'Descripción corta'],
            'detail_title1'       => ['type' => 'text', 'label' => 'Título detalle 1'],
            'detail_description1' => ['type' => 'textarea', 'label' => 'Descripción detalle 1'],
            'detail_title2'       => ['type' => 'text', 'label' => 'Título detalle 2'],
            'detail_description2' => ['type' => 'textarea', 'label' => 'Descripción detalle 2'],
            'publication_date'    => ['type' => 'date', 'label' => 'Fecha de publicación'],
            'image'               => ['type' => 'file', 'label' => 'Imagen']
        ];
        break;
    case 'COMMENTS':
        $required_fields = ['user_id', 'news_id', 'comment_text'];
        $form_fields = [
            'user_id'          => ['type' => 'number', 'label' => 'ID de usuario'],
            'news_id'          => ['type' => 'number', 'label' => 'ID de noticia'],
            'parent_comment_id'=> ['type' => 'number', 'label' => 'ID comentario padre (opcional)'],
            'comment_text'     => ['type' => 'textarea', 'label' => 'Texto del comentario']
        ];
        break;
    case 'QUALIFICATIONS':
        $required_fields = ['degree_title', 'institution', 'start_date'];
        $form_fields = [
            'degree_title'     => ['type' => 'text', 'label' => 'Título'],
            'institution'      => ['type' => 'text', 'label' => 'Institución'],
            'start_date'       => ['type' => 'date', 'label' => 'Fecha de inicio'],
            'end_date'         => ['type' => 'date', 'label' => 'Fecha de fin'],
            'description'      => ['type' => 'textarea', 'label' => 'Descripción'],
            'learned_contents' => ['type' => 'textarea', 'label' => 'Contenidos aprendidos']
        ];
        break;
    default:
        die("Tabla no soportada.");
}

// Procesar el formulario al enviar
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Primero procesar campos tipo file
    foreach ($form_fields as $field => $field_data) {
        if (isset($field_data['type']) && $field_data['type'] === 'file') {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES[$field]['tmp_name'];
                $fileName = $_FILES[$field]['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'avif', 'webp', 'jfif'];
                if (in_array($fileExtension, $allowedExtensions)) {
                    // Definir carpeta destino según la tabla
                    switch ($table) {
                        case 'USERS': $uploadDir = './uploads/avatars/'; break;
                        case 'PROJECTS': $uploadDir = './uploads/projects/'; break;
                        case 'NEWS': $uploadDir = './uploads/news/'; break;
                        case 'EXPERIENCE': $uploadDir = './uploads/experience/'; break;
                        case 'QUALIFICATIONS': $uploadDir = './uploads/qualifications/'; break;
                        case 'COMMENTS': $uploadDir = './uploads/comments/'; break;
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
                // En edición conservar el valor anterior; en añadir, dejar vacío
                $_POST[$field] = $edit_mode ? $edit_data[$field] : "";
            }
        }
    }
    
    // Validar campos obligatorios (para USERS, la contraseña se omite en edición)
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
                    if (empty($value)) {
                        continue;
                    } else {
                        $value = password_hash($value, PASSWORD_DEFAULT);
                    }
                }
                $escaped_value = $mysqli->real_escape_string($value);
                $update_parts[] = "$key = '$escaped_value'";
            }
            $update_sql = "UPDATE $table SET " . implode(", ", $update_parts) . " WHERE id = " . intval($edit_data['id']);
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
                $escaped_value = $mysqli->real_escape_string($value);
                $values_arr[] = "'" . $escaped_value . "'";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar <?= ucfirst($table); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a0b2e;
            --secondary-color: #6e3aff;
            --accent-color: #ff4d8d;
            --light-color: #f0e6ff;
            --dark-color: #0d0519;
            --card-bg: rgba(255, 255, 255, 0.08);
            --form-bg: rgba(255, 255, 255, 0.05);
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--dark-color) 100%);
            font-family: 'Poppins', sans-serif;
            color: white;
            min-height: 100vh;
        }
        
        .page-title {
            background: rgba(26, 11, 46, 0.8);
            backdrop-filter: blur(10px);
            padding: 2rem 0;
            text-align: center;
            border-bottom: 1px solid rgba(110, 58, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }
        
        .page-title h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(90deg, #fff 0%, #b69eff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        
        .page-title h2 {
            margin: 0;
            font-size: 1.5rem;
            opacity: 0.9;
            color: var(--light-color);
        }
        
        .custom-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .section-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
            background: linear-gradient(90deg, #fff 0%, #b69eff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .section-border {
            height: 4px;
            width: 80px;
            background: var(--secondary-color);
            margin: 1rem auto 3rem;
            border-radius: 2px;
        }
        
        .card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(110, 58, 255, 0.2);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            color: white;
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(110, 58, 255, 0.1) 0%, rgba(255, 77, 141, 0.05) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            border-color: rgba(110, 58, 255, 0.4);
        }
        
        .card:hover::before {
            opacity: 1;
        }
        
        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: var(--light-color);
            border-bottom: 1px solid rgba(110, 58, 255, 0.3);
            padding-bottom: 0.75rem;
            margin-bottom: 1rem;
        }
        
        .card-content {
            max-height: 150px;
            overflow-y: auto;
            padding-right: 10px;
        }
        
        .card-content p {
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .card-content strong {
            color: var(--secondary-color);
        }
        
        .form-container {
            background: var(--form-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(110, 58, 255, 0.2);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        .form-container h3 {
            font-family: 'Montserrat', sans-serif;
            color: white;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-label {
            color: var(--light-color);
            font-weight: 500;
        }
        
        .form-control, .form-select, .form-textarea {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(110, 58, 255, 0.3);
            color: white;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }
        
        .form-control:focus, .form-select:focus, .form-textarea:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary-color);
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(110, 58, 255, 0.25);
        }
        
        textarea.form-textarea {
            min-height: 100px;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }
        
        .btn-primary:hover {
            background-color: #5a2ad4;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(110, 58, 255, 0.4);
        }
        
        .btn-warning {
            background-color: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid #ffc107;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background-color: #ffc107;
            color: var(--dark-color);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
            border: 1px solid #dc3545;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-back {
            background-color: rgba(108, 117, 125, 0.15);
            color: #6c757d;
            border: 1px solid #6c757d;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 2rem;
        }
        
        .btn-back:hover {
            background-color: #6c757d;
            color: white;
            transform: translateY(-2px);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            backdrop-filter: blur(10px);
            color: white;
            border-radius: 12px;
        }
        
        .modal-content {
            background: var(--primary-color);
            border: 1px solid rgba(110, 58, 255, 0.3);
            border-radius: 16px;
            color: white;
        }
        
        .modal-header {
            border-bottom: 1px solid rgba(110, 58, 255, 0.3);
        }
        
        .modal-footer {
            border-top: 1px solid rgba(110, 58, 255, 0.3);
        }
        
        .btn-close {
            filter: invert(1);
        }
        
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2rem;
            }
            
            .page-title h2 {
                font-size: 1.2rem;
            }
            
            .custom-container {
                padding: 1.5rem;
            }
        }
        
        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #5a2ad4;
        }

        /* Ajustes para evitar que el formulario se deforme */
        .col-lg-4 {
        /* Limitar el ancho máximo de la columna que contiene el formulario */
        max-width: 450px;
        }

        /* Asegurar que los inputs y selects no crezcan más allá del contenedor */
        .form-container form .form-control,
        .form-container form .form-select,
        .form-container form .form-textarea {
        width: 100%;  /* Para que no sobrepasen el ancho del contenedor */
        box-sizing: border-box;
        }

        /* Controlar la altura mínima y permitir redimensionar verticalmente */
        textarea.form-textarea {
        min-height: 80px;   /* Altura mínima */
        max-height: 200px;  /* Opcional, por si quieres un límite superior */
        resize: vertical;   /* Permite agrandar verticalmente si se necesita */
        }

        /* Estilos para validación personalizada */
        .is-invalid {
            border: 2px solid #dc3545 !important;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.25rem;
            display: none;
        }
        .is-invalid + .invalid-feedback {
            display: block;
        }


    </style>
</head>
<body>
    <!-- Título de la página con fondo -->
    <section class="page-title position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-1 font-weight-bold">Panel de Administración</h1>
                    <h2 class="display-6 font-weight-bold">Gestionar <?= ucfirst($table); ?></h2>
                </div>
            </div>
        </div>
    </section>
    <div class="custom-container mt-5">
        <h2 class="section-title"><?= ucfirst($table); ?></h2>
        <div class="section-border"></div>
        
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <div class="row">
            <!-- Listado de registros -->
            <div class="col-lg-8">
                <div class="row">
                    <?php if (is_array($rows) && count($rows) > 0): ?>
                        <?php foreach ($rows as $row): ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php
                                            if ($table === 'PROJECTS' || $table === 'NEWS') {
                                                echo $row['title'] ?? $row['project_title'] ?? 'Sin título';
                                            } elseif ($table === 'USERS') {
                                                echo ($row['first_name'] ?? '') . ' ' . ($row['last_name'] ?? '');
                                            } elseif ($table === 'EXPERIENCE') {
                                                echo ($row['job_title'] ?? '') . " - " . ($row['company'] ?? '');
                                            } elseif ($table === 'QUALIFICATIONS') {
                                                echo $row['degree_title'] ?? 'Sin título';
                                            } elseif ($table === 'COMMENTS') {
                                                echo "Comentario #" . ($row['id'] ?? '');
                                            } else {
                                                echo ucfirst($table) . ' #' . ($row['id'] ?? '');
                                            }
                                            ?>
                                        </h5>
                                        <div class="card-content">
                                            <?php foreach ($row as $key => $value): ?>
                                                <p class="card-text"><strong><?= ucfirst(str_replace('_', ' ', $key)); ?>:</strong> <span><?= $value; ?></span></p>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="manage_table.php?table=<?= $table; ?>&edit=<?= $row['id'] ?? ''; ?>" class="btn btn-warning btn-sm me-2">
                                                <i class="fas fa-edit me-1"></i> Editar
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id'] ?? ''; ?>)">
                                                <i class="fas fa-trash me-1"></i> Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info">
                                No se encontraron registros en esta tabla.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Formulario (Añadir / Editar) -->
            <div class="col-lg-4">
                <div class="form-container">
                    <h3><?= $edit_mode ? 'Editar Registro' : 'Añadir Nuevo'; ?></h3>
                    <form novalidate action="manage_table.php?table=<?= $table; ?><?= $edit_mode ? "&edit=" . $edit_data['id'] : ""; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= $next_id; ?>" readonly>
                            <div class="invalid-feedback"></div>
                        </div>

                        <?php
                        // Para la tabla COMMENTS, user_id se obtiene de la sesión
                        if ($table === 'COMMENTS') {
                            echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';
                        }

                        foreach ($form_fields as $field => $field_data):
                            // Omitir el campo user_id en COMMENTS si ya se ha agregado como oculto
                            if ($table === 'COMMENTS' && $field === 'user_id') {
                                continue;
                            }
                        
                            // Determinar si es obligatorio
                            $is_required = in_array($field, $required_fields);
                            if ($table === 'USERS' && $field === 'password' && $edit_mode) {
                                $is_required = false;
                            }
                        
                            // Obtener el valor actual (si estamos en modo edición)
                            $value = "";
                            if ($edit_mode && isset($edit_data[$field]) && !($table === 'USERS' && $field === 'password')) {
                                $value = $edit_data[$field];
                            }
                        ?>
                            <div class="mb-3">
                                <label for="<?= $field; ?>" class="form-label"><?= $field_data['label']; ?></label>
                                <?php if ($field_data['type'] === 'select'): ?>
                                    <select class="form-select" id="<?= $field; ?>" name="<?= $field; ?>" <?= $is_required ? 'required' : ''; ?>>
                                        <?php foreach ($field_data['options'] as $optValue => $optLabel): ?>
                                            <option value="<?= $optValue; ?>" <?= ($value === $optValue) ? 'selected' : ''; ?>>
                                                <?= $optLabel; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php elseif ($field_data['type'] === 'textarea'): ?>
                                    <textarea class="form-textarea" id="<?= $field; ?>" name="<?= $field; ?>" <?= $is_required ? 'required' : ''; ?>><?= htmlspecialchars($value); ?></textarea>
                                <?php elseif ($field_data['type'] === 'file'): ?>
                                    <input type="file" class="form-control" id="<?= $field; ?>" name="<?= $field; ?>" <?= $is_required ? 'required' : ''; ?>>
                                <?php else: ?>
                                    <input type="<?= $field_data['type']; ?>" class="form-control" id="<?= $field; ?>" name="<?= $field; ?>"
                                           <?= ($field_data['type'] !== 'file') ? 'value="' . htmlspecialchars($value) . '"' : '' ?>
                                           <?= $is_required ? 'required' : ''; ?>
                                           <?= isset($field_data['step']) ? "step='{$field_data['step']}'" : ""; ?>>
                                <?php endif; ?>
                                <!-- Elemento para mensaje de error -->
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php endforeach; ?>                        

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-<?= $edit_mode ? 'save' : 'plus'; ?> me-2"></i>
                            <?= $edit_mode ? 'Guardar Cambios' : 'Añadir'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="admin.php" class="btn btn-back">
                <i class="fas fa-arrow-left me-2"></i> Volver al Panel
            </a>
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
                    ¿Estás seguro de que deseas eliminar este registro? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        <i class="fas fa-trash me-1"></i> Eliminar
                    </button>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                let valid = true;
                // Selecciona todos los elementos requeridos dentro del formulario
                const requiredInputs = form.querySelectorAll('[required]');
                requiredInputs.forEach(input => {
                    input.classList.remove('is-invalid');
                    // Si el campo no es válido, añade la clase is-invalid
                    if (!input.checkValidity()) {
                        valid = false;
                        input.classList.add('is-invalid');
                    }
                });
                if (!valid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });

            // Al cambiar el contenido, quitar la clase de error si es válido
            const requiredInputs = form.querySelectorAll('[required]');
            requiredInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                    }
                });
            });
        });
    </script>
</body>
</html>
