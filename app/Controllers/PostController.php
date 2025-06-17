<?php
namespace App\Controllers;

use App\Models\Post;

class PostController {
    protected $post;

    public function __construct($pdo) {
        $this->post = new Post($pdo);
    }

    public function index() {
        $posts = $this->post->all();
        require '../app/Views/post/index.php';
    }

    public function create() {
        require '../app/Views/post/create.php';
    }

    public function store() {
        $this->post->create($_POST);
        header("Location: " . base_url('/posts'));
    }

    public function edit($id) {
        $post = $this->post->find($id);
        require '../app/Views/post/edit.php';
    }

    public function update($id) {
        $this->post->update($id, $_POST);
        header("Location: " . base_url('/posts'));
    }

    public function delete($id) {
        $this->post->delete($id);
        header("Location: " . base_url('/posts'));
    }
}
