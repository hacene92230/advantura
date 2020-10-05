<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['supprimer_monstre']))
{
$reponse = $bdd->prepare("Delete FROM monstres WHERE id_monstre = :id");
$reponse->execute(array('id' => $_POST['supprimer_monstre']));
echo "ce monstre à bien été supprimé.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer un monstre.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'un monstre</h2>
<form action="supprimer_monstre.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer le monstre que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_monstre">
<?php
$reponse = $bdd->prepare('SELECT * FROM monstres');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_monstre'].'">'.$donnees['nom_monstre'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer ce monstre.">
</form>