<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['supprimer_perso']))
{
$reponse = $bdd->prepare("Delete FROM perso WHERE id = :id");
$reponse->execute(array('id' => $_POST['supprimer_perso']));
echo "ce personnage à bien été supprimé.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer un personnage.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'un personnage</h2>
<form action="supprimer_perso.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer le  personnage que vous voullez, attention: votre choix est iréverssible.</p>
<p>petit rapel, la supression d'un personnage doit être faite qu'en cas de majoritée total parmi l'équipe des administrateurs;</p>
<p>La supression d'un personnage ne dois s'effectuer que si le banissement n'a pas suffi, ou bien si le personnage en fais exprésément la demande.</p>
<select name="supprimer_perso">
<?php
$reponse = $bdd->prepare('SELECT * FROM perso');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id'].'">'.$donnees['pseudo'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer ce personnage.">
</form>