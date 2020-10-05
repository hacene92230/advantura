<?php
include_once "../include/config.php";
include_once "../include/verif_membres.php";
include_once "../map/map_affichage.php";
$req = $bdd->prepare('SELECT * FROM monstre_combat AS MC, perso AS P INNER JOIN monstres AS M WHERE M.id_monstre = MC.id_monstre and MC.id_monstre = :id_monstre and MC.id_combat = :id_combat and MC.x = P.x and MC.y = P.y');
$req->execute(array('id_combat' => $_GET['id_combat'], 'id_monstre' => $_GET['id_monstre']));
$monstre = $req->fetch();

if($_GET['id_monstre'] == $monstre['id_monstre'] and $_GET['action'] == "" and $_GET['id_combat'] != "" and $_GET['id_combat'] != 0)
{
	echo "<h2>".$monstre['nom_monstre'].'</h2>';
echo '<p>vie restante: '.$monstre['rest_pv_monstre'].'/'.$monstre['pv_monstre'].'</p>';
echo '<p><a href="monstre_combat.php?id_monstre='.$monstre['id_monstre'].'&amp;id_combat='.$monstre['id_combat'].'&amp;action=attaquer">attaquer</a></p>';
echo '<p><a href="monstre_fuir.php?id_monstre='.$monstre['id_monstre'].'&amp;action=fuir">fuir</a></p>';
}

if($_GET['id_monstre'] == $monstre['id_monstre'] and $_GET['action'] == "attaquer")
{
echo "<h2>".$monstre['nom_monstre'].'</h2>';
echo '<p><a href="monstre_combat.php?id_monstre='.$monstre['id_monstre'].'&amp;id_combat='.$monstre['id_combat'].'&amp;action=attaquer">attaquer</a></p>';
echo '<p><a href="monstre_fuir.php?id_monstre='.$monstre['id_monstre'].'&amp;action=abandon">abandonner</a></p>';

$attaque_perso = rand($result['att_min'],$result['att_max'])-$monstre['eskive_monstre'];
if($monstre['eskive_monstre'] >= $attaque_perso)
{
$attaque_perso = 0;
}
$vie_monstre = $monstre['rest_pv_monstre']-$attaque_perso;
$req = $bdd->prepare('UPDATE monstre_combat SET rest_pv_monstre = ? WHERE id_combat = ? and id_monstre = ?');
$req->execute(array(
$vie_monstre,
$_GET['id_combat'],
$_GET['id_monstre']));
echo "<p>vous atteignez ".$monstre['nom_monstre'].' '.$attaque_perso. "points</p>";
echo '<p>'.$monstre['nom_monstre'].' réussit à parré '.$monstre['eskive_monstre'].' points</p>';
echo '<p>il lui reste '.$vie_monstre.' points de vie</p>';

$attaque_monstre = mt_rand($monstre['att_min'],$monstre['att_max'])-$result['eskive_perso'];
$vie_perso = $result['pv']-$attaque_monstre;
$req = $bdd->prepare('UPDATE perso SET pv = ? WHERE id = ?');
$req->execute(array(
$vie_perso,
$result['id']));
echo "<p>".$monstre['nom_monstre'].' vous atteind '.$attaque_monstre. "points</p>";
echo '<p>vous réussissez à parré '.$result['eskive_perso'].' points</p>';
echo '<p>il vous reste '.$vie_perso.' points de vie</p>';

if($vie_monstre <= 0)
{
$mod_combat = $bdd->prepare('UPDATE monstre_combat SET resultat_combat = ? WHERE rest_pv_monstre <= 0 ');
$mod_combat->execute(array(
'mort'));
header('location: monstre_recompense.php?id_combat='.$monstre['id_combat'].'');
}
}
?>