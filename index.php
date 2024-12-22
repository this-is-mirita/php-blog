<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE); // Отключает уведомления, но оставляет другие ошибки
error_reporting(E_ALL & ~E_WARNING); // Отключает уведомления, но оставляет другие ошибки
// Проверяем, что данные сохранены
echo "<pre>";
print_r($_SESSION["user"]);
echo "</pre>";
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/footer.php";
require_once __DIR__ . "/templates/start-content.php";
require_once __DIR__ . "/templates/paginatons.php";
require_once __DIR__ . "/templates/form-content.php";