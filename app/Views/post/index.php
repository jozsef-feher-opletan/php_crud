<h2>Post List</h2>
<p><a href="<?= base_url('posts/create') ?>" class="button-link">Add New Post</a></p>
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Post Title</div>
        <div class="cell">Actions</div>
    </div>

    <?php foreach ($posts as $post): ?>
        <div class="row">
            <div class="cell"><?= htmlspecialchars($post['username']) ?></div>
            <div class="cell"><?= htmlspecialchars($post['title']) ?></div>
            <div class="cell actions">
                <a href="<?= base_url("posts/{$post['id']}/edit") ?>" class="button-link">Edit</a>
                
                <form action="<?= base_url("posts/{$post['id']}/delete") ?>" method="POST" style="display:inline;">
                    <?= CSRF::getTokenInputField() ?>
                    <button type="submit" class="button-link" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>