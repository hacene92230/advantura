<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['placer_objet']))
{
$verif_objet = $bdd->prepare('SELECT * from objet_position where id_objet = :id');
$verif_objet->execute(array('id' => $_POST['placer_objet']));
while ($objet = $verif_objet->fetch())
{
if($objet['nombre'] >= 1)
{
$req = $bdd->prepare('UPDATE objet_position SET id_objet = ? WHERE nombre >= 1');
try
{
$req->execute(array(
$objet['id_objet'],
$objet['nombre']+1));
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
    catch (Exception $ex)
	{}
	echo 'Erreur lorsque vous avez voulu placer cet objet.';
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
}
$req = $bdd->prepare("INSERT INTO objet_position (id_objet,x,y,nombre) VALUES (:id_objet,:x,:y,:nombre)");
        try {
            $req->execute(array(
                'id_objet' => $_POST['placer_objet'],
'x' => $_POST['x'],
'y' => $_POST['y'],
'nombre' => $_POST['nombre']));
echo 'Cet objet à été placé correctement.';
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
        } catch (Exception $ex)
		{
echo "erreur lors du placement de cet objet";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
            $req->closeCursor();
}
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Placer un objet</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>Placer un objet.</h2>
<br />
<form action="placer_objet.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez placer les objets aux endroits que vous souhaitez.</p>
<p>emplacement x de l'objet.</p>
<input type="number" name="x" value="0" /><br />
<p>emplacement y de l'objet.</p>
<input type="number" name="y" value="0" /><br />
<p>nombre d'objet à placé</p>
<input type="number" name="nombre" value="1" min="1"/><br />
<p>Objet à placer.</p>
<select name="placer_objet">
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
<input type="submit" name="placer" value ="Je place cet objet">
</form>