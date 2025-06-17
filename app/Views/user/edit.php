<h1>Edit User</h1>
<form method="POST" action="<?= base_url('users/') . $user['id'] ?>">
    Name: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>"><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br>
    <button type="submit">Update</button>
</form>
