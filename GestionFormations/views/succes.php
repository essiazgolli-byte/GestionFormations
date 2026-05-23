<?php
$pageTitle = 'Paiement confirmé';
require 'views/partials/header.php';

// Récupérer les données de session
$prenom  = htmlspecialchars($_SESSION['etudiant_prenom']  ?? 'Apprenant');
$titre   = htmlspecialchars($_SESSION['formation_titre']  ?? 'la formation');
?>

<div class="succes-wrap">
  <span class="succes-icon">🎉</span>
  <h1>Félicitations, <?= $prenom ?> !</h1>
  <p>
    Votre inscription à <strong><?= $titre ?></strong> est confirmée.<br>
    Votre paiement a été enregistré avec succès.
  </p>

  <div class="alert alert-success" style="text-align:left;">
    ✅ Paiement validé<br>
    🎓 Accès aux cours débloqué<br>
    📧 Un email de confirmation vous sera envoyé
  </div>

  <div style="display:flex;flex-direction:column;gap:1rem;margin-top:1.5rem;">
    <a href="index.php?page=cours" class="btn btn-primary btn-lg btn-full">
      🚀 Accéder à mes cours →
    </a>
    <a href="index.php?page=formations" class="btn btn-secondary btn-full">
      Voir d'autres formations
    </a>
  </div>
</div>

<?php require 'views/partials/footer.php'; ?>
