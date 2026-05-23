<?php
$pageTitle = 'Mes cours';
require 'views/partials/header.php';

$prenom = htmlspecialchars($_SESSION['etudiant_prenom'] ?? 'Apprenant');
$titre  = htmlspecialchars($_SESSION['formation_titre'] ?? 'Votre formation');
?>

<div class="cours-wrap">

  <!-- Bannière de bienvenue -->
  <div class="cours-banner fade-up">
    <div>
      <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--accent2);margin-bottom:0.4rem;">
        🔓 Accès débloqué
      </div>
      <h2><?= $titre ?></h2>
      <p>Bienvenue <?= $prenom ?> ! Voici le contenu de votre formation.</p>
      <div class="progress-bar" style="max-width:300px;margin-top:0.8rem;">
        <div class="progress-fill" id="progress-fill" style="width:0%"></div>
      </div>
      <p id="progress-label" style="font-size:0.75rem;color:var(--text-muted);margin-top:0.3rem;">
        0 / <?= count($chapitres) ?> chapitres complétés
      </p>
    </div>
    <div style="text-align:right;">
      <div style="font-size:0.75rem;color:var(--text-muted);">Durée totale</div>
      <div style="font-family:var(--font-head);font-size:1.8rem;font-weight:800;color:var(--accent);">
        <?php
        $total_h = 0;
        foreach ($chapitres as $ch) {
            preg_match('/(\d+)/', $ch['duree'], $m);
            $total_h += (int)($m[1] ?? 0);
        }
        echo $total_h . 'h';
        ?>
      </div>
      <div style="font-size:0.75rem;color:var(--text-muted);"><?= count($chapitres) ?> chapitres</div>
    </div>
  </div>

  <!-- Liste des chapitres -->
  <h3 style="font-family:var(--font-head);font-weight:700;margin-bottom:1.2rem;color:var(--text-dim);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.1em;">
    Programme du cours
  </h3>

  <ul class="chapitre-list" id="chapitre-list">
    <?php foreach ($chapitres as $i => $ch): ?>
    <li class="chapitre-item fade-up fade-up-<?= min($i+1, 4) ?>"
        onclick="toggleChapitre(this, <?= $i ?>)"
        data-index="<?= $i ?>">
      <div class="chapitre-num">CH<?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></div>
      <div class="chapitre-icon"><?= $ch['icone'] ?></div>
      <div class="chapitre-info">
        <h4><?= htmlspecialchars($ch['titre']) ?></h4>
        <p><?= htmlspecialchars($ch['desc']) ?></p>
      </div>
      <div>
        <div class="chapitre-duree"><?= htmlspecialchars($ch['duree']) ?></div>
        <div id="check-<?= $i ?>" style="font-size:0.9rem;text-align:right;margin-top:0.3rem;color:var(--text-muted);">○</div>
      </div>
    </li>
    <?php endforeach; ?>
  </ul>

  <div style="margin-top:2.5rem;display:flex;gap:1rem;flex-wrap:wrap;">
    <a href="index.php?page=formations" class="btn btn-secondary">← Autres formations</a>
    <a href="index.php" class="btn btn-secondary">Accueil</a>
  </div>
</div>

<script>
const total = <?= count($chapitres) ?>;
const completed = new Set();

function toggleChapitre(el, index) {
  const check = document.getElementById('check-' + index);
  if (completed.has(index)) {
    completed.delete(index);
    check.textContent = '○';
    check.style.color = 'var(--text-muted)';
    el.style.borderColor = '';
  } else {
    completed.add(index);
    check.textContent = '✓';
    check.style.color = 'var(--accent2)';
    el.style.borderColor = 'rgba(0,212,170,0.4)';
  }
  const pct = Math.round((completed.size / total) * 100);
  document.getElementById('progress-fill').style.width = pct + '%';
  document.getElementById('progress-label').textContent =
    completed.size + ' / ' + total + ' chapitres complétés';
}
</script>

<?php require 'views/partials/footer.php'; ?>
