<?php
include_once "../include/config.php";
include_once "../include/verif_membres.php";
if($_GET['dirrection'] == 'nord')
{
$req = $bdd->prepare('UPDATE perso SET id = ?, x = ?, y = ?WHERE id ='.$result['id']);
try
{
$req->execute(array(
$result['id'],
$result['x'],
$result['y']-1));
header("Location: ../../membres/accueil_membres.php");
die();
}
  catch (Exception $ex)
	{}
	die('Erreur lors de votre déplacement.');
$reponse->closeCursor();
}
if($_GET['dirrection'] == 'est')
{
$req = $bdd->prepare('UPDATE perso SET id = ?, x = ?, y = ?WHERE id ='.$result['id']);
try
{
$req->execute(array(
$result['id'],
$result['x']+1,
$result['y']));
header("Location: ../../membres/accueil_membres.php");
die();
}
  catch (Exception $ex)
	{}
	die('Erreur lors de votre déplacement.');
$reponse->closeCursor();
}
if($_GET['dirrection'] == 'ouest')
{
$req = $bdd->prepare('UPDATE perso SET id = ?, x = ?, y = ?WHERE id ='.$result['id']);
try
{
$req->execute(array(
$result['id'],
$result['x']-1,
$result['y']));
header("Location: ../../membres/accueil_membres.php");
die();
}
  catch (Exception $ex)
	{}
	die('Erreur lors de votre déplacement.');
$reponse->closeCursor();
}
if($_GET['dirrection'] == 'sud')
{
$req = $bdd->prepare('UPDATE perso SET id = ?, x = ?, y = ?WHERE id ='.$result['id']);
try
{
$req->execute(array(
$result['id'],
$result['x'],
$result['y']+1));
header("Location: ../../membres/accueil_membres.php");
die();
}
  catch (Exception $ex)
	{}
	die('Erreur lors de votre déplacement.');
$reponse->closeCursor();
}
?>