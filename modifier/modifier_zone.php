<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE map_zone SET nom_zone = ?, debut_x = ?, fin_x= ?, debut_y = ?, fin_y = ? WHERE id_zone = ?');
try
{
$req->execute(array(
$_POST['nom_zone'],
$_POST['debut_x'],
$_POST['fin_x'],
$_POST['debut_y'],
$_POST['fin_y'],
$_POST['id_zone']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification de  la zone.');
$reponse->closeCursor();
}
?>
<?php
if (isset($_POST['modif']))
{
$id_zone = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM map_zone WHERE id_zone = :id_zone');
$query->execute([':id_zone' => $id_zone]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'une zone adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Modifier une zone</h2>
<form action="modifier_zone.php" method="post">
<input type="hidden" name="id_zone" value="<?php echo $reponse[0]['id_zone']; ?>"/>
<p>nom de la zone</p>
<input type="text" name="nom_zone" value="<?php echo $reponse[0]['nom_zone']; ?>"/>
<br />
<p>début x:</p>
<input type="number" name="debut_x" value="<?php echo $reponse[0]['debut_x']; ?>"/>
<br />
<p>fin x:</p>
<input type="number" name="fin_x" value="<?php echo $reponse[0]['fin_x']; ?>"/>
<br />
<p>début_y</p>
<input type="number" name="debut_y" value="<?php echo $reponse[0]['debut_y']; ?>"/>
<br />
<p>fin y:</p>
<input type="number" name="fin_y" value="<?php echo $reponse[0]['fin_y']; ?>"/>
<br />
<p><input type="submit" name="ap_modif" value ="appliquer les modifications"></p>
</form>
<?php
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'une zone adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_zone.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier une zone.</p>
<p>Choisis la zone à modifier puis clique sur je veut modifier cette zone.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
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
<input type="submit" name="modif" value ="Je veut modifier cette zone.">
</form>
</body>