<?php
namespace App\Models;

use PDO;

class User {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        // Check for duplicate
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$data['email'], $data['username']]);
        if ($stmt->fetch()) {
            // Return a clear indicator for duplicate
            return 'duplicate';
        }

        $stmt = $this->pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
        if ($stmt->execute([$data['username'], $data['email']])) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        return $stmt->execute([$data['username'], $data['email'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
