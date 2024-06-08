<?php

$connection = new mysqli("localhost", "root", "", "Transport");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $comment = $_POST["comment"];
    $note = $_POST["note"];

    $query = "INSERT INTO reviews (rewiew, note) VALUES ('$comment', $note)";
    if ($connection->query($query) === TRUE) {
        $success_message = 'Отзыв успешно сохранен!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Добавление отзыва - Happy Cargo</title>
</head>
<body>
<div class="container">
    <div class="title">Добавление отзыва</div>
    <?php if(isset($success_message)): ?>
        <p class="success-message"><?= $success_message ?></p>
    <?php else: ?>
        <p>Ошибка при сохранении отзыва</p>
    <?php endif; ?>
    <a href="/phpCode/review.php" class="button">К отзывам</a>
</div>
</body>
</html>
