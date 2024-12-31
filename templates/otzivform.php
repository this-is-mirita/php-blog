<?php
require_once __DIR__ . '/../Classes/OtzivForm.php';
$validator = new OtzivForm();
$validator->requiredFields = ['name', 'nickname', 'comment']; // Обязательные поля

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validator->formData = $_POST;
    if ($validator->validate()) {
        // Обработка данных после успешной валидации
        echo '<div class="alert alert-success">Отзыв успешно отправлен!</div>';
    } else {
        echo '<div class="alert alert-danger">Пожалуйста, исправьте ошибки в форме.</div>';
    }
}
?>
<div class="container mt-5">
    <h2 class="mb-4">Оставить отзыв</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text"
                   class="form-control <?= $validator->getError('name') ? 'is-invalid' : '' ?>"
                   id="name"
                   name="name"
                   placeholder="Введите ваше имя"
                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <?php if ($error = $validator->getError('name')): ?>
                <div class="invalid-feedback"><?= $error ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="nickname" class="form-label">Ник</label>
            <input type="text" class="form-control <?= $validator->getError('nickname') ? 'is-invalid' : '' ?>" id="nickname" name="nickname" placeholder="Введите ваш ник"  value="<?= htmlspecialchars($_POST['nickname'] ?? '') ?>">
            <?php if ($error = $validator->getError('nickname')): ?>
                <div class="invalid-feedback"><?= $error ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control <?= $validator->getError('comment') ? 'is-invalid' : '' ?>" id="comment" name="comment" rows="5" placeholder="Введите ваш комментарий"><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>
            <?php if ($error = $validator->getError('comment')): ?>
                <div class="invalid-feedback"><?= $error ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

