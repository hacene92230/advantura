<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_batiment']))
{
$nom_batiment = htmlspecialchars($_POST['nom_batiment'], ENT_QUOTES);
$type = htmlspecialchars($_POST['type'], ENT_QUOTES);
if (empty($nom_batiment) || empty($type))
{
echo "Erreur lors de l'ajout d'un nouveau bâtiment, vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
else
{
$req = $bdd->prepare("INSERT INTO map_batiments (nom_batiment,type) VALUES (:nom_batiment,:type)");
try
{
$req->execute(array(
'nom_batiment' => $nom_batiment,
'type' => $type));
echo "Vous avez bien ajouter un nouveau bâtiment, merci pour votre contribution.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
}
catch (Exception $ex)
		{
die('Erreur lors de l\'ajout d\'un bâtiment. Erreur : ' . $ex->getMessage());
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
$req->closeCursor();
}
exit();
}
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="ISO-8859-15">
<title>création d'un nouveau bâtiment</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>
<br />
<h1>Créer un nouveau bâtiment</h1>
<br />
<form name="ajout_batiment" action="ajout_batiments.php" method="POST">
<p>nom du bâtiment.</p>
<input type="text" name="nom_batiment" value="" /><br />
<p>type du bâtiment:</p>
<select name="type">
<option value="magasin">magasin</option>
<option value="temple">temple</option>
<option value="banque">banque</option>
</select>
<br />
<p>cliquez sur le bouton ci-dessous pour ajouter ce bâtiment.</p>
<input type="submit" name="ajout_batiment" value ="Ajouter ce bâtiment.">
</form>