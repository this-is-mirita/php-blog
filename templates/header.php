<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <!-- Подключаем Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container">
            <!-- Логотип -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- Иконка для логотипа -->
                <i class="fas fa-cogs me-2"></i>
                <span class="fs-4 fw-bold">Сайт</span>
            </a>
            <!-- Кнопка для адаптивного меню -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Ссылки меню -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if(!isset($_SESSION['user'])): ?>
                        <!-- Регистрация -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/user/register_template.php">Регистрация</a>
                        </li>
                        <!-- Авторизация -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/user/auth_template.php">Авторизация</a>
                        </li>
                    <?php else: ?>
                        <!-- Личный кабинет -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/admin/admin-start-page.php">Админ</a>
                        </li>
                        <li class="dropdown">
                            <a class="btn text-white  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['username'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="dropdown-item text-danger" href="../userprofile/start-user.php">Личный кабинет</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Выход -->
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="Logout/logout.php">Выход</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>
    .dropdown-toggle{
        background-color: dark; !important;
    }
</style>
