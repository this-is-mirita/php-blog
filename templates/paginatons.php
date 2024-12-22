<?php
require_once __DIR__ . '/../DataBase/dBConnetion.php';
require_once __DIR__ . '/../Classes/Paginations.php';
$dbConnection = new DbConnection();
$pdo = $dbConnection->getConnection();
$pagination = new Paginations($pdo);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$posts = $pagination->getPaginations($page);
$totalCount = $pagination->getTotalCount();

$limit = 4;
$totalPages = ceil($totalCount / $limit);

?>
<div class="container my-5">
    <h2 class="text-center mb-4">Описание</h2>
    <p class="text-center text-muted">Здесь находится текст с описанием. Вы можете добавить информацию о чем-либо, чтобы объяснить суть или предоставить дополнительные сведения.</p>

    <div id="posts-container" class="row g-4">
        <!-- Здесь будут загружаться карточки через AJAX -->
        <?php foreach ($posts as $post) : ?>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-img-container position-relative overflow-hidden" style="height: 300px;">
                        <img src="image/<?= $post['img'] ?>" class="img-fluid w-100 h-100" alt="Фото" style="object-fit: cover;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase text-dark"><?= htmlspecialchars($post['name_card']); ?></h5>
                        <p class="text-muted mb-1"><?= htmlspecialchars($post['name_tyan']); ?></p>
                        <p class="text-muted"><?= htmlspecialchars($post['desk']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <!-- Пагинация -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <!-- Кнопка "Предыдущая" -->
                <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $page - 1; ?>">Предыдущая</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                        <a class="page-link pagination-link" href="#" data-page="<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <!-- Кнопка "Следующая" -->
                <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $page + 1; ?>">Следующая</a>
                </li>
            </ul>
        </nav>
    </div>
</div>