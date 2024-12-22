<?php
class DbConnection{
    private $host = "localhost";
    private $db = "learn-class";
    private $user = "postgres";  // Замените на ваше имя пользователя
    private $password = "123";  // Замените на ваш пароль
    private $pdo;

    public function __construct()
    {
        $dsn = "pgsql:host=$this->host;dbname=$this->db";
        try{
            $this->pdo = new PDO ($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Ошибка подключения: " . $e->getMessage();
        }
    }

    /**
     * @param PDO $pdo
     */
    public function getConnection()
    {
        return $this->pdo;
    }
}