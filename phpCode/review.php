<?php
$connection = new mysqli("localhost", "root", "", "Transport");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/review-view-style.css">
    <title>Отзывы - Happy Cargo</title>
</head>
<body>
<div class="container">
    <div class="title">Отзывы</div>
    <div class="navigation">
        <a href="/" class="button">Главная</a>
        <a href="/repository/reviews.html" class="button">Добавить отзыв</a>
    </div>
    <div class="reviews">
        <h2>Все отзывы</h2>
        <?php
        $selectQuery = "SELECT * FROM reviews";
        $result = $connection->query($selectQuery);
        while($row = $result->fetch_assoc()){
            echo "<div class='review'>";
            echo "<h3>Оценка: " . $row["note"] . "</h3>";
            echo "<p>Отзыв: " . $row["rewiew"] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
