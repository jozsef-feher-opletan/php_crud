<h2>Create Post</h2>
<p><a href="<?= base_url('users') ?>" class="button-link">Back to Post List</a></p>

<form method="POST" action="<?= base_url('posts') ?>">
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
                    <option value="<?= htmlspecialchars($user['id']) ?>">
                        <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="cell">
            <input type="text" name="title" required>
        </div>
        <div class="cell">
            <textarea id="content" name="content" rows="10" cols="40" required></textarea>
        </div>
        <div class="cell actions">
            <?= CSRF::getTokenInputField() ?>
            <button type="submit" class="button-link">Create</button>
        </div>
    </div>
</div>
</form>