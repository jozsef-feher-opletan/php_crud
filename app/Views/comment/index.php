<h1>Comment List</h1>
<link rel="stylesheet" href="../../public/css/styles.css">
<a href="<?= base_url('comments/create') ?>">Add New Comment</a>
<div class="table">
    <div class="row header">
        <div class="cell">Userame</div>
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
                <button type="submit" class="button-link">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
</div>