<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['placer_monstre']))
{
$pv = $bdd->prepare('SELECT * FROM monstres WHERE id_monstre = :id');
$pv->execute(array('id' => $_POST['placer_monstre']));
$pv_monstre = $pv->fetch();
$req = $bdd->prepare("INSERT INTO monstre_combat (id_monstre,x,y,rest_pv_monstre) VALUES (:id_monstre,:x,:y,:rest_pv_monstre)");
        try {
            $req->execute(array(
                'id_monstre' => $_POST['placer_monstre'],
'x' => $_POST['x'],
'y' => $_POST['y'],
'rest_pv_monstre' => $pv_monstre['pv_monstre']));
echo 'Ce monstre à été placé correctement.';
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
        } catch (Exception $ex)
		{
echo "erreur lors du placement de ce monstre";
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
  <title>Placer un monstre</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>Placer un monstre.</h2>
<br />
<form action="placer_monstre.php" method="post">
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<br />
<p>Ici, vous pouvez placer les monstres aux endroits ou vous voullez.</p>
<p>emplacement x du monstre.</p>
<input type="number" name="x" value="" /><br />
<p>emplacement y du monstre.</p>
<input type="number" name="y" value="" /><br />
<p>Monstre à placer.</p>
<select name="placer_monstre">
<?php
$reponse = $bdd->prepare('SELECT * FROM monstres');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id_monstre'].'">'.$donnees['nom_monstre'].'</option>';
}
?>
</select>
<br />
<input type="submit" name="placer" value ="Je place ce monstre">
</form>