<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['supprimer_zone']))
{
$reponse = $bdd->prepare('DELETE FROM map_zone WHERE id_zone = :id');
$reponse->execute(array('id' => $_POST['supprimer_zone']));
echo "cette zone à bien été supprimé.";
echo '<p><a href="../accueil_admin.php">revnir au panel admin.</a></p>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer une zone .</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'une zone</h2>
<form action="supprimer_zone.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer la zone   que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_zone">
<?php
$reponse = $bdd->prepare('SELECT * FROM map_zone');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_zone'].'">'.$donnees['nom_zone'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer cette zone.">
</form>