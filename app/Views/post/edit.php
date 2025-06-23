<h2>Edit Post</h2>
<p><a href="<?= base_url('posts') ?>" class="button-link">Back to Post List</a></p>

<form method="POST" action="<?= base_url('posts/') . $post['id'] ?>">
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Title</div>
        <div class="cell">Post</div>
        <div class="cell">Actions</div>
    </div>
    <div class="row">
        <div class="cell">
            <select name="user_id" required>
                <option value="">-- Select a User --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user['id']) ?>"
                        <?= ($user['id'] == $post['user_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="cell">
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
        </div>
        <div class="cell">
            <textarea id="content" name="content" rows="10" cols="40" required><?= htmlspecialchars($post['content']) ?></textarea>
        </div>
        <div class="cell actions">
            <button type="submit" class="button-link">Update</button>
        </div>
    </div>
</div>
</form>