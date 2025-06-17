<h1>Post List</h1>
<a href="<?= base_url('posts/create') ?>">Add New Post</a>
<ul>
<?php foreach ($posts as $post): ?>
    <li>
        <?= htmlspecialchars($post['username']) ?> (<?= htmlspecialchars($post['title']) ?>)
        <a href="<?= base_url("posts/{$post['id']}/edit") ?>">Edit</a>
        <form action="<?= base_url("posts/{$post['id']}/delete") ?>" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>