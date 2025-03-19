<!-- Recuerda que este codigo debe de ir adaptado tambien a edit-user -->
<?php
require_once '../../config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM TESTIMONIALS WHERE id = $id");

$testimonial = $result->fetch_assoc();

print_r($testimonial);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $mysqli->$_POST['name'];
    $surname = $mysqli->$_POST['surname'];
    $description = $mysqli->$_POST['description'];
    $rating = $mysqli->$_POST['rating'];
}

$query = "UPDATE TESTIMONIALS SET name = ?, surname = ?, description = ?, rating = ? WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssssi", $name, $surname, $description, $rating, $id);
$stmt->execute();

header("Location: ../adminPanel.php");
exit();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit testimonial</title>
</head>

<body>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $testimonial['name'] ?>" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="<?= $testimonial['surname'] ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= $testimonial['description'] ?></textarea>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" value="<?= $testimonial['rating'] ?>" min="1" max="5" required>

        <input type="submit" value="Update Testimonial">
    </form>
</body>

</html>