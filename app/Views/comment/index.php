<h2>Comment List</h2>
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Post Title</div>
        <div class="cell">Comment</div>
        <div class="cell">Actions</div>
    </div>
<?php foreach ($comments as $comment): ?>
    <div class="row">
        <div class="cell"><?= htmlspecialchars($comment['username']) ?></div>
        <div class="cell"><?= htmlspecialchars($comment['title']) ?></div>
        <div class="cell"><?= htmlspecialchars($comment['content']) ?></div>
        <div class="cell actions">
            <a href="<?= base_url("comments/{$comment['id']}/edit") ?>" class="button-link">Edit</a>
            <form action="<?= base_url("comments/{$comment['id']}/delete") ?>" method="POST" style="display:inline;">
                <?= CSRF::getTokenInputField() ?>
                <button type="submit" class="button-link" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                <input type="hidden" name="post_id" value="<?= htmlspecialchars($comment['post_id']) ?>">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($comment['user_id']) ?>">
            </form>
        </div>
    </div>
<?php endforeach; ?>
</div>