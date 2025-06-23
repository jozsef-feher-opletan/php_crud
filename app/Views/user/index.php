<h2>User List</h2>
<p><a href="<?= base_url('users/create') ?>" class="button-link">Add New User</a></p>

<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Email</div>
        <div class="cell">Actions</div>
    </div>

    <?php foreach ($users as $user): ?>
        <div class="row">
            <div class="cell"><?= htmlspecialchars($user['username']) ?></div>
            <div class="cell"><?= htmlspecialchars($user['email']) ?></div>
            <div class="cell actions">
                <a href="<?= base_url("users/{$user['id']}/edit") ?>" class="button-link">Edit</a>
                
                <form action="<?= base_url("users/{$user['id']}/delete") ?>" method="POST" style="display:inline;">
                    <button type="submit" class="button-link" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>