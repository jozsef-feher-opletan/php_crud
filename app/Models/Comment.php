<?php
namespace App\Models;

use PDO;

class Comment {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM comments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO comments (username, title, content) VALUES (?, ?, ?)");
        return $stmt->execute([$data['username'], $data['title'], $data['content']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE comments SET username = ?, title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$data['username'], $data['title'], $data['content'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}