<?php
session_start();
require_once __DIR__ . '/../../DataBase/dBConnetion.php';
require_once __DIR__ . '/../../Classes/Order.php';
$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$orderClass = new Order($pdo);
$orderClass2 = new Order($pdo);

$user_id = $_SESSION["user"]["id"];
$status = 'Назначен';
//$orderClass = $orderClass->getOrdersIdUsers($user_id);
$orderClass = $orderClass->getOrdersByStatusAndIdUsers($status,$user_id);

?>

<div class="container mt-4">
    <div class="row">
        <!-- Активные заказы -->
        <div class="col-md-6">
            <h2 class="mb-4">Активные заказы</h2>
            <div class="row row-cols-1 g-4">
                <?php foreach ($orderClass as $item) : ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Заказ № <?= htmlspecialchars($item['id']) ?></h5>
                                <p class="card-text">
                                    <strong>Имя:</strong> <?= htmlspecialchars($item['full_name']) ?><br>
                                    <strong>Email:</strong> <?= htmlspecialchars($item['email']) ?><br>
                                    <strong>Телефон:</strong> <?= htmlspecialchars($item['phone_number']) ?><br>
                                    <strong>Категория:</strong> <?= htmlspecialchars($item['category']) ?><br>
                                    <strong>Описание:</strong> <?= htmlspecialchars($item['desk']) ?><br>
                                    <strong>Статус:</strong> <?= htmlspecialchars($item['status']) ?><br>
                                    <strong>Приоритет:</strong> <?= htmlspecialchars($item['priority']) ?><br>
                                </p>
                                <?php if ($item['result_order'] == 'в работе'): ?>
                                    <p><strong>Заказ:</strong> <?= $item['result_order'] ?></p>
                                <?php else: ?>
                                    <p>
                                        <strong>Заказ:</strong> Выполнен
                                        <a href="page/single-page-orders.php?order_id=<?= $item['id'] ?>" class="text-decoration-none">Проверить</a>
                                    </p>
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
    </div>
</div>


