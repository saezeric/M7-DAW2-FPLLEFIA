<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // 2. GUARDAMOS DATOS DEL FORMULARIO EN VARIABLES

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    // 3. EJECUTAR LA CONSULTA
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");

    // 4. COMPROBAR SI HAY RESULTADOS
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // 5. COMPROBAR SI LA CONTRASEÑA ES CORRECTA
        if (password_verify($password, $user['password'])) {
            // 6. INICIAR SESION
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_age'] = $user['age'];
            $_SESSION['user_job'] = $user['job'];
            header('Location: index.php');
            exit;
        } else {
            echo "Contraseña incorrecta";
        }

        // REDIRIGIR A INDEX
        header('Location: index.php');
    } else {
        echo "Usuario no encontrado";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Inicio de Sesión</h1>
    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Constraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Registrate">
    </form>
</body>

</html>