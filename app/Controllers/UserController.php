<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    protected $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function index() {
        $users = $this->user->all();
        require '../app/Views/user/index.php';
    }

    public function create() {
        require '../app/Views/user/create.php';
    }

    public function store() {
        $this->user->create($_POST);
        header("Location: " . base_url('/users'));
    }

    public function edit($id) {
        $user = $this->user->find($id);
        require '../app/Views/user/edit.php';
    }

    public function update($id) {
        $this->user->update($id, $_POST);
        header("Location: " . base_url('/users'));
    }

    public function delete($id) {
        $this->user->delete($id);
        header("Location: " . base_url('/users'));
    }
}
