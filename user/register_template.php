<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container form-container">
    <h2 class="text-center mb-4 text-white">Регистрация</h2>
    <form action="/actions/register_user.php" method="POST">
        <!-- Поле для ввода username -->
        <div class="mb-3">
            <label for="username" class="form-label text-white">Имя пользователя</label>
            <input type="text" class="form-control input-transparent" id="username" name="username" required>
        </div>

        <!-- Поле для ввода пароля -->
        <div class="mb-3">
            <label for="password" class="form-label text-white">Пароль</label>
            <input type="password" class="form-control input-transparent" id="password" name="password" required>
        </div>

        <!-- Поле для ввода email -->
        <div class="mb-3">
            <label for="email" class="form-label text-white">Электронная почта</label>
            <input type="email" class="form-control input-transparent" id="email" name="email" required>
        </div>

        <!-- Кнопка отправки формы -->
        <button type="submit" class="btn btn-color text-white w-100">Зарегистрироваться</button>
    </form>
</div>
<style>
    /* Фон для страницы */
    body {
        background-image: url('/image/register_image.jpg'); /* Укажите ссылку на вашу картинку */
        background-size: cover; /* Масштабирование для полного покрытия экрана */
        background-position: center; /* Центровка картинки */
        background-repeat: no-repeat; /* Запрет повторения картинки */
        margin: 0;
        height: 100vh; /* Высота экрана */
        display: flex;
        align-items: center; /* Центровка формы по вертикали */
        justify-content: center; /* Центровка формы по горизонтали */
    }

    /* Стили для контейнера формы */
    .form-container {
        max-width: 800px;
        width: 100%;
        background: rgba(0, 0, 0, 0.6); /* Прозрачный чёрный фон */
        border-radius: 10px; /* Скругление углов */
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Тень */
    }

    /* Стили для прозрачных инпутов */
    .input-transparent {
        background: rgba(255, 255, 255, 0.1); /* Полупрозрачный белый фон */
        border: 1px solid rgba(255, 255, 255, 0.4); /* Прозрачная рамка */
        color: white; /* Белый текст */
        border-radius: 0; !important;
    }

    .input-transparent:focus {
        background: rgba(255, 255, 255, 0.2); /* Более насыщенный фон при фокусе */
        color: white;
    }

    /* Стили для текста */
    .form-label {
        font-size: 0.9rem;
    }
    .btn-color {
        background-color: #1a3153;
    }
</style>
