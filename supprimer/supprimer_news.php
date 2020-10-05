<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['supprimer_news']))
{
$reponse = $bdd->prepare("Delete FROM news WHERE id_news = :id_news");
$reponse->execute(array('id_news' => $_POST['supprimer_news']));
echo "cette news à bien été supprimé.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Supprimer une news.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>suppression d'une news</h2>
<form action="supprimer_news.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez supprimer la news que vous voullez, attention: votre choix est iréverssible.</p>
<select name="supprimer_news">
<?php
$reponse = $bdd->prepare('SELECT * FROM news');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_news'].'">'.$donnees['titre_news'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="supprimer" value ="supprimer cette news.">
</form>
</body>
</html>