<?php
session_start();
require_once("config.php");
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>MYAI</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="agen" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="plugins/venobox/venobox.css">
    <!-- card slider -->
    <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>

    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark align-items-center">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Agen" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Cursos 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="works.php">Portfolio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Cursos 2</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="team.php">Profesores</a>
                            <a class="dropdown-item" href="team-single.php">Profesores 1</a>
                            <a class="dropdown-item" href="career.php">Cursos 3</a>
                            <a class="dropdown-item" href="blog-single.php">Página de Notícia</a>
                            <a class="dropdown-item" href="pricing.php">Cursos 4</a>
                            <a class="dropdown-item" href="faqs.php">FAQ's</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contacto</a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item dropdown">
                            <!-- La imagen de perfil actuará como disparador del dropdown -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="imagen-perfil" src="<?= $_SESSION['user_avatar'] ?>"
                                    alt="Avatar del usuario" style="width:75px; height: 75px; border-radius:100%; object-fit: cover;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header">Hola, <?= $_SESSION['user_name'] ?></h6>
                                <?php if ($_SESSION['user_rol'] === 'admin'): ?>
                                    <a class="dropdown-item" href="admin.php">Panel de Administración</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>