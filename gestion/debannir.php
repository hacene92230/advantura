<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['debannir']))
{
$reponse = $bdd->prepare("Delete FROM perso_bannissement WHERE id_perso = :id");
$reponse->execute(array('id' => $_POST['debannir']));
echo "ce personnage à bien été débanni.";
echo '<br /><a href="../accueil_admin.php">revnir au panel admin.</a>"';
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Débannir un personnage.</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>Débannir un personnage</h2>
<form action="debannir.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez débannir le personnage que vous voullez.</p>
<select name="debannir">
<?php
$reponse = $bdd->prepare('SELECT * FROM perso, perso_bannissement WHERE perso_bannissement.id_perso = perso.id');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_perso'].'">'.$donnees['pseudo'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="form_debannir" value ="Débannir ce personnage.">
</form>