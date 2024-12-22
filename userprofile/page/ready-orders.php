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
$status = 'Выполнен';
// Получаем список заказов
$orders = $orderClass->getOrdersByStatusAndIdUsers($status, $user_id)

?>

<div class="container">
    <h1 class="mb-4">Выполненые заказы</h1>
    <div class="row g-4">
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
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 18rem;">
                    <img src="/image/<?php echo($item['result_order']); ?>" class="card-img-top" alt="...">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
