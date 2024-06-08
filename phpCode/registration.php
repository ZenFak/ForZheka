<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/registration-style.css">
    <title>Успешная регистрация</title>
</head>
<body>
<?php
$connection = new mysqli("localhost", "root", "", "Transport");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    $query = "INSERT INTO Users (name, login, password) VALUES ('$name', '$login', '$password')";
    if ($connection->query($query) === TRUE) {
        echo '<div class="container">';
        echo 'Анкета успешно сохранена!';
        echo '</div>';
    }
}
?>

<div class="centered-link">
    <a href="/index.html">На главную</a>
</div>
</body>
</html>
