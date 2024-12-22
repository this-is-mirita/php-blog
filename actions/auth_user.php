<?php
session_start();
require_once '../DataBase/dBConnetion.php';
require_once '../Classes/User.php';
$dbConnection = new DbConnection();

$pdo = $dbConnection->getConnection();

$user = new User($pdo);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"]; // Введенный пароль

    // Попытка входа
    $userData = $user->login($username, $password);

    if ($userData) {
        // Сохраняем данные в сессию
        $_SESSION["user"] = [
            'id' => $userData['id'],
            'username' => $userData['username']
        ];

        // Редирект на главную страницу
        header("Location: /");
        exit();
    } else {
        // Ошибка авторизации
        exit("Username or password is incorrect");
    }
}
