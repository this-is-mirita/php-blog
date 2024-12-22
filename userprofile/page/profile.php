<?php
session_start();
require_once __DIR__ . '/../../DataBase/dBConnetion.php';
require_once __DIR__ . '/../../Classes/User.php';
$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$user = new User($pdo);
$user_profile = $user->getUser($_SESSION['user']['id']);
?>
<div class="container">
    <h2 class="mb-4">Личные данные</h2>
    <form>
        <div class="mb-3">
            <label for="record-number" class="form-label">Запись номер</label>
            <input type="text" class="form-control" id="record-number" placeholder="Введите номер записи" value="<?=$user_profile['id'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" placeholder="Введите имя" value="<?=$user_profile['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Введите пароль" value="<?=$user_profile['password'] ?>" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Введите email" value="<?=$user_profile['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="registration-date" class="form-label">Дата регистрации</label>
            <input type="text" class="form-control" id="registration-date" value="<?=$user_profile['created_at'] ?>">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Роль</label>
            <input type="text" class="form-control" id="role" placeholder="Введите роль" value="<?=$user_profile['role']?>" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
<style>
    .form-control {
        border-radius: 0; !important; /* Убираем скругление у инпутов */
    }
</style>