<?php

namespace App\Model;

use PDO;

class ContactManager extends AbstractManager
{
    public const TABLE = 'contact';

    public function insert(array $contact): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`,`email`,`message`)
         VALUES (:name, :email, :message)");
        $statement->bindValue('name', $contact['name'], \PDO::PARAM_STR);
        $statement->bindValue('email', $contact['email'], \PDO::PARAM_STR);
        $statement->bindValue('message', $contact['message'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
