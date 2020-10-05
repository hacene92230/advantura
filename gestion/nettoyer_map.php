<?php
include_once "../include/config.php";
include_once "../include/verif_membres.php";
if (isset($_POST['nettoyer']))
{
$reponse = $bdd->prepare('DELETE FROM objets WHERE id_objet = :id');
$reponse->execute(array('id' => $_POST['supprimer_objet']));
echo "cette objet à bien été supprimé.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer un objet.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'un objet</h2>
<form action="supprimer_objet.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer l'objet  que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_objet">
<?php
$reponse = $bdd->prepare('SELECT * FROM objets');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_objet'].'">'.$donnees['nom_objet'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer cet objet.">
</form>