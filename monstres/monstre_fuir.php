<?php
include_once "../include/config.php";
include_once "../include/verif_membres.php";
if($_GET['action'] == 'fuir')
{
$req = $bdd->prepare('UPDATE perso SET xp_max = ? WHERE id = ?');
$req->execute(array(
$result['xp_max']-round($result['xp_max']/80),
$result['id']));
$perte = round($result['xp_max']/80);
echo 'vous décidez de fuir, à ce titre vous perdez '.$perte.' xp';
echo '<p><a href="../membres/accueil_membres.php">retournez au jeu</a></p>';
}