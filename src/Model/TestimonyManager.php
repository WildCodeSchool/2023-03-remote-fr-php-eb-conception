<?php

namespace App\Model;

use PDO;

class TestimonyManager extends AbstractManager
{
    public const TABLE = 'testimony';
    public function insert(array $testimony): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $testimony['title'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
