<?php
// controllers/InscriptionController.php
require_once 'models/Inscription.php';
require_once 'models/Formation.php';

$erreurs    = [];
$formations = Formation::getAll();
$formation_preselect = isset($_GET['formation_id']) ? (int)$_GET['formation_id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom          = trim($_POST['nom']          ?? '');
    $prenom       = trim($_POST['prenom']       ?? '');
    $email        = trim($_POST['email']        ?? '');
    $telephone    = trim($_POST['telephone']    ?? '');
    $formation_id = (int)($_POST['formation_id'] ?? 0);

    // Validation
    if (empty($nom))    $erreurs[] = 'Le nom est obligatoire.';
    if (empty($prenom)) $erreurs[] = 'Le prénom est obligatoire.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs[] = 'Adresse email invalide.';
    if ($formation_id <= 0) $erreurs[] = 'Veuillez choisir une formation.';

    if (empty($erreurs)) {
        try {
            $id = Inscription::ajouter($nom, $prenom, $email, $telephone, $formation_id);
            header('Location: index.php?page=paiement&id=' . $id);
            exit();
        } catch (Exception $e) {
            $erreurs[] = $e->getMessage();
        }
    }
}

require 'views/inscription.php';
?>
