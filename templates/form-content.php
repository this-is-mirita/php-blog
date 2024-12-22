<style>
    /* Карточки категорий */
    .category-card {
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .category-card:hover {
        transform: translateY(-10px);
    }

    .category-card img {
        object-fit: cover;
        height: 300px;
        width: 100%;
    }

    .category-card-body {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(0, 0, 0, 0.2));
        padding: 20px;
        border-radius: 0 0 12px 12px;
    }

    .category-card-title {
        font-weight: bold;
        font-size: 1.5rem;
        color: #343a40;
    }

    .category-card-price {
        font-size: 1.2rem;
        color: #28a745;
    }

    .category-card-button {
        background-color: #ff5733;
        color: white;
        border: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .category-card-button:hover {
        background-color: #c4421f;
    }

    /* Форма заказа */
    .order-form {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .order-form h3 {
        font-size: 2rem;
        color: #343a40;
        margin-bottom: 20px;
    }

    .order-form .form-label {
        font-weight: bold;
    }

    .order-form button {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border: none;
        transition: background-color 0.3s;
    }

    .order-form button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container my-5">
    <h2 class="text-center mb-4">Форма для заказа арта</h2>
    <!-- Карточки категорий -->
    <div class="row row-cols-2 row-cols-md-2 g-4 mb-5">
        <!-- Карточка Аниме -->
        <div class="col">
            <div class="card category-card">
                <img src="image/anime.avif" class="card-img-top" alt="Аниме">
                <div class="category-card-body">
                    <h5 class="category-card-title">Аниме</h5>
                    <p class="card-text">Индивидуальный рисунок по мотивам вашего любимого аниме.</p>
                    <p class="category-card-price"><strong>Цена:</strong> 3000 руб.</p>
                    <button class="btn category-card-button w-100">
                        <a class="text-white" href="/templates/single-page.php?single_id=1">Выбрать</a>
                    </button>
                </div>
            </div>
        </div>
        <!-- Карточка Природа -->
        <div class="col">
            <div class="card category-card">
                <img src="image/priroda.avif" class="card-img-top" alt="Природа">
                <div class="category-card-body">
                    <h5 class="category-card-title">Природа</h5>
                    <p class="card-text">Картина природы в реальном времени или по вашему запросу.</p>
                    <p class="category-card-price"><strong>Цена:</strong> 2500 руб.</p>
                    <button class="btn category-card-button w-100">
                        <a class="text-white" href="/templates/single-page.php?single_id=2">Выбрать</a>
                    </button>
                </div>
            </div>
        </div>
        <!-- Карточка Фэнтези -->
        <div class="col">
            <div class="card category-card">
                <img src="image/fantasy.jpeg" class="card-img-top" alt="Фэнтези">
                <div class="category-card-body">
                    <h5 class="category-card-title">Фэнтези</h5>
                    <p class="card-text">Создание персонажей и миров в стиле фэнтези.</p>
                    <p class="category-card-price"><strong>Цена:</strong> 3500 руб.</p>
                    <button class="btn category-card-button w-100">
                        <a class="text-white" href="/templates/single-page.php?single_id=3">Выбрать</a>
                    </button>
                </div>
            </div>
        </div>
        <!-- Карточка Портрет -->
        <div class="col">
            <div class="card category-card">
                <img src="image/portret.avif" class="card-img-top" alt="Портрет">
                <div class="category-card-body">
                    <h5 class="category-card-title">Портрет</h5>
                    <p class="card-text">Персонализированные портреты на заказ.</p>
                    <p class="category-card-price"><strong>Цена:</strong> 4000 руб.</p>
                    <button class="btn category-card-button w-100">
                        <a class="text-white" href="/templates/single-page.php?single_id=4">Выбрать</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>


