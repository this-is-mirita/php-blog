<?php

Class User {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    // Функция для проверки существования пользователя
    public function checkIfUserExists($username) {
        $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$username]);
        return $query->fetchColumn() > 0;
    }
    // получение id зарегистрированного пользователя
    public function getId($username) {
        $sql = "SELECT id FROM users WHERE username = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$username]);
        $row = $query->fetch();
        return $row['id'];
    }
    // все данные пользователя по id
    public function getUser($id) {
        $sql = "SELECT * FROM users WHERE id = ? limit 1";
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $query = $this->pdo->prepare($sql);
        $query->execute([$username]);
        $row = $query->fetch();

        // Проверяем, есть ли пользователь и совпадает ли пароль
        if ($row && password_verify($password, $row['password'])) {
            return $row; // Возвращаем данные пользователя
        }

        return false; // Если не совпадает, возвращаем false
    }

    public function register($username, $password, $email)
    {
        // Начинаем транзакцию
        $this->pdo->beginTransaction();
        try{
            // проверка на пользователя
            if($this->checkIfUserExists($username)){
                return "Пользователь с таким именем уже существует.";
            }

            // Проверяем, существует ли пользователь с таким email
            $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$email]);
            if ($query->fetchColumn() > 0) {
                // Если email уже существует, откатываем транзакцию и возвращаем ошибку
                $this->pdo->rollBack();
                return "Пользователь с таким email уже существует.";
            }


            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // запись и регистрация пользователя
            $sql = "INSERT INTO users (username, password, email) VALUES (?,?,?)";
            $query = $this->pdo->prepare($sql);
            $query->execute([$username, $hashedPassword,$email]);

            // Если оба запроса прошли успешно, подтверждаем транзакцию
            $this->pdo->commit();

            return "Пользователь успешно зарегистрирован.";
        } catch (PDOException $e){
            // В случае ошибки откатываем транзакцию
            $this->pdo->rollBack();
            return "Произошла ошибка при регистрации: " . $e->getMessage();
        }
    }

    // Валидация данных
    public function validate($data) {
        // Проверка на пустые поля
        foreach ($data as $field) {
            if (empty($field)) {
                return "Все поля должны быть заполнены.";
            }
        }

        // Проверка на правильность формата email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Неверный формат email.";
        }

        return true;  // Все данные валидны
    }

}