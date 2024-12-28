<?php
class UploadFile
{
    // Константа, указывающая папку для сохранения загруженных файлов
    // Абсолютный путь к папке uploads
    const IMAGE_DIRECTORY = __DIR__ . '/../uploads';

    // Переменная для хранения информации о текущем файле (например, из $_FILES)
    public array $current_file;

    // Конструктор класса
    public function __construct(array $arr) {
        // Если папка для сохранения файлов не существует, создаем ее
        if (!file_exists(self::IMAGE_DIRECTORY)) {
            mkdir(self::IMAGE_DIRECTORY);
        }
        // Сохраняем информацию о файле в свойство класса
        $this->current_file = $arr;
    }

    // Метод возвращает временное имя файла, которое создается при загрузке на сервер
    public function tempFileName(): string {
        return $this->current_file['tmp_name'];
    }

    // Метод возвращает имя файла, с которым он будет сохранен
    public function fileName(): string {
        // Получаем расширение файла
        $ext = $this->extension($this->current_file['full_path']);
        // Генерируем уникальное имя файла на основе текущего времени
        return self::IMAGE_DIRECTORY . '/' . time() . '.' . $ext;
    }

    // Метод проверяет, является ли файл изображением
    public function isImage(): bool {
        $tmp = $this->tempFileName(); // Получаем временное имя файла
        $info = getimagesize($tmp);   // Получаем информацию о файле (если это изображение)
        // Проверяем, содержит ли MIME-тип слово 'image'
        return strpos($info['mime'], 'image/') === 0;
    }

    // Метод получает расширение файла из его полного имени
    public function extension(string $str): string {
        // Разбиваем строку на части по символу '.' и берем последнюю часть
        $arr = explode('.', $str);
        return $arr[count($arr) - 1];
    }
}
