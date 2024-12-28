<?php
session_start();
require_once __DIR__ . '/../../DataBase/dBConnetion.php';
require_once __DIR__ . '/../../Classes/Order.php';

$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$orderClass = new Order($pdo);
$status = 'Назначен';
$getAllOrder = $orderClass->getAllOrderOnlyStatus($status);

?>
<?php foreach ($getAllOrder as $order) : ?>
    <div class="container my-4">
        <!-- Первая строка -->
        <div class="row border-top border-start border-end py-2 align-items-center text-center">
            <!-- Номер заказа -->
            <div class="col-1">
                <?= htmlspecialchars($order['id']); ?>
            </div>
            <!-- Имя -->
            <div class="col-3">
                <?= htmlspecialchars($order['full_name']); ?>
            </div>
            <!-- Email -->
            <div class="col-3">
                <?= htmlspecialchars($order['email']); ?>
            </div>
            <!-- Телефон -->
            <div class="col-3">
                <?= htmlspecialchars($order['phone_number']); ?>
            </div>
            <!-- Категория -->
            <div class="col-2">
                <?= htmlspecialchars($order['category']); ?>
            </div>
        </div>
        <!-- Вторая строка -->
        <div class="row border-start border-end border-bottom py-2 align-items-center text-center">
            <!-- Статус -->
            <div class="col-2">
                <select class="form-select form-select-sm">
                    <option value="Назначен" <?= $order['status'] === "назначен" ? 'selected' : ''; ?>>Назначен</option>
                    <option value="Выполнен" <?= $order['status'] === "Выполнен" ? 'selected' : ''; ?>>Выполнен</option>
                </select>
            </div>
            <!-- Загрузка результата -->
            <div class="col-4">
                <form action="admin-start-page.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" value="<?= $order['id']; ?>">

                    <input type="file" name="file" class="form-control form-control-sm"> <br>
                    <button type="submit" class="btn btn-primary">Отправить работу</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>