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
        $data = [
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
        ];

        // Basic validation
        $errors = [];
        if ($data['username'] === '') $errors[] = 'Username is required.';
        if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';

        if ($errors) {
            $_SESSION['error'] = implode('<br>', $errors);
            $_SESSION['old'] = $data;
            header('Location: '. base_url('/users/create'));
            exit;
        }

        $result = $this->user->create($data);

        if ($result === 'duplicate') {
            $_SESSION['error'] = 'A user with this email or username already exists.';
            $_SESSION['old'] = $data;
            header('Location: '. base_url('/users/create'));
            exit;
        } elseif ($result === true) {
            $_SESSION['success'] = 'User created successfully.';
            header('Location: '. base_url('/users'));
            unset($_SESSION['old']);
            exit;
        } else {
            $_SESSION['error'] = 'Failed to create user.';
            header('Location: '. base_url('/users/create'));
            exit;
        }
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
