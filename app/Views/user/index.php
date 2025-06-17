<h1>User List</h1>
<a href="<?= base_url('users/create') ?>">Add New User</a>
<ul>
<?php foreach ($users as $user): ?>
    <li>
        <?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['email']) ?>)
        <a href="<?= base_url("users/{$user['id']}/edit") ?>">Edit</a>
        <form action="<?= base_url("users/{$user['id']}/delete") ?>" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>