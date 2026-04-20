<?php
$nom = "essia";
$prenom = "zgolli";
$email = "assia.zgolli@edu.isetcom.tn";
$age = 21;
$ville = "Mnkhilette";
$formation = "Gestion des technologies des information et communications";
echo "<p> Bienvenue $prenom dans la formation  $formation Notre organisation vous souhaite beaucoup de réussite dans votre parcours.  </p>";
$formations = ["Développement Web", "Réseaux", "Sécurité", "Base de données"];
foreach ($formations as $formation) {
echo $formation . "<br>";
}$utilisateur = [
"nom" => "agolli",
"prenom" => "Assia",
"email" => "assia@email.com",
"formation" => "Développement Web"
"age"=> 21];
echo "Nom : " . $utilisateur["nom"] . "<br>";
echo "Prénom : " . $utilisateur["prenom"] . "<br>";
echo "Email : " . $utilisateur["email"] . "<br>";
echo "Formation : " . $utilisateur["formation"];
echo "age : " . $utilisateur["age"]; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil utilisateur</title>
</head>
<body>
<h1>Profil utilisateur</h1>
<p><strong>Nom :</strong> <?= $nom ?></p>
<p><strong>Prénom :</strong> <?= $prenom ?></p>
<p><strong>Email :</strong> <?= $email ?></p>
</body>
</html
