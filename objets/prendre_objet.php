<?php
include_once "../../include/config.php";
include_once "../../include/verif_membres.php";
if($_GET['id_objet'] > 0)
{
$verif_prendre = $bdd->prepare('SELECT * FROM  objet_position AS OP, perso_position AS PP WHERE OP.id_objet = :id AND OP.x = PP.x AND OP.y = PP.y');
$verif_prendre->execute(array('id' => $_GET['id_objet']));
$nb_objet = $verif_prendre->rowcount();
$prendre = $verif_prendre->fetch();

$req_sac = $bdd->prepare('SELECT * FROM perso_sac WHERE perso_sac.id_objet = :id_objet AND perso_sac.id_perso = :id_perso');
$req_sac->execute(array('id_objet' => $_GET['id_objet'], 'id_perso' => $result['id']));
$nb_sac = $req_sac->rowcount();
$prendre_sac = $req_sac->fetch();
if($nb_objet >= 1 AND $nb_sac == 0)
{
$insert_prendre = $bdd->prepare("INSERT INTO perso_sac (id_perso,id_objet,qtt) VALUES (:id_perso,:id_objet,:qtt)");
$insert_prendre->execute(array(
'id_perso' => $result['id'],
'id_objet' => $_GET['id_objet'], 
'qtt' => 1));
$req = $bdd->prepare('UPDATE objet_position SET nombre = ? WHERE x = ? AND y = ? AND id_objet = ?');
$req->execute(array(
$prendre['nombre']-1,
$prendre['x'],
$prendre['y'],
$_GET['id_objet']));
}
if($nb_objet >= 1 AND $nb_sac >= 1)
{
$req = $bdd->prepare('UPDATE objet_position SET nombre = ? WHERE x = ? AND y = ? AND id_objet = ?');
$req->execute(array(
$prendre['nombre']-1,
$prendre['x'],
$prendre['y'],
$_GET['id_objet']));
$req = $bdd->prepare('UPDATE perso_sac SET qtt = ? WHERE id_perso = ? AND id_objet = ?');
$req->execute(array(
$prendre_sac['qtt']+1,
$result['id'],
$_GET['id_objet']));
}
if($prendre['nombre'] <= 1)
{
$sup_objet = $bdd->prepare('DELETE FROM objet_position WHERE id_objet = :id_objet AND nombre <= 1');
$sup_objet->execute(array('id_objet' => $_GET['id_objet']));
}
	header("Location: ../../membres/accueil_membres.php");
}
?>