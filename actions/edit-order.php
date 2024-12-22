<?php
session_start();
require_once '../DataBase/dBConnetion.php';
require_once '../Classes/Order.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbConnection = new DbConnection();
    $pdo = $dbConnection->getConnection();

    $edit_order = new Order($pdo);

    // Проверка на существование данных
    $order_id = $_POST['order_id'] ?? null;
    $phone = $_POST["phone"] ?? null;
    $description = $_POST["description"] ?? null;

    if ($order_id && $phone && $description) {
        $edit_order->editOrder($phone, $description, $order_id);
        header("Location: /userprofile/start-user.php");
        exit();
    } else {
        die("Заполните все обязательные поля.");
    }
}
?>
