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
        $statement->bindValue('first_name', $testimony['first_name'], PDO::PARAM_STR);
        $statement->bindValue('last_name', $testimony['last_name'], PDO::PARAM_STR);
        $statement->bindValue('message', $testimony['message'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
