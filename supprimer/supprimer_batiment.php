<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['supprimer_batiment']))
{
$reponse = $bdd->prepare("Delete FROM map_batiments WHERE id_batiment = :id");
$reponse->execute(array('id' => $_POST['supprimer_batiment']));
echo "ce batiment à bien été supprimé.";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';

die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer un batiment.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'un batiment</h2>
<form action="supprimer_batiment.php" method="post">
<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>
<br />
<p>Ici, vous pouvez supprimer le batiment que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_batiment">
<?php
$reponse = $bdd->prepare('SELECT * FROM map_batiments');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_batiment'].'">'.$donnees['nom_batiment'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer ce batiment.">
</form>