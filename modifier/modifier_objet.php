<?php
include"../include/verif_membres.php";
include"../include/config.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE objets SET nom_objet = ?, desc_objet = ?, categorie_objet = ? WHERE id_objet = ?');
try
{
$req->execute(array(
$_POST['nom_objet'],
$_POST['desc_objet'],
$_POST['categorie_objet'],
$_POST['id_objet']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification de  l\'objet.');
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
$req->closeCursor();
}
if (isset($_POST['modif']))
{
$id_objet = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM objets WHERE id_objet = :id_objet');
$query->execute([':id_objet' => $id_objet]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'un objet adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Modifier un objet</h2>
<form action="modifier_objet.php" method="post">
<input type="hidden" name="id_objet" value="<?php echo $reponse[0]['id_objet']; ?>"/>
<p>catégorie de l'objet</p>
<p>attention, vous devez resélectionner la catégorie de votre objet.</p>
<select name="categorie_objet">
    <option value="arme">arme</option>
    <option value="armure">armure</option>
    <option value="vêtement">vêtement</option>
  <option value="nourriture">nourriture</option>
  <option value="végétaux">végétaux</option>
  <option value="potion">potion</option>
  <option value="conteneure">conteneure</option>
  </select>
<p>nom de l'objet</p>
<input type="text" name="nom_objet" value="<?php echo $reponse[0]['nom_objet']; ?>"/>
<br />
<p>Description de l'objet</p>
<textarea name="desc_objet"><?php echo $reponse[0]['desc_objet'];?></textarea>
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
  <title>modification d'un objet adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_objet.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier un objet .</p>
<p>Choisis l'objet  à modifier puis clique sur je veut modifier cet objet.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
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
<input type="submit" name="modif" value ="Je veut modifier cette objet.">
</form>
</body>