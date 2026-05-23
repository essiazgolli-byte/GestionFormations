<?php
$pageTitle = 'Paiement';
require 'views/partials/header.php';
?>

<div class="page-header">
  <h1>Simulation de paiement</h1>
  <p>Choisissez un mode de paiement et finalisez votre inscription.</p>
</div>

<div class="form-wrap">
  <div class="form-card fade-up">

    <!-- Étapes -->
    <div style="display:flex;gap:0;margin-bottom:2rem;">
      <?php foreach (['Inscription','Paiement','Accès cours'] as $i => $step): ?>
      <div style="flex:1;text-align:center;">
        <div style="
          width:28px;height:28px;border-radius:50%;
          background:<?= $i <= 1 ? 'var(--accent)' : 'var(--border)' ?>;
          color:<?= $i <= 1 ? '#fff' : 'var(--text-muted)' ?>;
          font-size:0.75rem;font-weight:700;
          display:inline-flex;align-items:center;justify-content:center;
          margin-bottom:0.3rem;
        "><?= $i === 0 ? '✓' : $i+1 ?></div>
        <div style="font-size:0.72rem;color:<?= $i === 1 ? 'var(--accent)' : ($i === 0 ? 'var(--accent2)' : 'var(--text-muted)') ?>;">
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

    <!-- Erreur paiement -->
    <?php if ($erreur_paiement): ?>
    <div class="alert alert-error">
      ❌ Paiement refusé. Veuillez réessayer ou choisir un autre mode de paiement.
    </div>
    <?php endif; ?>

    <!-- Récapitulatif commande -->
    <div class="paiement-summary">
      <h3>Récapitulatif de commande</h3>
      <div class="summary-row">
        <span>Formation</span>
        <span><?= htmlspecialchars($inscription['formation_titre']) ?></span>
      </div>
      <div class="summary-row">
        <span>Apprenant</span>
        <span><?= htmlspecialchars($inscription['prenom'] . ' ' . $inscription['nom']) ?></span>
      </div>
      <div class="summary-row">
        <span>Email</span>
        <span><?= htmlspecialchars($inscription['email']) ?></span>
      </div>
      <div class="summary-row total">
        <span>Total à payer</span>
        <span><?= number_format($inscription['prix'], 0, ',', ' ') ?> DT</span>
      </div>
    </div>

    <!-- Mode de paiement fictif -->
    <p style="font-size:0.78rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--text-muted);margin-bottom:0.8rem;">
      Mode de paiement
    </p>
    <div class="payment-methods" style="margin-bottom:2rem;">
      <div class="pay-method selected" id="pm-carte">
        <span>💳</span>
        <strong style="font-size:0.85rem;">Carte bancaire</strong>
        <p>Visa, Mastercard</p>
      </div>
      <div class="pay-method" id="pm-virement">
        <span>🏦</span>
        <strong style="font-size:0.85rem;">Virement</strong>
        <p>Poste Tunisienne</p>
      </div>
    </div>

    <!-- Deux boutons : réussite / échec (simulation) -->
    <form method="POST" action="index.php?page=paiement&id=<?= (int)$id ?>">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
        <button type="submit" name="mode" value="ok"
                class="btn btn-success btn-lg">
          ✅ Paiement réussi
        </button>
        <button type="submit" name="mode" value="fail"
                class="btn btn-danger btn-lg">
          ❌ Paiement refusé
        </button>
      </div>
      <p style="text-align:center;margin-top:1rem;font-size:0.78rem;color:var(--text-muted);">
        🔒 Simulation sécurisée — aucun vrai paiement n'est effectué
      </p>
    </form>

  </div>
</div>

<?php require 'views/partials/footer.php'; ?>
