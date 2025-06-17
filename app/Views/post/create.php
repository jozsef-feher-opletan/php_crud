<h1>Create Post</h1>
<form method="POST" action="<?= base_url('/posts') ?>">
    Username: <input type="text" name="username"><br>
    Title: <input type="text" name="title"><br>
    Post: <textarea id="content" name="content" rows="10" cols="40"></textarea><br>
    <button type="submit">Create</button>
</form>
