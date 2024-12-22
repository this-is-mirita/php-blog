<?php
session_start();
require_once '../Database/DbConnetion.php';
require_once '../Classes/User.php';

$dbConnection = new DbConnection();

$pdo = $dbConnection->getConnection();

$user = new User($pdo);

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Валидация данных
    $validationResult = $user->validate([
        'username' => $username,
        'password' => $password,
        'email' => $email
    ]);

    if ($validationResult === true) {
        // Регистрация пользователя
        $message = $user->register($username, $password, $email);
        $id = $user->getId($username);
        $_SESSION["user"] = [
            'id' => $id,
            'username' => $username,
            'email' => $email
        ];
    } else {
        $message = $validationResult;  // Если валидация не прошла, выводим ошибку
    }
    // Редирект на главную страницу
    header("Location: /");
    exit();
}
