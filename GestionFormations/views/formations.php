<?php
$pageTitle = 'Formations';
require 'views/partials/header.php';
?>

<div class="page-header">
  <h1>Toutes les formations</h1>
  <p>Choisissez la formation qui correspond à votre objectif professionnel.</p>
</div>

<!-- Filtres catégories -->
<div class="filter-bar">
  <a href="index.php?page=formations"
     class="filter-btn <?= empty($filtre) ? 'active' : '' ?>">
    Toutes
  </a>
  <?php foreach ($categories as $cat): ?>
  <a href="index.php?page=formations&categorie=<?= urlencode($cat) ?>"
     class="filter-btn <?= $filtre === $cat ? 'active' : '' ?>">
    <?= htmlspecialchars($cat) ?>
  </a>
  <?php endforeach; ?>
</div>

<!-- Grille de formations -->
<div class="cards-grid">
  <?php if (empty($formations)): ?>
    <p style="color:var(--text-dim);grid-column:1/-1;text-align:center;padding:3rem;">
      Aucune formation disponible pour le moment.
    </p>
  <?php endif; ?>

  <?php foreach ($formations as $f): ?>
  <div class="card fade-up">
    <div class="card-cat"><?= htmlspecialchars($f['categorie']) ?></div>
    <h3><?= htmlspecialchars($f['titre']) ?></h3>
    <p><?= htmlspecialchars(mb_substr($f['description'], 0, 120)) ?>…</p>

    <div class="card-meta">
      <span class="badge badge-level"><?= htmlspecialchars($f['niveau']) ?></span>
      <span class="badge badge-duree">⏱ <?= htmlspecialchars($f['duree']) ?></span>
      <span class="badge">👥 <?= (int)$f['places'] ?> places</span>
    </div>

    <div class="card-footer">
      <div class="card-price">
        <?= number_format($f['prix'], 0, ',', ' ') ?> DT
        <span>/ accès complet</span>
      </div>
      <a href="index.php?page=inscription&formation_id=<?= (int)$f['id'] ?>"
         class="btn btn-primary">
        S'inscrire →
      </a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<?php require 'views/partials/footer.php'; ?>
