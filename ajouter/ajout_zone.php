<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_zone']))
{
    $nom_zone = htmlspecialchars($_POST['nom_zone'], ENT_QUOTES);
    $debut_x = htmlspecialchars($_POST['debut_x'], ENT_QUOTES);
    $fin_x = htmlspecialchars($_POST['fin_x'], ENT_QUOTES);
       $debut_y = htmlspecialchars($_POST['debut_y'], ENT_QUOTES);
	   $fin_y = htmlspecialchars($_POST['fin_y'], ENT_QUOTES);
	      if (empty($nom_zone) || empty($debut_x) || empty($fin_x) || empty($debut_y) || empty($fin_y))
  {
        echo "Erreur lors de l'ajout d'une  nouvelle zone, vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
else {
        $req = $bdd->prepare("INSERT INTO map_zone (nom_zone,debut_x,fin_x,debut_y,fin_y) VALUES (:nom_zone,:debut_x,:fin_x,:debut_y,:fin_y)");
        try {
            $req->execute(array(
                'nom_zone' => $nom_zone,
                'debut_x' => $debut_x,
                             'fin_x' => $fin_x,
'debut_y' => $debut_y,
							 'fin_y' => $fin_y));
							 echo "Vous avez bien ajouter une  nouvelle zone, merci pour votre contribution.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
        } catch (Exception $ex)
		{
            die('Erreur lors de l\'ajout d\'une zone. Erreur : ' . $ex->getMessage());
            $req->closeCursor();
        }
        exit();
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>création d'une nouvelle zone</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><a href="../accueil_admin.php">revenir au panel admin.</a></p>
<br />
<h1>Créer une nouvelle zone</h1>
<br />
<form name="ajout_zone" action="ajout_zone.php" method="POST">
  <p>ci-dessous veuillez taper le nom de la nouvelle zone.</p>
  <p>Une zone représente l'enssemble d'un territoir, sur lequel il y aura plusieurs viles que vous pourrez ajouter par la suite.</p>
 <input type="text" name="nom_zone" value="" /><br />
<p>ci-dessous veuillez précisez le début et la fin de votre zone.</p>
<p>petite précision, la mape est composée de coordonnées x et y, .</p>
<p>veillez à bien commencez et à terminer le début et la fin de zone là ou il n'y a pas d'autre zone.</p>
<p>début de la zone en x:</p>
  <input type="number" name="debut_x" value="" /><br />
<p>fin de la zone en x:</p>
    <input type="number" name="fin_x" value="" /><br />
<p>précisez le début de la zone en y:</p>
    <input type="number" name="debut_y" value="" /><br />
<p>précisez la fin de la zone en y:</p>
  <input type="number" name="fin_y" value="" /><br />
<br />
<p>cliquez sur le bouton ci-dessous pour créer  cette nouvelle zone.</p>
<input type="submit" name="ajout_zone" value ="créer la nouvelle zone.">
</form>