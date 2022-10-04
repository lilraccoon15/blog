<?php

namespace App\Model\Repository;

use App\Model\Entity\Post;
use PDO;

class PostRepository extends Repository
{
    public function findLasts(): ?array
    {
        $request = $this->db->query("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%y') AS date, DATE_FORMAT(date, '%d') AS day, DATE_FORMAT(date, '%m') AS month, DATE_FORMAT(date, '%H:%i:%s') AS hour, author, category FROM post ORDER BY date DESC LIMIT 3");
        $request->setFetchMode(PDO::FETCH_CLASS, Post::class);

        return $request->fetchAll();
    }

    public function findAll(): ?array
    {
        $request = $this->db->query("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%y') AS date, DATE_FORMAT(date, '%d') AS day, DATE_FORMAT(date, '%m') AS month, DATE_FORMAT(date, '%H:%i:%s') AS hour, author, category FROM post ORDER BY date DESC");
        $request->setFetchMode(PDO::FETCH_CLASS, Post::class);

        return $request->fetchAll();
    }

    public function findOne(int $postId): ?post
    {
        $request = $this->db->prepare("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%y') AS date, DATE_FORMAT(date, '%d') AS day, DATE_FORMAT(date, '%m') AS month, DATE_FORMAT(date, '%H:%i:%s') AS hour, author, category FROM post WHERE id = :id");
        $request->bindParam("id", $postId);
        $request->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $request->execute();

        return $request->fetch();
    }
}
