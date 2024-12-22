<?php
session_start();
require_once __DIR__ . '/../../DataBase/dBConnetion.php';
require_once __DIR__ . '/../../Classes/Order.php';
$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$orderClass = new Order($pdo);

$user_id = $_SESSION["user"]["id"];
$status = 'назначен';
$orderClass = $orderClass->getOrdersByStatusAndIdUsers($status, $user_id);
?>

<div class="container">
    <h1 class="mb-4">Мои заказы</h1>
    <div class="row g-4">
        <?php foreach ($orderClass as $item) : ?>
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
                        <?php if ($item['result_order'] == 'в работе'): ?>
                            <strong>Заказ:</strong> <?= $item['result_order'] ?>
                        <?php else: ?>
                            <strong>Заказ:</strong> Выполнен
                            <a href="page/single-page-orders.php?order_id=<?=$item['id']?> ">Проверить </a>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="../../orders/edit-orders.php?order_id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">Редактировать</a>
                        <a href="../../orders/delete-orders.php?order_id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Удалить</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
