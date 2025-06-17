<?php
namespace App\Models;

use PDO;

class Post {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("
            SELECT 
                posts.id AS id,
                posts.title AS title,
                posts.content AS content,
                users.id AS user_id,
                users.username AS username,
                users.email
            FROM 
                posts
            INNER JOIN 
                users ON posts.user_id = users.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("
            SELECT 
                posts.id AS id,
                posts.title AS title,
                posts.content AS content,
                users.id AS user_id,
                users.username AS username,
                users.email
            FROM 
                posts
            INNER JOIN 
                users ON posts.user_id = users.id
            WHERE posts.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        return $stmt->execute([$data['user_id'], $data['title'], $data['content']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE posts SET user_id = ?, title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$data['user_id'], $data['title'], $data['content'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}