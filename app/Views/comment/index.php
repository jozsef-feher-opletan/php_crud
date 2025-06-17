<h1>Post List</h1>
<a href="<?= base_url('comments/create') ?>">Add New Comment</a>
<ul>
<?php foreach ($comments as $comment): ?>
    <li>
        <?= htmlspecialchars($post['username']) ?> (<?= htmlspecialchars($post['title']) ?>)
        <a href="<?= base_url("comments/{$comment['id']}/edit") ?>">Edit</a>
        <form action="<?= base_url("comments/{$comment['id']}/delete") ?>" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>