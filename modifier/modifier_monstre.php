<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE monstres SET nom_monstre = ?, att_min = ?, att_max= ?, pv_monstre = ?, gain_xp = ? WHERE id_monstre = ?');
try
{
$req->execute(array(
$_POST['nom_monstre'],
$_POST['att_min'],
$_POST['att_max'],
$_POST['pv_monstre'],
$_POST['gain_xp'],
$_POST['id_monstre']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification du monstre.');
$reponse->closeCursor();
}
?>
<?php
if (isset($_POST['modif']))
{
$id_monstre = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM monstres WHERE id_monstre = :id_monstre');
$query->execute([':id_monstre' => $id_monstre]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'un monstre adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Modifier un monstre</h2>
<form action="modifier_monstre.php" method="post">
<input type="hidden" name="id_monstre" value="<?php echo $reponse[0]['id_monstre']; ?>"/>
<p>nom du monstre</p>
<input type="text" name="nom_monstre" value="<?php echo $reponse[0]['nom_monstre']; ?>"/>
<br />
<p>attaque minimum:</p>
<input type="number" name="att_min" value="<?php echo $reponse[0]['att_min']; ?>"/>
<br />
<p>attaque maximum:</p>
<input type="number" name="att_max" value="<?php echo $reponse[0]['att_max']; ?>"/>
<br />
<p>Vie du monstre</p>
<input type="number" name="pv_monstre" value="<?php echo $reponse[0]['pv_monstre']; ?>"/>
<br />
<p>Xp gagné par le joueur lors de la mort du monstre:</p>
<input type="number" name="gain_xp" value="<?php echo $reponse[0]['gain_xp']; ?>"/>
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
  <title>modification d'un monstre adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_monstre.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier un monstre.</p>
<p>Choisis le monstre à modifier puis clique sur je veut modifier ce monstre.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
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
<input type="submit" name="modif" value ="Je veut modifier ce monstre.">
</form>
</body>