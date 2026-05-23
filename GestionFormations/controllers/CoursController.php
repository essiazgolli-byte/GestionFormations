<?php
// controllers/CoursController.php
// La protection de session est déjà faite dans index.php
// Ici on prépare les données des chapitres

require_once 'models/Inscription.php';
require_once 'models/Formation.php';

$inscription_id = $_SESSION['inscription_id'] ?? 0;
$inscription    = $inscription_id ? Inscription::getById($inscription_id) : null;

// Chapitres fictifs selon la formation
$chapitres_par_formation = [
    'Développement Web Full-Stack' => [
        ['titre' => 'Introduction au Web', 'icone' => '🌐', 'duree' => '3h', 'desc' => 'Histoire du web, protocoles HTTP/HTTPS, architecture client-serveur.'],
        ['titre' => 'HTML5 & Sémantique', 'icone' => '📄', 'duree' => '5h', 'desc' => 'Balises sémantiques, formulaires, accessibilité.'],
        ['titre' => 'CSS3 & Responsive Design', 'icone' => '🎨', 'duree' => '6h', 'desc' => 'Flexbox, Grid, Media Queries, animations CSS.'],
        ['titre' => 'JavaScript Moderne (ES6+)', 'icone' => '⚡', 'duree' => '10h', 'desc' => 'Fonctions fléchées, Promises, Fetch API, DOM.'],
        ['titre' => 'PHP & Architecture MVC', 'icone' => '🐘', 'duree' => '12h', 'desc' => 'PHP orienté objet, PDO, routeur, sessions.'],
        ['titre' => 'MySQL & Base de données', 'icone' => '🗄️', 'duree' => '8h', 'desc' => 'Modélisation, requêtes SQL avancées, jointures.'],
        ['titre' => 'Projet Final Full-Stack', 'icone' => '🚀', 'duree' => '16h', 'desc' => 'Développement d\'une application web complète.'],
    ],
    'Python & Intelligence Artificielle' => [
        ['titre' => 'Python Fondamentaux', 'icone' => '🐍', 'duree' => '8h', 'desc' => 'Syntaxe, structures de données, fonctions, POO.'],
        ['titre' => 'NumPy & Pandas', 'icone' => '📊', 'duree' => '6h', 'desc' => 'Manipulation de données, DataFrames, visualisation.'],
        ['titre' => 'Machine Learning avec scikit-learn', 'icone' => '🤖', 'duree' => '10h', 'desc' => 'Régression, classification, clustering, évaluation.'],
        ['titre' => 'Deep Learning & TensorFlow', 'icone' => '🧠', 'duree' => '12h', 'desc' => 'Réseaux de neurones, CNN, RNN, transfer learning.'],
        ['titre' => 'Projet IA Complet', 'icone' => '🎯', 'duree' => '14h', 'desc' => 'Conception et déploiement d\'un modèle de A à Z.'],
    ],
    'Cybersécurité & Ethical Hacking' => [
        ['titre' => 'Fondamentaux de la sécurité', 'icone' => '🛡️', 'duree' => '6h', 'desc' => 'CIA Triad, types d\'attaques, surface d\'attaque.'],
        ['titre' => 'Reconnaissance & OSINT', 'icone' => '🔍', 'duree' => '5h', 'desc' => 'Nmap, Shodan, collecte d\'informations passives.'],
        ['titre' => 'Exploitation & Metasploit', 'icone' => '💥', 'duree' => '8h', 'desc' => 'Vulnérabilités courantes, exploitation contrôlée.'],
        ['titre' => 'Sécurité Web (OWASP Top 10)', 'icone' => '🌐', 'duree' => '8h', 'desc' => 'SQL Injection, XSS, CSRF, Burp Suite.'],
        ['titre' => 'Forensics & Rapports', 'icone' => '📝', 'duree' => '8h', 'desc' => 'Analyse post-incident, rédaction de rapport de pentest.'],
        ['titre' => 'Projet CTF Final', 'icone' => '🏆', 'duree' => '10h', 'desc' => 'Résolution de challenges Capture The Flag.'],
    ],
    'Réseaux & Administration Systèmes' => [
        ['titre' => 'Modèle OSI & TCP/IP', 'icone' => '📡', 'duree' => '5h', 'desc' => 'Couches, encapsulation, protocoles fondamentaux.'],
        ['titre' => 'Routage & Switching', 'icone' => '🔀', 'duree' => '8h', 'desc' => 'OSPF, BGP, VLAN, Spanning Tree, Cisco IOS.'],
        ['titre' => 'Administration Linux', 'icone' => '🐧', 'duree' => '8h', 'desc' => 'Shell, gestion des droits, services, scripting Bash.'],
        ['titre' => 'Windows Server', 'icone' => '🪟', 'duree' => '6h', 'desc' => 'Active Directory, GPO, DHCP, DNS, IIS.'],
        ['titre' => 'Virtualisation & Cloud', 'icone' => '☁️', 'duree' => '7h', 'desc' => 'VMware, VirtualBox, bases AWS/Azure.'],
        ['titre' => 'Projet Infrastructure', 'icone' => '🏗️', 'duree' => '6h', 'desc' => 'Concevoir et déployer un réseau d\'entreprise complet.'],
    ],
];

$titre_formation = $inscription['formation_titre'] ?? 'Formation';
$chapitres = $chapitres_par_formation[$titre_formation]
    ?? $chapitres_par_formation['Développement Web Full-Stack'];

require 'views/cours.php';
?>
