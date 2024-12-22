<?php

session_start();

// Включение отображения ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../DataBase/dBConnetion.php';
require_once __DIR__ . '/../Classes/Order.php';

$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$order = new Order($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение и фильтрация данных из POST-запроса
    $fullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
    $priority = filter_input(INPUT_POST, "priority", FILTER_SANITIZE_STRING);

    // Проверка наличия всех обязательных данных
    if (empty($fullName) || empty($email) || empty($phone) || empty($category) || empty($description) || empty($priority)) {
        exit("Все поля должны быть заполнены.");
    }

    // Получение ID пользователя из сессии
    // чей заказ его айди
    $userId = $_SESSION["user"]["id"];
    // на админа его айди 13 сейчас
    $assignedTo = 13;

    // Создание заказа
    $orderCreated = $order->addOrder($fullName, $email, $phone, $category, $description, $priority, $assignedTo, $userId);

    if ($orderCreated) {
        // Сохраняем данные в сессии
        $_SESSION["order"] = [
            'fullname' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'category' => $category,
            'priority' => $priority,
            'assigned_to' => $assignedTo,
            'created_by' => $userId,
        ];

        // Редирект на страницу заказов
        header("Location: /userprofile/start-user.php");
        exit();
    } else {
        // Ошибка при создании заказа
        exit("Ошибка создания заказа");
    }
}
