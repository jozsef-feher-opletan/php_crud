<h1>Edit User</h1>
<form method="POST" action="<?= base_url('comments/') . $post['id'] ?>">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($post['username']) ?>"><br>
    Title: <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>"><br>
    Post: <textarea id="content" name="content" rows="10" cols="40"><?= htmlspecialchars($post['content']) ?></textarea><br>
    <button type="submit">Update</button>
</form>
