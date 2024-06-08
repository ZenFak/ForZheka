<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/login-style.css">
    <title>Добро пожаловать</title>
</head>
<body>
<?php

$nameUser = null;

$connection = new mysqli("localhost", "root", "", "Transport");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST["login"];
    $password = $_POST["password"];
}

$selectQuery = "SELECT * FROM Users WHERE login='$login' AND password='$password'";
$result = $connection->query($selectQuery);
while($row = $result->fetch_assoc()){
    $nameUser = $row["name"];
    echo "<div class='container'>";
    echo "<h1>Добро пожаловать, ".$nameUser."</h1>";
    echo "</div>";
}

?>
<div class="centered-link">
    <a href="/index.html">На главную</a>
</div>
</body>
</html>
