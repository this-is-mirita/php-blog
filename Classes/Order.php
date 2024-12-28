<?php

class Order
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Метод для добавления заказа
    public function addOrder($fullName, $email, $phoneNumber, $category, $desk, $priority, $assignedTo, $userId)
    {
        $sql = "INSERT INTO order_table (full_name, email, phone_number, category, desk, priority, assigned_to, user_id)
                VALUES (:fullName, :email, :phoneNumber, :category, :desk, :priority, :assignedTo, :userId)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':desk', $desk);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':assignedTo', $assignedTo);
        $stmt->bindParam(':userId', $userId);

        return $stmt->execute();
    }
    public function getOrderById($id){
        $sql = "SELECT * FROM order_table WHERE id = ? limit 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function editOrder($phoneNumber, $desk, $order_id)
    {
        $sql = "UPDATE order_table SET phone_number = ?, desk = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$phoneNumber, $desk, $order_id]);
        return $stmt->rowCount(); // Возвращает количество затронутых строк
    }


    public function deleteOrder($id){
        $sql = "DELETE FROM order_table WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getEndStatus($id, $status){
        $sql = "UPDATE order_table SET status = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $id]);
        return $stmt->rowCount(); // Возвращает количество затронутых строк
    }

    public function getOrdersByStatusAndIdUsers($status, $user_id){
        $sql = "SELECT * FROM order_table WHERE status = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrdersIdUsers($user_id){
        $sql = "SELECT * FROM order_table WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOrderOnlyStatus($status){
        $sql = "SELECT * FROM order_table where status = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // добавление ссылки на файл в заявку и обновление статуса
    public function readyOrder($status, $result_order, $id)
    {
        // Обновляем оба поля: status и result_order для записи с определённым id
        $sql = "UPDATE order_table SET status = ?, result_order = ? WHERE id = ?";
        $query = $this->pdo->prepare($sql);

        // Выполняем запрос и возвращаем результат
        return $query->execute([$status, $result_order, $id]);
    }
}
