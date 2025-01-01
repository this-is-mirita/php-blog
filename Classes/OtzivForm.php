<?php

class OtzivForm // Объявление класса OtzivForm
{
    public $formData = []; // Переменная для хранения данных формы
    public $requiredFields = []; // Переменная для хранения списка обязательных полей
    private $errors = []; // Переменная для хранения ошибок валидации

    public function validate() // Метод для проверки данных формы
    {
        foreach ($this->requiredFields as $field) { // Перебираем все обязательные поля
            $this->errors[$field] = $this->validateField($field); // Проверяем каждое поле и записываем результат
        }
        $this->errors = array_filter($this->errors); // Удаляем пустые элементы из массива ошибок
        return empty($this->errors); // Если ошибок нет, возвращаем true
    }

    private function validateField($name) // Метод для проверки конкретного поля
    {
        if (empty($this->formData[$name])) { // Если поле пустое
            return 'Заполните поле'; // Возвращаем текст ошибки
        }
        return null; // Если ошибок нет, возвращаем null
    }

    public function getError($field) // Метод для получения ошибки конкретного поля
    {
        return $this->errors[$field] ?? null; // Возвращаем ошибку, если она есть, или null
    }
}
