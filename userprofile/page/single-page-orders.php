<?php
session_start();
require_once __DIR__ . '/../../DataBase/dBConnetion.php';
require_once __DIR__ . '/../../Classes/Order.php';
// Создаем подключение к базе данных
$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$orderClass = new Order($pdo);

// Получаем ID пользователя из сессии
$user_id = $_SESSION["user"]["id"];

// Получаем список заказов

$status = 'Назначен';
$orders = $orderClass->getOrdersIdUsers($user_id);
//$orders = $orderClass->getOrdersByStatusAndIdUsers($status, $user_id);
echo '<pre>';
var_dump($orders);
echo '</pre>';
// Обрабатываем форму
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['order_id'])) {
    $status = 'Выполнен';
    $order_id = $_GET['order_id'];

    // Обновляем статус заказа
    $orderClass->getEndStatus($order_id, $status);

    // Перенаправление для предотвращения повторной отправки формы
    header("Location: ../start-user.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mb-4">Мои заказы</h1>
    <div class="row g-4">
        <?php if ($orders[0]['status'] === 'Назначен') : ?>
            <?php foreach ($orders as $item) : ?>
                <div class="col-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Заказ номер : <?= htmlspecialchars($item['id']) ?></h3>
                            <h5 class="card-title">Ваше имя : <?= htmlspecialchars($item['full_name']) ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?= htmlspecialchars($item['email']) ?><br>
                                <strong>Телефон:</strong> <?= htmlspecialchars($item['phone_number']) ?><br>
                                <strong>Категория:</strong> <?= htmlspecialchars($item['category']) ?><br>
                                <strong>Описание:</strong> <?= htmlspecialchars($item['desk']) ?><br>
                                <strong>Статус:</strong> <?= htmlspecialchars($item['status']) ?><br>
                                <strong>Приоритет:</strong> <?= htmlspecialchars($item['priority']) ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <form action="single-page-orders.php?order_id=<?= $item['id'] ?>" method="post">
                                <button>Закрыть заказ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="width: 18rem;">
                        <img src="/uploads/<?php echo($item['result_order']); ?>" class="card-img-top" alt="...">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php foreach ($orders as $item) : ?>
                <div class="col-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Заказ номер : <?= htmlspecialchars($item['id']) ?></h3>
                            <h5 class="card-title">Ваше имя : <?= htmlspecialchars($item['full_name']) ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?= htmlspecialchars($item['email']) ?><br>
                                <strong>Телефон:</strong> <?= htmlspecialchars($item['phone_number']) ?><br>
                                <strong>Категория:</strong> <?= htmlspecialchars($item['category']) ?><br>
                                <strong>Описание:</strong> <?= htmlspecialchars($item['desk']) ?><br>
                                <strong>Статус:</strong> <?= htmlspecialchars($item['status']) ?><br>
                                <strong>Приоритет:</strong> <?= htmlspecialchars($item['priority']) ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <form action="single-page-orders.php?order_id=<?= $item['id'] ?>" method="post">
                                <button>Закрыть заказ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="width: 18rem;">
                        <img src="/uploads/<?php echo($item['result_order']); ?>" class="card-img-top" alt="...">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
