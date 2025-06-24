<!DOCTYPE html>
<?php
require_once '../app/helpers/csrf.php';
require_once '../app/filters/CsrfFilter.php';
CSRF::start();
CsrfFilter::handle();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'CRUD Admin Page' ?></title>
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
  <header>
    <h1 class="center-text">CRUD Admin Page</h1>
    <nav class="center-text">
      <a href="<?= base_url('/'); ?>" class="button-link">Home</a>
    </nav>
    <hr>
  </header>
  <main>