<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/cargo-price.css">
    <title>Расчет стоимости перевозки</title>
</head>
<body>
<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем данные из формы
        $cargoType = $_POST['cargo_type'];
        $distance = $_POST['distance'];

        // Цены за километр в зависимости от типа груза
        $prices = [
            "big" => 45,
            "medium" => 30,
            "small" => 20
        ];

        // Проверяем, что введенные данные корректны
        if (isset($prices[$cargoType]) && is_numeric($distance) && $distance > 0) {
            // Рассчитываем стоимость
            $pricePerKm = $prices[$cargoType];
            $cost = $pricePerKm * $distance;

            // Выводим результат
            echo "<p>Тип груза: " . htmlspecialchars($cargoType) . "</p>";
            echo "<p>Расстояние: " . htmlspecialchars($distance) . " км</p>";
            echo "<p class='result'>Стоимость перевозки: " . htmlspecialchars($cost) . " р</p>";
        } else {
            echo "<p class='error'>Ошибка: Неправильные данные.</p>";
        }
    } else {
        echo "<p class='error'>Ошибка: Неправильный метод запроса.</p>";
    }
    ?>
</div>
<div class="centered-link">
    <a href="/">Главная</a>
</div>
</body>
</html>
