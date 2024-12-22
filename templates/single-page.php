<?php
session_start();
require_once __DIR__ . '/../DataBase/dBConnetion.php';
require_once __DIR__ . '/../Classes/Slider.php';
$card_id = $_GET['single_id'];
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
        <a class="navbar-brand" href="#">Мой сайт</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../userprofile/start-user.php">Заказ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Форма для заказа -->
<div class="container" id="order-form">
    <div class="row">
        <!-- Колонка с текстом -->
        <div class="col-md-5">
            <h3 class="text-center mb-4">Оформление заказа</h3>
            <p>Добро пожаловать на страницу оформления заказа! Чтобы заказать товар или услугу, вам нужно заполнить форму, представленную ниже. Мы подготовили её таким образом, чтобы процесс был максимально простым и удобным для вас.</p>
            <ul>
                <li><strong>Заполнение личных данных:</strong> Укажите своё полное имя, адрес электронной почты и номер телефона. Эти данные нужны для того, чтобы мы могли с вами связаться по поводу вашего заказа и предоставить актуальную информацию о его статусе.</li>
                <li><strong>Выбор категории:</strong> В разделе «Категория» выберите подходящий вариант. Это поможет нам лучше понять, что именно вы хотите заказать, и обработать ваш запрос быстрее.</li>
                <li><strong>Описание заказа:</strong> В текстовом поле опишите ваш заказ как можно подробнее. Чем точнее и понятнее будет ваше описание, тем быстрее мы сможем обработать ваш запрос и предоставить нужную информацию или товар.</li>
                <li><strong>Отправка заказа:</strong> После того как все поля будут заполнены, нажмите кнопку "Отправить заказ". Ваш запрос будет отправлен нам, и мы свяжемся с вами в ближайшее время для уточнения деталей.</li>
            </ul>
            <p>Наша цель — предоставить вам лучший сервис, поэтому мы всегда готовы ответить на все ваши вопросы и помочь на каждом этапе оформления заказа.</p>
        </div>

        <!-- Колонка с формой -->
        <div class="col-md-7">
            <h3 class="text-center mb-4">Форма для заказа</h3>
            <form class="order-form" action="/actions/order-form.php" method="POST">
                <!-- ФИО -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" >
                </div>

                <!-- Почта -->
                <div class="mb-3">
                    <label for="email" class="form-label">Почта (Указанная при регистрации)</label>
                    <input type="email" class="form-control" id="email" value="<?=$_SESSION["user"]["email"] ?>" name="email" >
                </div>

                <!-- Телефон -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="phone" name="phone" >
                </div>

                <!-- Выбор категории -->
                <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-select" id="category" name="category" >
                        <option value="anime">Аниме</option>
                        <option value="nature">Природа</option>
                        <option value="fantasy">Фэнтези</option>
                        <option value="portrait">Портрет</option>
                        <option value="others">Другое</option>
                    </select>
                </div>

                <!-- Описание required -->
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="4" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Скорость : приоритет</label>
                    <select class="form-select" id="category" name="priority" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>

                <!-- Кнопка отправки -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Отправить заказ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Подключение скриптов Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

