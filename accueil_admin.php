<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Panel admin</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><p><a href = "membres/accueil_membres.php">retournez au jeu.</a></p>
<?php
include_once "../../include/verif_membres.php";
include_once "../../include/config.php";
?>
<br />
<h2>modification</h2>
<br />
<p><a href="modifier/modifier_objet.php">modifier un objet</a></p>
<p><a href="modifier/modifier_zone.php">modifier une zone.</a></p>
<p><a href="modifier/modifier_news.php">modifier une news.</a></p>
<p><a href="modifier/modifier_batiment.php">modifier un bâtiment.</a></p>
<p><a href="modifier/modifier_monstre.php">modifier un monstre.</a></p>
<p><a href="modifier/modifier_ville.php">modifier une ville.</a></p>
<br />
<h2>supression</h2>
<br />
<p><a href="supprimer/supprimer_objet.php">Supprimer un objet</a></p>
<p><a href="supprimer/supprimer_zone.php">supprimer une zone.</a></p>
<p><a href="supprimer/supprimer_ville.php">supprimer une ville.</a></p>
<p><a href="supprimer/supprimer_perso.php">supprimer un personnage.</a></p>
<p><a href="supprimer/supprimer_batiment.php">supprimer un bâtiment.</a></p>
<p><a href="supprimer/supprimer_monstre.php">supprimer un monstre.</a></p>
<p><a href="supprimer/supprimer_news.php">supprimer une news.</a></p>
<br />
<h2>création</h2>
<br />
<p><a href="ajouter/ajout_objet.php">ajouter un nouvelle objet</a></p>
<p><a href="ajouter/ajout_zone.php">ajouter une nouvelle zone.</a></p>
<p><a href="ajouter/ajout_ville.php">ajouter une nouvelle ville.</a></p>
<p><a href="ajouter/ajout_batiments.php">ajouter un nouveau bâtiment.</a></p>
<p><a href="ajouter/ajout_monstre.php">ajouter un nouveau monstre.</a></p>
<p><a href="ajouter/ajout_news.php">ajouter une nouvelle news.</a></p>
<br />
<h2>Gestion du jeu.</h2>
<br />
<p><a href="gestion/bannir_perso.php">Bannir un personnage.</a></p>
<p><a href="gestion/debannir.php">débannir un personnage.</a></p>
<p><a href="gestion/placer_monstre.php">Placer un monstre.</a></p>
<p><a href="gestion/placer_objet.php">Placer un objet.</a></p>
