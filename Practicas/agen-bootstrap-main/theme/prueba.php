<?php
require_once "config.php";
$result = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC");
print_r($result);

// Lo convertimos en un array asociativo para poder manejar los datos facilmente y mostralos en el futuro
$users = $result->fetch_all(MYSQLI_ASSOC);
echo "<pre>";
print_r($users);
echo "</pre>";

foreach ($users as $user): ?>
    <div class="card">
        <div class="card-header">
            <img src="path_to_images/<?= $user['avatar']; ?>" alt="Avatar" class="avatar">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $user['name'] . ' ' . $user['surname']; ?></h5>
            <p class="card-text"><strong>Email:</strong> <?= $user['email']; ?></p>
            <p class="card-text"><strong>Edad:</strong> <?= $user['age']; ?> años</p>
            <p class="card-text"><strong>Rol:</strong> <?= ucfirst($user['rol']); ?></p>
            <p class="card-text"><strong>Fecha de registro:</strong> <?= $user['date_register']; ?></p>
        </div>
    </div>
<?php endforeach; ?>