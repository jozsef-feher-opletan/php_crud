<?php
namespace App\Controllers;

use App\Models\Comment;

class CommentController {
    protected $comment;

    public function __construct($pdo) {
        $this->comment = new Comment($pdo);
    }

    public function index() {
        $comments = $this->comment->all();
        require '../app/Views/comment/index.php';
    }

    public function create() {
        require '../app/Views/comment/create.php';
    }

    public function store() {
        $this->comment->create($_POST);
        header("Location: " . base_url('/comments'));
    }

    public function edit($id) {
        $comment = $this->comment->find($id);
        require '../app/Views/comment/edit.php';
    }

    public function update($id) {
        $this->comment->update($id, $_POST);
        header("Location: " . base_url('/comments'));
    }

    public function delete($id) {
        $this->comment->delete($id);
        header("Location: " . base_url('/comments'));
    }
}
