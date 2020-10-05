<?php
include_once "../../../include/verif_membres.php";
include_once "../../../include/config.php";
if (isset($_POST['supprimer_ville']))
{
$reponse = $bdd->prepare("Delete FROM map_villes WHERE id_ville = :id");
$reponse->execute(array('id' => $_POST['supprimer_ville']));
echo "cette ville à bien été supprimé.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer une ville .</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'une ville</h2>
<form action="supprimer_ville.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer la ville   que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_ville">
<?php
$reponse = $bdd->prepare('SELECT * FROM map_villes');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_ville'].'">'.$donnees['nom_ville'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer cette ville.">
</form>