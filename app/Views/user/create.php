<h2>Create User</h2>
<p><a href="<?= base_url('users') ?>" class="button-link">Back to User List</a></p>

<form method="POST" action="<?= base_url('/users') ?>">
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Email</div>
        <div class="cell">Actions</div>
    </div>
    <div class="row">
        <div class="cell">
            <input type="text" name="username" required>
        </div>
        <div class="cell">
            <input type="email" name="email" required>
        </div>
        <div class="cell actions">
            <button type="submit" class="button-link">Create</button>
        </div>
    </div>
</div>
</form>