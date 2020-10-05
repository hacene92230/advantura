<?php
include"../../include/verif_membres.php";
include"../../include/config.php";
echo '<p><a href="envoi_messages.php"> envoyer un message<a></p>';
$req = 'SELECT COUNT(*) AS nb FROM messagerie WHERE destinataire = "'.$result['pseudo'].'"';
$result = $bdd->query($req);
$columns = $result->fetch();
$nb = $columns['nb'];
echo '<p><a href="reception_message.php">'. "vous avez ". $nb." messages reçu".'<a></p>';
echo '<p><a href="envoi_message.php"> envoyer un message<a></p>';
echo '<p><a href="supprimer_message.php"> supprimer un message<a></p>';
echo '<p><a href="../../membres/accueil_membres.php"> revenir au jeu<a></p>';
?>