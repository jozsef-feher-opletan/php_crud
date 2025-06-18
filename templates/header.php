<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'CRUD Admin Page' ?></title>
  <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
  <header>
    <h2>CRUD Admin Page</h2>
    <nav>
      <a href="<?= base_url('/'); ?>" class="button-link">Home</a>
    </nav>
    <hr>
  </header>
  <main>