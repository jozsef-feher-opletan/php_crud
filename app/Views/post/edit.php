<h1>Edit Post</h1>
<form method="POST" action="<?= base_url('posts/') . $post['id'] ?>">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($post['username']) ?>"><br>
    Title: <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>"><br>
    Post: <textarea id="content" name="content" rows="10" cols="40"><?= htmlspecialchars($post['content']) ?></textarea><br>
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
    <button type="submit">Update</button>
</form>
