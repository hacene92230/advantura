<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE map_batiments SET nom_batiment = ?, type = ? WHERE id_batiment = ?');
try
{
$req->execute(array(
$_POST['nom_batiment'],
$_POST['type'],
$_POST['id_batiment']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification du bâtiment.');
$reponse->closeCursor();
}
?>
<?php
if (isset($_POST['modif']))
{
$id_batiment = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM map_batiments WHERE id_batiment = :id_batiment');
$query->execute([':id_batiment' => $id_batiment]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'un bâtiment adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="accueil_admin.php">Revenir au panel admin.</a>
<h2>modifier un bâtiment</h2>
<form action="modifier_batiment.php" method="post">
<input type="hidden" name="id_batiment" value="<?php echo $reponse[0]['id_batiment']; ?>"/>
<p>Nom du bâtiment</p>
<input type="text" name="nom_batiment" value="<?php echo $reponse[0]['nom_batiment']; ?>"/>
<br />
<p><p>type de votre bâtiment</p>
<select name="type">
    <option value="magasin">magasin</option>
    <option value="temple">temple</option>
    <option value="banque">banque</option>
  </select>
<br />
<input type="submit" name="ap_modif" value ="appliquer les modifications"></p>
</form>
<?php
die();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'un batiment Advantura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_batiment.php" method="post">
<a href="accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier un bâtiment.</p>
<p>Choisis le bâtiment à modifier puis clique sur je veut modifier ce bâtiment.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
<?php
$reponse = $bdd->prepare('SELECT * FROM map_batiments');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_batiment'].'">'.$donnees['nom_batiment'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<input type="submit" name="modif" value ="Je veut modifier ce bâtiment.">
</form>
</body>