<?php
include_once "../include/config.php";
include_once "../include/verif_membres.php";
$req = $bdd->prepare('SELECT * FROM monstre_combat, monstres where monstre_combat.resultat_combat = :combat and monstre_combat.id_combat = :id');
$req->execute(array('combat' => "mort", 'id' => $_GET['id_combat']));
$monstre = $req->fetch();
$req = $bdd->prepare('UPDATE perso SET xp_max = ? WHERE id = ?');
$req->execute(array(
$result['xp_max']+$monstre['gain_xp'],
$result['id']));
echo '<p>Vous avez tuer le monstre.</p>';
echo '<p>vous gagnez: '.$monstre['gain_xp'].'xp</p>';
echo '<p><a href="../membres/accueil_membres.php">retournez au jeu</a></p>';
$req = $bdd->prepare('delete from monstre_combat where id_combat = :id');
$req->execute(array('id' => $_GET['id_combat']));
?>