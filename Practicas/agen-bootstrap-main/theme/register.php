<?php
session_start();
require_once('config.php');

// 0. COMPROBAR SI EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. RECOGER DATOS DEL FORMULARIO
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = $_POST['avatar'];
    $age = $_POST['age'];

    // 2. CIFRAR LA PASSWORD CON PASSWORD HASH
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // 3. PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (name, surname, email, avatar, password, rol, age, date_register) VALUES (?,?,?,?,?, 'user', ?, NOW())"
    );

    // 4. COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt) {
        die('Error en la preparacion: ' . $mysqli->error);
    }

    //5. BINDEAR LOS PARAMETROS
    $stmt->bind_param("sssssi", $name, $surname, $email, $avatar, $passwordHashed, $age);

    if ($stmt->execute()) {
        $success = "Usuario registrado correctamente";
    } else {
        $error = "Error al registrar el usuario";
    }

    // 7. CERRAR LA CONEXION
    $stmt->close();
    $mysqli->close();
};
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - MyAI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .register-container h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control {
            margin-bottom: 1rem;
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Registro</h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if (isset($success)): ?>
            <div class="success-message"><?= $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="error-message"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar (URL)</label>
                <input type="text" class="form-control" id="avatar" name="avatar">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <!-- Enlace para iniciar sesión y volver al inicio -->
        <div class="text-center mt-3">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
            <a href="index.php" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, solo si necesitas funcionalidades JS de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>