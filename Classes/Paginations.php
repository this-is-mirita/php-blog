<?php

class Paginations
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Получаем общее количество записей
    public function getTotalCount()
    {
        $sql = "SELECT COUNT(*) AS total FROM paginations_card";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Получаем записи для текущей страницы
    public function getPaginations($page, $limit = 4)
    {
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM paginations_card ORDER BY id ASC LIMIT :limit OFFSET :offset";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
