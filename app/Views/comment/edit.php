<h2>Edit Comment</h2>
<p><a href="<?= base_url('comments') ?>" class="button-link">Back to Comment List</a></p>

<form method="POST" action="<?= base_url('comments/') . $comment['id'] ?>">
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Post Title</div>
        <div class="cell">Comment</div>
        <div class="cell">Actions</div>
    </div>
    <div class="row">
        <div class="cell"><?= htmlspecialchars($comment['username']) ?></div>
        <div class="cell"><?= htmlspecialchars($comment['title']) ?></div>
        <div class="cell"><textarea id="content" name="content" rows="10" cols="40"><?= htmlspecialchars($comment['content']) ?></textarea></div>
        <div class="cell actions">
            <button type="submit" class="button-link">Update</button>
        </div>
    </div>
</div>
</form>