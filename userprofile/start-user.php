<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <!-- Левая колонка -->
        <div class="col-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#" class="list-group-item list-group-item-action" data-page="profile">Редактировать данные</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="list-group-item list-group-item-action active" data-page="orders">Заказы</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="list-group-item list-group-item-action" data-page="ready-orders">Выполненые заказы</a>
                </li>
                <li class="list-group-item">
                    <a href="/" class="list-group-item" >Главная</a>
                </li>
            </ul>
        </div>

        <!-- Правая колонка -->
        <div class="col-9" id="profile">
            asdasdas
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="userprofile.js"></script>
<script>
    window.load_table_ajax('orders');
</script>