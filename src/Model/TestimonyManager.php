<?php

namespace App\Model;

use PDO;

class TestimonyManager extends AbstractManager
{
    public const TABLE = 'testimony';

    public function insert(array $testimony): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`first_name`,`last_name`,`message`)
         VALUES (:first_name, :last_name, :message)");
        $statement->bindValue('first_name', $testimony['first_name'], \PDO::PARAM_STR);
        $statement->bindValue('last_name', $testimony['last_name'], \PDO::PARAM_STR);
        $statement->bindValue('message', $testimony['message'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    
    public function updateStatut(array $testimony): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `is_published`= 1 WHERE id=:id");
        $statement->bindValue('id', $testimony['id'], \PDO::PARAM_INT);
        $statement->bindValue('is_published', $testimony['is_published'], \PDO::PARAM_STR);

        return $statement->execute();
    }

}

