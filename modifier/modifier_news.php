<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$req = $bdd->prepare('UPDATE news SET titre_news = ?, texte_news = ? WHERE id_news = ?');
try
{
$req->execute(array(
$_POST['titre_news'],
$_POST['texte_news'],
$_POST['id_news']));
echo "la modification s'est correctement effectuer";
echo '<p><a href="../accueil_admin.php">Revenir au panel admin.</a></p>';
die();
}
    catch (Exception $ex)
	{}
	die('Erreur lors de la modification de  la news.');
$reponse->closeCursor();
}
?>
<?php
if (isset($_POST['modif']))
{
$id_news = $_POST['modifier'];
$query= $bdd->prepare('SELECT * FROM news WHERE id_news = :id_news');
$query->execute([':id_news' => $id_news]);
$reponse = $query->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>modification d'une news adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Modifier une news</h2>
<form action="modifier_news.php" method="post">
<input type="hidden" name="id_news" value="<?php echo $reponse[0]['id_news']; ?>"/>
<p>titre de la news</p>
<input type="text" name="titre_news" value="<?php echo $reponse[0]['titre_news']; ?>"/>
<br />
<p>texte de votre news</p>
<textarea name="texte_news"><?php echo $reponse[0]['texte_news'];?></textarea>
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
  <title>modification d'une news Advantura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form action="modifier_news.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Rien de plus simple pour modifier une news.</p>
<p>Choisis la news à modifier puis clique sur je veut modifier cette news.</p>
<p>Ensuite tu arrivera dans une nouvelle page, modifi ce que tu veut, puis clique sur appliquer les modifications.</p>
<select name="modifier">
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
<input type="submit" name="modif" value ="Je veut modifier cette news.">
</form>
</body>