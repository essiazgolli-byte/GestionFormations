<?php
$pageTitle = 'Accueil';
require 'views/partials/header.php';
?>

<!-- Hero -->
<section class="hero">
  <div class="hero-tag">🚀 Plateforme d'apprentissage en ligne</div>
  <h1 class="fade-up">
    Maîtrisez les<br>
    <em>technologies de demain</em>
  </h1>
  <p class="fade-up fade-up-1">
    Des formations professionnelles en développement web, intelligence artificielle,
    cybersécurité et réseaux. Apprenez à votre rythme, obtenez votre certificat.
  </p>
  <div class="hero-actions fade-up fade-up-2">
    <a href="index.php?page=formations" class="btn btn-primary btn-lg">
      Voir les formations →
    </a>
    <a href="index.php?page=inscription" class="btn btn-secondary btn-lg">
      S'inscrire gratuitement
    </a>
  </div>
</section>

<!-- Stats -->
<div class="stats-bar fade-up fade-up-3">
  <div class="stat-item">
    <span class="stat-number">4+</span>
    <span class="stat-label">Formations</span>
  </div>
  <div class="stat-item">
    <span class="stat-number">200+</span>
    <span class="stat-label">Apprenants</span>
  </div>
  <div class="stat-item">
    <span class="stat-number">195h</span>
    <span class="stat-label">Contenu vidéo</span>
  </div>
  <div class="stat-item">
    <span class="stat-number">98%</span>
    <span class="stat-label">Satisfaction</span>
  </div>
</div>

<!-- Features -->
<section class="features-section">
  <div class="section-head">
    <h2>Pourquoi choisir EduTech ?</h2>
    <p>Une expérience d'apprentissage pensée pour les professionnels de demain.</p>
  </div>
  <div class="features-grid">
    <div class="feature-card fade-up fade-up-1">
      <div class="feature-icon">🎯</div>
      <h4>Contenu ciblé</h4>
      <p>Des programmes conçus avec des experts du secteur pour répondre aux besoins du marché.</p>
    </div>
    <div class="feature-card fade-up fade-up-2">
      <div class="feature-icon">⚡</div>
      <h4>Apprentissage rapide</h4>
      <p>Méthode intensive avec projets pratiques pour une montée en compétences accélérée.</p>
    </div>
    <div class="feature-card fade-up fade-up-3">
      <div class="feature-icon">🏆</div>
      <h4>Certificats reconnus</h4>
      <p>Obtenez un certificat valorisé par les employeurs à l'issue de chaque formation.</p>
    </div>
    <div class="feature-card fade-up fade-up-4">
      <div class="feature-icon">🔐</div>
      <h4>Accès sécurisé</h4>
      <p>Votre espace personnel protégé, accessible après confirmation de paiement.</p>
    </div>
  </div>
</section>

<!-- CTA -->
<section style="text-align:center; padding: 4rem 1.5rem;">
  <h2 style="font-family:var(--font-head);font-size:2rem;font-weight:800;margin-bottom:1rem;letter-spacing:-0.03em;">
    Prêt à démarrer votre parcours ?
  </h2>
  <p style="color:var(--text-dim);margin-bottom:2rem;">
    Choisissez votre formation et rejoignez notre communauté d'apprenants.
  </p>
  <a href="index.php?page=formations" class="btn btn-primary btn-lg">
    Explorer les formations →
  </a>
</section>

<?php require 'views/partials/footer.php'; ?>
