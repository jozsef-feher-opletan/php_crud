<?php
namespace App\Models;

use PDO;

class Comment {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("
            SELECT 
                comments.id AS id,
                comments.post_id AS post_id,
                comments.user_id AS user_id,
                comments.content AS content,
                users.id AS users_id,
                users.username AS username,
                users.email AS email,
                posts.id AS posts_id,
                posts.title AS title,
                posts.content AS post_content
            FROM 
                comments
            INNER JOIN 
                users ON comments.user_id = users.id
            INNER JOIN 
                posts ON comments.post_id = posts.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT 
                comments.id AS id,
                comments.post_id AS post_id,
                comments.user_id AS user_id,
                comments.content AS content,
                users.id AS users_id,
                users.username AS username,
                users.email AS email,
                posts.id AS posts_id,
                posts.title AS title,
                posts.content AS post_content
            FROM 
                comments
            INNER JOIN 
                users ON comments.user_id = users.id
            INNER JOIN 
                posts ON comments.post_id = posts.id
            WHERE comments.id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE comments SET content = ? WHERE id = ?");
        return $stmt->execute([$data['content'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}