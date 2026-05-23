<?php
// models/Formation.php — Requêtes SQL sur la table formations
require_once __DIR__ . '/Database.php';

class Formation {

    /** Retourne toutes les formations */
    public static function getAll(): array {
        $pdo  = Database::connect();
        $stmt = $pdo->query('SELECT * FROM formations ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    /** Retourne une formation par son ID */
    public static function getById(int $id): array|false {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM formations WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /** Retourne les formations filtrées par catégorie */
    public static function getByCategorie(string $categorie): array {
        $pdo  = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM formations WHERE categorie = ? ORDER BY titre');
        $stmt->execute([$categorie]);
        return $stmt->fetchAll();
    }

    /** Toutes les catégories disponibles */
    public static function getCategories(): array {
        $pdo  = Database::connect();
        $stmt = $pdo->query('SELECT DISTINCT categorie FROM formations ORDER BY categorie');
        return array_column($stmt->fetchAll(), 'categorie');
    }
}
?>
