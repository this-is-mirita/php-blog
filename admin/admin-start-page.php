<?php
require_once __DIR__ . '/../Classes/UploadFile.php'; // Подключаем класс UploadFile

// Проверяем, что запрос выполнен методом POST и что в массиве $_FILES есть ключ 'file'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // Создаем экземпляр класса UploadFile, передавая массив с данными о загружаемом файле
    $file = new UploadFile($_FILES['file']);

    // Проверяем наличие ошибок при загрузке файла
    if ($file->current_file['error'] !== UPLOAD_ERR_OK) {
        // Если есть ошибка, выводим её код
        echo "Ошибка загрузки файла: " . $file->current_file['error'];
    }
    // Проверяем, был ли файл загружен корректно
    elseif (!is_uploaded_file($file->tempFileName())) {
        echo "Файл не был загружен корректно";
    }
    // Проверяем, является ли загруженный файл изображением
    elseif (!$file->isImage()) {
        echo "Файл не является изображением";
    }
    // Если все проверки пройдены
    else {
        // Пытаемся переместить загруженный файл в папку uploads с уникальным именем
        if (move_uploaded_file($file->tempFileName(), $file->fileName())) {
            echo "Файл успешно загружен"; // Успешное завершение
        } else {
            echo "Не удалось сохранить файл"; // Ошибка при перемещении файла
        }
    }
}
?>

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
        <div class="col-2">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#" class="list-group-item list-group-item-action active" data-page="order-on-me">Заказы на мне</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="list-group-item list-group-item-action" data-page="order-me-end">Выполненые все</a>
                </li>
                <li class="list-group-item">
                    <a href="/" class="list-group-item" >Главная</a>
                </li>
            </ul>
        </div>

        <!-- Правая колонка -->
        <div class="col-9" id="profile"></div>
        <?php
            foreach (UploadFile::list() as $img) {
                echo "<img src={$img['url']} {$img['wh']}>";
            }
        ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="admin.js"></script>
<script>
    window.load_table_ajax('order-on-me');
</script>
