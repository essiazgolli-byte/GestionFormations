<?php
// controllers/FormationController.php
require_once 'models/Formation.php';

$formations  = Formation::getAll();
$categories  = Formation::getCategories();

// Filtre par catégorie (optionnel)
$filtre = $_GET['categorie'] ?? '';
if ($filtre && in_array($filtre, $categories)) {
    $formations = Formation::getByCategorie($filtre);
}

require 'views/formations.php';
?>
