<?php
session_start();
require_once '../DataBase/dBConnetion.php';
require_once '../Classes/Order.php';

$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();

$edit_order = new Order($pdo);

// Проверка на существование данных
$order_id = $_GET['order_id'] ?? null;

if ($order_id) {
    $edit_order->deleteOrder($order_id);
    header("Location: /userprofile/start-user.php");
    exit();
}


