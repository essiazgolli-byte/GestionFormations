# GestionFormations — Plateforme EduTech
## TP 6 : Architecture MVC — ISET'COM · Licence GTIC · Dr. Asma Ayari

---

## 📦 Installation

### 1. Prérequis
- XAMPP (Apache + PHP 8.1+ + MySQL)
- Visual Studio Code

### 2. Mise en place
1. Copiez le dossier `GestionFormations/` dans `C:/xampp/htdocs/`
2. Démarrez **Apache** et **MySQL** dans XAMPP Control Panel
3. Ouvrez **phpMyAdmin** → http://localhost/phpmyadmin
4. Créez une base de données `gestion_formations` (ou exécutez le script ci-dessous)
5. Importez `database.sql` via phpMyAdmin → onglet **Import**

### 3. Accès
Ouvrez http://localhost/GestionFormations/ dans votre navigateur.

---

## 🗂️ Structure MVC

```
GestionFormations/
├── index.php                  ← Routeur central (point d'entrée unique)
├── controllers/
│   ├── FormationController.php
│   ├── InscriptionController.php
│   ├── PaiementController.php
│   └── CoursController.php
├── models/
│   ├── Database.php           ← Singleton PDO
│   ├── Formation.php
│   └── Inscription.php
├── views/
│   ├── partials/
│   │   ├── header.php
│   │   └── footer.php
│   ├── home.php
│   ├── formations.php
│   ├── inscription.php
│   ├── paiement.php
│   ├── succes.php
│   └── cours.php
├── assets/
│   └── style.css
├── database.sql
└── README.md
```

---

## 🧪 Tests à réaliser (TP)

| Étape | URL / Action | Résultat attendu |
|-------|-------------|-----------------|
| 1 | `http://localhost/GestionFormations/` | Page d'accueil s'affiche |
| 2 | Clic sur **Formations** | Liste des 4 formations depuis la BD |
| 3 | Clic sur **S'inscrire** sur une formation | Formulaire pré-rempli |
| 4 | Soumettre le formulaire valide | Redirection vers paiement |
| 5 | Clic sur **Paiement réussi** | Page de succès |
| 6 | Clic sur **Accéder aux cours** | Page cours avec chapitres |
| 7 | Accès direct `?page=cours` sans session | Redirection forcée vers accueil |
| 8 | Vérifier phpMyAdmin | `statut_paiement = paye` dans `inscriptions` |

---

## ✨ Fonctionnalités supplémentaires

- **Filtrage** des formations par catégorie
- **Validation complète** du formulaire (doublon email, champs vides, email invalide)
- **Barre de progression** interactive dans les cours (cliquer sur les chapitres)
- **Design Dark Tech** responsive avec animations CSS
- **Chapitres dynamiques** selon la formation choisie
- **Protection session** stricte sur la page cours
