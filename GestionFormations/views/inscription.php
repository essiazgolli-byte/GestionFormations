<?php
$pageTitle = 'Inscription';
require 'views/partials/header.php';
?>

<div class="page-header">
  <h1>Formulaire d'inscription</h1>
  <p>Renseignez vos informations pour rejoindre une formation.</p>
</div>

<div class="form-wrap">
  <div class="form-card fade-up">

    <!-- Étapes visuelles -->
    <div style="display:flex;gap:0;margin-bottom:2rem;">
      <?php foreach (['Inscription','Paiement','Accès cours'] as $i => $step): ?>
      <div style="flex:1;text-align:center;">
        <div style="
          width:28px;height:28px;
          border-radius:50%;
          background:<?= $i === 0 ? 'var(--accent)' : 'var(--border)' ?>;
          color:<?= $i === 0 ? '#fff' : 'var(--text-muted)' ?>;
          font-size:0.75rem;font-weight:700;
          display:inline-flex;align-items:center;justify-content:center;
          margin-bottom:0.3rem;
        "><?= $i+1 ?></div>
        <div style="font-size:0.72rem;color:<?= $i === 0 ? 'var(--accent)' : 'var(--text-muted)' ?>;">
          <?= $step ?>
        </div>
      </div>
      <?php if ($i < 2): ?>
      <div style="flex:0.5;display:flex;align-items:center;padding-bottom:1.4rem;">
        <div style="height:1px;width:100%;background:var(--border);"></div>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <!-- Erreurs -->
    <?php if (!empty($erreurs)): ?>
    <div class="alert alert-error">
      <strong>Erreurs détectées :</strong>
      <ul>
        <?php foreach ($erreurs as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=inscription">

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
        <div class="form-group">
          <label for="nom">Nom *</label>
          <input type="text" id="nom" name="nom"
                 value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                 placeholder="Ben Ali" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom *</label>
          <input type="text" id="prenom" name="prenom"
                 value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>"
                 placeholder="Mohamed" required>
        </div>
      </div>

      <div class="form-group">
        <label for="email">Adresse email *</label>
        <input type="email" id="email" name="email"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
               placeholder="exemple@email.com" required>
      </div>

      <div class="form-group">
        <label for="telephone">Téléphone <span style="color:var(--text-muted)">(optionnel)</span></label>
        <input type="tel" id="telephone" name="telephone"
               value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>"
               placeholder="+216 XX XXX XXX">
      </div>

      <div class="form-group">
        <label for="formation_id">Formation choisie *</label>
        <select id="formation_id" name="formation_id" required>
          <option value="">— Sélectionner une formation —</option>
          <?php foreach ($formations as $f): ?>
          <option value="<?= (int)$f['id'] ?>"
            <?= ($formation_preselect == $f['id'] || (isset($_POST['formation_id']) && $_POST['formation_id'] == $f['id'])) ? 'selected' : '' ?>>
            <?= htmlspecialchars($f['titre']) ?> — <?= number_format($f['prix'], 0, ',', ' ') ?> DT
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-primary btn-full btn-lg">
        Continuer vers le paiement →
      </button>
    </form>
  </div>
</div>

<?php require 'views/partials/footer.php'; ?>
