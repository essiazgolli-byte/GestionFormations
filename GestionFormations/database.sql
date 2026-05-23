-- ============================================================
--  GestionFormations — Script de création de la base de données
-- ============================================================

CREATE DATABASE IF NOT EXISTS gestion_formations
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE gestion_formations;

-- ── Table formations ────────────────────────────────────────
CREATE TABLE IF NOT EXISTS formations (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre       VARCHAR(150)   NOT NULL,
    description TEXT           NOT NULL,
    prix        DECIMAL(8,2)   NOT NULL,
    duree       VARCHAR(50)    NOT NULL,   -- ex: "40 heures"
    niveau      ENUM('Débutant','Intermédiaire','Avancé') NOT NULL DEFAULT 'Débutant',
    categorie   VARCHAR(80)    NOT NULL DEFAULT 'Général',
    image_url   VARCHAR(255)   NULL,
    places      INT UNSIGNED   NOT NULL DEFAULT 30,
    created_at  TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ── Table inscriptions ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS inscriptions (
    id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom              VARCHAR(80)  NOT NULL,
    prenom           VARCHAR(80)  NOT NULL,
    email            VARCHAR(150) NOT NULL,
    telephone        VARCHAR(20)  NULL,
    formation_id     INT UNSIGNED NOT NULL,
    statut_paiement  ENUM('en_attente','paye','annule') NOT NULL DEFAULT 'en_attente',
    date_inscription DATETIME     NOT NULL,
    CONSTRAINT fk_inscription_formation
        FOREIGN KEY (formation_id) REFERENCES formations(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ── Données de test ─────────────────────────────────────────
INSERT INTO formations (titre, description, prix, duree, niveau, categorie) VALUES
(
    'Développement Web Full-Stack',
    'Maîtrisez HTML, CSS, JavaScript, PHP et MySQL pour créer des applications web complètes. Ce cours couvre les fondamentaux jusqu''aux concepts avancés comme les APIs REST et l''architecture MVC.',
    299.00, '60 heures', 'Intermédiaire', 'Développement Web'
),
(
    'Python & Intelligence Artificielle',
    'Explorez Python, la bibliothèque scikit-learn, TensorFlow et la création de modèles de machine learning. Idéal pour les passionnés de data science et d''IA.',
    349.00, '50 heures', 'Avancé', 'Intelligence Artificielle'
),
(
    'Cybersécurité & Ethical Hacking',
    'Apprenez à protéger les systèmes informatiques : audit de sécurité, tests d''intrusion, analyse de vulnérabilités et mise en place de contre-mesures efficaces.',
    399.00, '45 heures', 'Avancé', 'Cybersécurité'
),
(
    'Réseaux & Administration Systèmes',
    'Configurez et gérez des réseaux locaux et étendus. Couvre les protocoles TCP/IP, VLAN, routage, switching, et l''administration Linux/Windows Server.',
    249.00, '40 heures', 'Débutant', 'Réseaux'
);
