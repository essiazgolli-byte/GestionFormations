<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle ?? 'GestionFormations') ?> — EduTech</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎓</text></svg>">
</head>
<body>

<nav class="navbar">
  <a href="index.php" class="nav-brand">
    <span class="dot"></span>
    Edu<span>Tech</span>
  </a>
  <ul class="nav-links">
    <li><a href="index.php" <?= ($page ?? '') === 'home' || ($page ?? '') === '' ? 'class="active"' : '' ?>>Accueil</a></li>
    <li><a href="index.php?page=formations" <?= ($page ?? '') === 'formations' ? 'class="active"' : '' ?>>Formations</a></li>
    <li><a href="index.php?page=inscription" class="btn-nav">S'inscrire</a></li>
  </ul>
</nav>

<div class="page-content">
