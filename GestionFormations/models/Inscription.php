<?php
// models/Inscription.php — Requêtes SQL sur la table inscriptions
require_once __DIR__ . '/Database.php';

class Inscription {

    /** Insère une nouvelle inscription et retourne l'ID créé */
    public static function ajouter(string $nom, string $prenom, string $email, string $telephone, int $formation_id): int {
        $pdo = Database::connect();

        // Vérifier doublon
        $check = $pdo->prepare('SELECT id FROM inscriptions WHERE email = ? AND formation_id = ?');
        $check->execute([$email, $formation_id]);
        if ($check->fetch()) {
            throw new Exception('Cet email est déjà inscrit à cette formation.');
        }

        $stmt = $pdo->prepare(
            'INSERT INTO inscriptions (nom, prenom, email, telephone, formation_id, statut_paiement, date_inscription)
             VALUES (?, ?, ?, ?, ?, "en_attente", NOW())'
        );
        $stmt->execute([$nom, $prenom, $email, $telephone, $formation_id]);
        return (int) $pdo->lastInsertId();
    }

    /** Retourne une inscription + titre et prix de sa formation */
    public static function getById(int $id): array|false {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare(
            'SELECT i.*, f.titre AS formation_titre, f.prix, f.duree, f.niveau, f.description AS formation_desc
             FROM inscriptions i
             JOIN formations f ON i.formation_id = f.id
             WHERE i.id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /** Marque le paiement comme effectué */
    public static function marquerPaye(int $id): void {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare('UPDATE inscriptions SET statut_paiement = "paye" WHERE id = ?');
        $stmt->execute([$id]);
    }
}
?>
