<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE map_villes SET nom_ville = ?, x = ?, y = ? WHERE id_ville = ?');
try
{
$req->execute(array(
$_POST['nom_ville'],
$_POST['x'],
$_POST['y'],
$_POST['id_ville']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification de  la ville.');
$reponse->closeCursor();
}
?>
<?php
if (isset($_POST['modif']))
{
$id_ville = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM map_villes WHERE id_ville = :id_ville');
$query->execute([':id_ville' => $id_ville]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'une ville adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Modifier une ville</h2>
<form action="modifier_ville.php" method="post">
<input type="hidden" name="id_ville" value="<?php echo $reponse[0]['id_ville']; ?>"/>
<p>nom de la ville</p>
<p><input type="text" name="nom_ville" value="<?php echo $reponse[0]['nom_ville']; ?>"/></p>
<p>positiond en x de votre ville</p>
<p><input type="text" name="x" value="<?php echo $reponse[0]['x']; ?>"/></p>
<p>position en y de votre ville.</p>
<p><input type="text" name="y" value="<?php echo $reponse[0]['y']; ?>"/></p>
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
  <title>modification d'une ville Advantura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_ville.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier une ville.</p>
<p>Choisis la ville à modifier puis clique sur je veut modifier cette ville.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
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
<input type="submit" name="modif" value ="Je veut modifier cette ville.">
</form>
</body>