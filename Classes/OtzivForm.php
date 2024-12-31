<?php

class OtzivForm
{
    public $formData = [];
    public $requiredFields = [];
    private $errors = [];

    public function validate()
    {
        foreach ($this->requiredFields as $field) {
            $this->errors[$field] = $this->validateField($field);
        }
        $this->errors = array_filter($this->errors); // Убираем пустые ошибки
        return empty($this->errors);
    }

    private function validateField($name)
    {
        if (empty($this->formData[$name])) {
            return 'Заполните поле';
        }
        return null; // Ошибок нет
    }

    public function getError($field)
    {
        return $this->errors[$field] ?? null;
    }
}
