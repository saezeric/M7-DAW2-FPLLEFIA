<?php
session_start();
require_once("../config.php");

// Verificar si el usuario está logueado y tiene rol de administrador
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: ../login.php");
    exit();
} elseif ($_SESSION['user_rol'] !== 'admin') {
    // Si no es administrador, mostrar un mensaje de error y no cargar el contenido
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Panel Admin</title>

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

    <!-- panel de administración -->
    <section class="section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>Gestionar Contenidos</h2>
            <div class="section-border"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=COMMENTS'">
              <div class="card-body">
                <h5 class="card-title">Comentarios</h5>
                <p class="card-text">Gestiona los comentarios de los usuarios.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=COURSES'">
              <div class="card-body">
                <h5 class="card-title">Cursos</h5>
                <p class="card-text">Administra los cursos disponibles.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=FAQS'">
              <div class="card-body">
                <h5 class="card-title">FAQs</h5>
                <p class="card-text">Gestiona las preguntas frecuentes.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=NEWS'">
              <div class="card-body">
                <h5 class="card-title">Noticias</h5>
                <p class="card-text">Administra las noticias publicadas.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=TESTIMONIALS'">
              <div class="card-body">
                <h5 class="card-title">Testimonios</h5>
                <p class="card-text">Gestiona los testimonios de los usuarios.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 hover-shadow" onclick="window.location.href='manage_table.php?table=USERS'">
              <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">Administra los usuarios registrados.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /panel de administración -->

    <!-- Botón de volver a la página principal -->
    <div class="section-sm container text-center">
        <a href="../index.php" class="btn btn-primary">Volver a la Página Principal</a>
    </div>

</body>
</html>