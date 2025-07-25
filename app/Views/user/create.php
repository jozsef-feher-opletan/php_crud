<h2>Create User</h2>
<p><a href="<?= base_url('users') ?>" class="button-link">Back to User List</a></p>

<form method="POST" action="<?= base_url('/users') ?>">
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <p><?= $_SESSION['error']; ?></p>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <p><?= $_SESSION['success']; ?></p>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
<div class="table">
    <div class="row header">
        <div class="cell">Username</div>
        <div class="cell">Email</div>
        <div class="cell">Actions</div>
    </div>
    <div class="row">
        <div class="cell">
            <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['old']['username'] ?? '') ?>" required>
        </div>
        <div class="cell">
            <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>" required>
        </div>
        <div class="cell actions">
            <?= CSRF::getTokenInputField() ?>
            <button type="submit" class="button-link">Create</button>
        </div>
    </div>
</div>
</form>