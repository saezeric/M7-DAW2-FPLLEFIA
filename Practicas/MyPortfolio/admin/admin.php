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
            <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap' rel='stylesheet'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body, html {height: 100%; margin: 0; font-family: 'Montserrat', sans-serif;}
                .centered {display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(135deg, #1a0b2e 0%, #3a1d6e 100%);}
                .error-box {padding: 40px; background: rgba(255,255,255,0.95); border-radius: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.2); text-align: center; max-width: 500px; width: 90%;}
                h1 {color: #1a0b2e; font-weight: 600; margin-bottom: 20px;}
                .btn-primary {background-color: #6e3aff; border: none; padding: 10px 25px; border-radius: 50px; font-weight: 600; transition: all 0.3s;}
                .btn-primary:hover {background-color: #5a2ad4; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(110, 58, 255, 0.3);}
            </style>
        </head>
        <body>
            <div class='centered'>
                <div class='error-box'>
                    <h1>Acceso Denegado</h1>
                    <p class='mb-4'>No tienes permisos para acceder a esta página.</p>
                    <a href='../index.php' class='btn btn-primary'>Volver al Inicio</a>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a0b2e;
            --secondary-color: #6e3aff;
            --accent-color: #ff4d8d;
            --light-color: #f0e6ff;
            --dark-color: #0d0519;
            --card-bg: rgba(255, 255, 255, 0.08);
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--dark-color) 100%);
            font-family: 'Poppins', sans-serif;
            color: white;
            min-height: 100vh;
        }

        .admin-header {
            background: rgba(26, 11, 46, 0.8);
            backdrop-filter: blur(10px);
            padding: 2rem 0;
            text-align: center;
            border-bottom: 1px solid rgba(110, 58, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }

        .admin-header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(90deg, #fff 0%, #b69eff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .admin-header p {
            margin: 0;
            font-size: 1.1rem;
            opacity: 0.9;
            color: var(--light-color);
        }

        .btn-logout {
            background: rgba(255, 77, 141, 0.15);
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-home {
            background: rgba(110, 58, 255, 0.15);
            color: var(--secondary-color);
            border: 1px solid var(--secondary-color);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-logout:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 77, 141, 0.4);
            text-decoration: none;
        }

        .btn-home:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(110, 58, 255, 0.4);
            text-decoration: none;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .card-link {
            display: block;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(110, 58, 255, 0.2);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            height: 100%;
            color: white;
            position: relative;
            z-index: 1;
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

        .card-link:hover .card {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            border-color: rgba(110, 58, 255, 0.4);
        }

        .card-link:hover .card::before {
            opacity: 1;
        }

        .card-link:hover .card-icon {
            color: var(--accent-color);
            transform: scale(1.1);
        }

        .card-body {
            padding: 2rem;
            text-align: center;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }

        .card-text {
            font-size: 0.95rem;
            opacity: 0.8;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            transition: all 0.3s ease;
        }

        .main-container {
            padding-bottom: 4rem;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer {
            background: rgba(13, 5, 25, 0.8);
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 3rem;
            border-top: 1px solid rgba(110, 58, 255, 0.2);
        }

        @media (max-width: 768px) {
            .admin-header h1 {
                font-size: 2rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .button-group {
                flex-direction: column;
                align-items: center;
            }

            .btn-home,
            .btn-logout {
                margin-right: 0;
                margin-bottom: 10px;
                width: 100%;
                max-width: 200px;
            }
        }
    </style>
</head>

<body>
    <!-- Header del Admin Panel -->
    <header class="admin-header">
        <div class="container">
            <div class="glass-effect px-4 py-3 d-inline-block">
                <h1>Panel de Administración</h1>
                <p>Gestiona los contenidos de tu plataforma</p>
            </div>
            <div class="mt-4 button-group">
                <a href="../index.php" class="btn btn-home">
                    <i class="fas fa-home me-2"></i>Volver al Inicio
                </a>
                <a href="../logout.php" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                </a>
            </div>
        </div>
    </header>

    <!-- Sección de gestión -->
    <main class="container main-container my-5">
        <div class="row g-4">
            <!-- Experiencia Laboral -->
            <div class="col-md-4 col-sm-6">
                <a href="manage_table.php?table=EXPERIENCE" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <h5 class="card-title">Experiencia Laboral</h5>
                            <p class="card-text">Gestiona tu experiencia profesional y logros destacados.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Proyectos -->
            <div class="col-md-4 col-sm-6">
                <a href="manage_table.php?table=PROJECTS" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <h5 class="card-title">Proyectos</h5>
                            <p class="card-text">Administra los proyectos realizados y sus detalles.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Noticias -->
            <div class="col-md-4 col-sm-6">
                <a href="manage_table.php?table=NEWS" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h5 class="card-title">Noticias</h5>
                            <p class="card-text">Gestiona las noticias publicadas y su visibilidad.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Blog -->
            <div class="col-md-4 col-sm-6">
                    <a href="manage_table.php?table=COMMENTS" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <h5 class="card-title">COMMENTS</h5>
                            <p class="card-text">Administra los comentarios de tus noticias.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Usuarios -->
            <div class="col-md-4 col-sm-6">
                <a href="manage_table.php?table=USERS" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">Gestiona los usuarios registrados y sus permisos.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Cualificaciones (Nueva tarjeta) -->
            <div class="col-md-4 col-sm-6">
                <a href="manage_table.php?table=QUALIFICATIONS" class="card-link">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h5 class="card-title">Cualificaciones</h5>
                            <p class="card-text">Administra tus títulos académicos y formaciones.</p>
                            <div class="text-accent mt-3">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>