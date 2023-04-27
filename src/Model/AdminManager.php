<?php

namespace App\Model;

class AdminManager extends AbstractManager
{
    public const TABLE = 'admin';

    public function selectOneByUsername(string $username)
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE username=:username";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetch();
    }

    public function insert(array $credentials): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`username`, `password`)
            VALUES (:username, :password)");
        $statement->bindValue(':username', $credentials['username']);
        $statement->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
