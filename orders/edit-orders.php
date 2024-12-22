<?php
session_start();
require_once __DIR__ . '/../DataBase/dBConnetion.php';
require_once __DIR__ . '/../Classes/Order.php';

$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$orderClass = new Order($pdo);

$order = $orderClass->getOrderById($_GET['order_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма для заказа</title>
    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .order-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-family: 'Arial', sans-serif;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Шапка сайта -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../userprofile/page/orders.php=<?=$_GET['order_id'] ?>">Заказ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Форма для заказа -->
<div class="container" id="order-form">
    <h3 class="text-center mb-4">Форма для редактирования заказа</h3>
    <form class="order-form" action="/actions/edit-order.php" method="POST">
        <input type="hidden" name="order_id" value="<?= $order["id"] ?>">

        <!-- ФИО -->
        <div class="mb-3">
            <label for="fullName" class="form-label">ФИО</label>
            <input disabled type="text" class="form-control" id="fullName" value="<?= htmlspecialchars($order["full_name"]) ?>" name="fullName">
        </div>

        <!-- Почта -->
        <div class="mb-3">
            <label for="email" class="form-label">Почта (Указанная при регистрации)</label>
            <input disabled type="email" class="form-control" id="email" value="<?= htmlspecialchars($_SESSION["user"]["email"]) ?>" name="email">
        </div>

        <!-- Телефон -->
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($order["phone_number"]) ?>">
        </div>

        <!-- Выбор категории -->
        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select disabled class="form-select" id="category" name="category">
                <option value="anime" <?= $order["category"] === "anime" ? "selected" : "" ?>>Аниме</option>
                <option value="nature" <?= $order["category"] === "nature" ? "selected" : "" ?>>Природа</option>
                <option value="fantasy" <?= $order["category"] === "fantasy" ? "selected" : "" ?>>Фэнтези</option>
                <option value="portrait" <?= $order["category"] === "portrait" ? "selected" : "" ?>>Портрет</option>
                <option value="others" <?= $order["category"] === "others" ? "selected" : "" ?>>Другое</option>
            </select>
        </div>

        <!-- Описание -->
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?= htmlspecialchars($order["desk"]) ?></textarea>
        </div>

        <!-- Приоритет -->
        <div class="mb-3">
            <label for="priority" class="form-label">Скорость: приоритет</label>
            <select disabled class="form-select" id="priority" name="priority">
                <option value="1" <?= $order["priority"] == 1 ? "selected" : "" ?>>1</option>
                <option value="2" <?= $order["priority"] == 2 ? "selected" : "" ?>>2</option>
                <option value="3" <?= $order["priority"] == 3 ? "selected" : "" ?>>3</option>
            </select>
        </div>

        <!-- Кнопка отправки -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Отправить заказ</button>
        </div>
    </form>
</div>


<!-- Подключение скриптов Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

