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
            <img src="path_to_images/<?php echo $user['avatar']; ?>" alt="Avatar" class="avatar">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $user['name'] . ' ' . $user['surname']; ?></h5>
            <p class="card-text"><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p class="card-text"><strong>Edad:</strong> <?php echo $user['age']; ?> años</p>
            <p class="card-text"><strong>Rol:</strong> <?php echo ucfirst($user['rol']); ?></p>
            <p class="card-text"><strong>Fecha de registro:</strong> <?php echo $user['date_register']; ?></p>
        </div>
    </div>
<?php endforeach; ?>