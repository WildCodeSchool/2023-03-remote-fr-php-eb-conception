<?php

namespace App\Model;

use PDO;

class ContentManager extends AbstractManager
{
    public const TABLE = 'content';

    /**
     * Insert new item in database
     */

    public function insert(array $content): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`bold_text`, `coloured_text`, `main_content`, `main_img`, `secondary_img`)
        VALUES (:bold_text, :coloured_text, :main_content, :main_img, :secondary_img)");
        $statement->bindValue('bold_text', $content['bold_text'], \PDO::PARAM_STR);
        $statement->bindValue('coloured_text', $content['coloured_text'], \PDO::PARAM_STR);
        $statement->bindValue('main_content', $content['main_content'], \PDO::PARAM_STR);
        $statement->bindValue('main_img', $content['main_img'], \PDO::PARAM_STR);
        $statement->bindValue('secondary_img', $content['secondary_img'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $content): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `bold_text` = :bold_text WHERE id=:id");
        $statement->bindValue('id', $content['id'], PDO::PARAM_INT);
        $statement->bindValue('bold_text', $content['bold_text'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
