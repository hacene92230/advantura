<?php
include_once "../../include/verif_membres.php";
include_once "../../include/config.php";
if (isset($_POST['supprimer_message']))
{
$reponse = $bdd->query("Delete FROM messagerie WHERE id ='".$_POST['supprimer_message']."'");
echo "Ce message à bien été supprimé.";
echo '<br /><a href="messagerie.php">revenir à la messagerie.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer un message.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'un message</h2>
<form action="supprimer_message.php" method="post">
<a href="messagerie.php">Revenir à la messagerie.</a>
<br />
<p>Ici, vous pouvez supprimer le message que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_message">
<?php
$reponse = $bdd->query('SELECT * FROM messagerie');
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id'].'">'.$donnees['titre'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer ce message.">
</form>